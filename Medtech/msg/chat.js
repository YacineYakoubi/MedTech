// JavaScript Document
function msg()
{
	
	$.post('msg.php',function(data){$('.label label-success').html(data);});
	
	
	}
setInterval(msg,2000);
msg();
//******fucntion 2 
