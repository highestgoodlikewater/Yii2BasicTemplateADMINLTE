$(document).on('keypress','input.qty, input.price', function(e) {
	if(e.keyCode==13)
	{
		e.preventDefault();
		var row = $(this).closest('tr');
		var quantity = row.find('.qty').val();
		var price = row.find('.price').val();
		var total = price * quantity;
		row.find('.total').html(total);
		return false;
	}
});
	
$(document).on('blur','.qty',function(){
  var price = $(this).parents('tr').find(".price").val() ;
  var qty = ($(this).val());
  var total = price * qty;
  $(this).parents('tr').find(".total").html(total);
});
$(document).ready(function()
{
	$('.datepicker').datepicker({
		autoclose: true,
		todayHighlight: true,
		format:'dd/mm/yyyy',
		//startDate: 'd'
	});
	$(".select2").select2();
	$("#itemcode").on("change",function(){
		$("#itemprice").val($("#itemcode option:selected").attr("price"));
		$("#itemqty").focus();
		$("#itemqty").attr("autofocus","autofocus")
	});
	function clear (){
        $("#itemcode").focus();
        $("#itemprice").val("");
        $("#itemqty").val("");
    }
	$("tbody#itemlist").on("click","#hapus",function(){
        $(this).parent().parent().remove();
    });
	
	
	
	$('#itemqty').on('keypress', function(e) {
        if(e.keyCode==13){
            e.preventDefault();
            var itemcode = $("#itemcode").val();
            var itemname = $("#itemcode option:selected").text();
            var itemprice = $("#itemprice").val();
            var itemqty = $("#itemqty").val();
            var items = "";
			var total = "";
            items += "<tr>";
            items += "<td><input type='hidden' name='item[code][]' value='"+ itemcode +"'>"+itemname+"</td>";
            items += "<td><input type='number' style='text-align:right; width: 100%;' class='control-form qty' name='item[qty][]' value='"+ itemqty +"'></td>";
            items += "<td><input type='number' style='text-align:right; width: 100%;' class='control-form price' name='item[price][]' value='"+ itemprice +"'></td>";
			total = itemqty * itemprice
            items += "<td style='text-align:right;width:25%'><p class='total'>"+ total +"</p></td>";
            items += "<td><a href='javascript:void(0);' id='hapus'>Remove</a></td>";
			items += "</tr>";
        
            if ($("tbody#itemlist tr").length == 0)
            {
                $("#itemlist").append(items);
                clear();
            }else{
                var callback = checkList(itemcode);
                if(callback === true){
                    $("#itemlist").append(items);
                    clear();
                    return false;
                }
            }
        }
    });

    function checkList(val){
        var cb = true;
    
        $("#itemlist tr").each(function(index){
            var input = $(this).find("input[type='hidden']:first");
            if (input.val() == $(itemcode).val()){
                cb = false;
            }
        });
        return cb;
    }
	
});