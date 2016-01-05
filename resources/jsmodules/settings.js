$(document).ready(function()
{
	$(".emailalert").hide();
	$("#sendEmailBtn" ).on("click",function() {
		$.ajax({
			url: 'sendemail',
			dataType: 'JSON',
			type: 'POST',
			data:{
				to:$("#emailto").val(),
				subject:$("#emailsubject").val(),
				msg:$("#emailtext").val(),
			},
			success: function(data)
			{
				var alert="";
					alert = alert+'<div class="alert alert-success alert-dismissable">';
					alert = alert+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
					alert = alert+'<p>Email Berhasil dikirim. Cek email <a target="_blank" href="https://www.mailinator.com/inbox.jsp?to=suhendra">disini</a></p>';
					alert = alert+'</div>';
				console.log(data.msg);
				$(".emailalert").html(alert);
				$(".emailalert").show(1000);
				return false;
			},
			 error: function (xhr, ajaxOptions, thrownError) {
       var alert="";
					alert = alert+'<div class="alert alert-danger alert-dismissable">';
					alert = alert+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
					alert = alert+'<p>Email GAGAL dikirim.</p>';
					alert = alert+'</div>';
					$(".emailalert").html(alert);
					$(".emailalert").show(1000);
				return false;
      }
		});
		$(".emailalert").show();
		return false;
	});
});