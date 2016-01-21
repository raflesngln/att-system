<?php
$pdf=new PDF_Code128('P','mm','legal');

$x_pos = 0;
$y_pos = 0;

$pdf->SetMargins(0,0,0,0);

foreach ($data as $key) {   
    
    if($x_pos == 0 && $y_pos ==0) {
        $pdf->AddPage();
    }
    
    //$pdf->Line(70 + $x_pos, 5 + $y_pos, 5 + $x_pos, 5 + $y_pos); // garis hor atas
    //$pdf->Line(70 + $x_pos, 35 + $y_pos, 5 + $x_pos, 35 + $y_pos); // garis hor bawah
    $pdf->Line(5 + $x_pos, 45 + $y_pos, 5 + $x_pos, 5 + $y_pos); // garis ver kiri
    $pdf->Line(80 + $x_pos, 5 + $y_pos, 80 + $x_pos, 35 + $y_pos); // garis ver kanan


    $pdf->SetFont('Arial', 'B', 13); 
    $pdf->Text(7 + $x_pos, 10 + $y_pos, "Kartu anggta");

    $pdf->SetFont('Arial', '', 8);
    $pdf->Text(7 + $x_pos, 15 + $y_pos, 'Nama Lengkap : '.$key->custName." ".$key->custCode);
    //$pdf->Text(7 + $x_pos, 20 + $y_pos, 'Phone : '.$key->Phone);
    $pdf->Text(7 + $x_pos, 25 + $y_pos, 'Email : '.$key->Phone);
    $pdf->Code128(7 + $x_pos,28 + $y_pos,$key->Email,40,5);
	//$pdf->Text(7 + $x_pos, 38 + $y_pos,$key->Phone);
    
    $x_pos = $x_pos + 70;
    
    if($x_pos >= 150 ) {
        $x_pos = 0;
        $y_pos = $y_pos + 35;
        if($y_pos >= 340){
            $y_pos=0;
        }
    }            

}     
$pdf->Output();