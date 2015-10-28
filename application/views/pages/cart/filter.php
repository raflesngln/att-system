  <div id="body">
        <?php foreach($this->cart->contents() as $items){
$p+=$items['p'];
$l+=$items['l'];
$t+=$items['t'];
        ?>

                <p><?php echo 'vvv'. $items['v']; ?> <?php echo 'lebar' . $items['l']; ?><?php echo 'tinggi' . $items['t']; ?><span class="add">Rp. <?php echo number_format($items['price'],0,',','.'); ?>

                <a href="<?php echo base_url(); ?>temp/hapus/<?php echo $items['rowid']; ?>">delete</a>

                </span></p>

        <?php } ?>
        <?php echo $p;?>
        <?php echo $l;?>
        <?php echo $t;?>
    </div>
