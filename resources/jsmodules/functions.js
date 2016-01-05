$(document).ready(function()
{
	 $("#sendEmailBtn" ).on("click",function() {
	  console.log('ok');
		$.ajax({
			url: 'users.php',
			dataType: 'json',
			type: 'post',
			contentType: 'application/json',
			data:$("form#sendEmail").serialize();
			success: function(data, textStatus, jqXHR)
			{
				//data - response from server
			},
	  });
	});
	
    $('#'+buttonID).click(function()
    {
        var id = $('#'+gridID).yiiGridView('getSelectedRows');
        $.ajax({
            type: 'POST',
            //url : baseURL+'deleteall',
            url : deleteURI,
            data : {
				row_id: id,
				returnURL: returnURL
				},
            success : function(e) 
            {
                $('#'+gridID).closest('tr').remove(); 
            }
        });
    });
    
    
    
}); // end of document