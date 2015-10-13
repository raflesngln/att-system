$(document).ready(function() {
    var hipper = $('#shipper');
    var name1= $('#name1');
    var phone1= $('#phone1');

    $('#txtNumber').autocomplete({
        source: 'caridata.php',
        minLength: 3,
        select: function(evt, data) {
            txtName.val(data.item.name);
            txtEmail.val(data.item.email);
            txtPhone.val(data.item.phone);
        }
    });
});