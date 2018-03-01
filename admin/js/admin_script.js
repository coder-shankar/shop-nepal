 
$('.laptop').hide();
$('.phone').hide();

 $('select').change(function () {
     var optionSelected = $(this).find("option:selected");
     var valueSelected  = optionSelected.val();
     var textSelected   = optionSelected.text();

     if (valueSelected=="laptop") {

     	$('.laptop').show();
     	$('.phone').hide();
     }
     else if (valueSelected=="phone") {
     	$('.phone').show();
     	$('.laptop').hide();

     }
     else{
     	$('.laptop').hide();
     	$('.phone').hide();
     }
 });