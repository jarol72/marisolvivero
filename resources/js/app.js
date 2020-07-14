require('./bootstrap');

$(document).ready( function () {
    $('#infTable').DataTable();
} );

$('.custom-file-input').on('change', function(event) {
    var inputFile = event.currentTarget;
    $(inputFile).parent()
        .find('.custom-file-label')
        .html(inputFile.files[0].name);
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
});

function editQty(product_id)
{
  var quantity = document.getElementById("product"+product_id).value;
  
  document.getElementById("newQty").value=quantity;        
    
}
