$(document).ready(function()
{
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