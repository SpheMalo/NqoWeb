<html>
<head>
<link href="reset.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
<title>Comment Box</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>

	function commentSubmit(){
		if(form1.name.value == '' && form1.comments.value == ''){ 
			alert('Enter your message !');
			return;
		}
		var name = form1.name.value;
		var comments = form1.comments.value;
		var xmlhttp = new XMLHttpRequest(); 
		
		xmlhttp.onreadystatechange = function(){ 
			if(xmlhttp.readyState==4&&xmlhttp.status==200){
				document.getElementById('comment_logs').innerHTML = xmlhttp.responseText; 
			}
		}
		xmlhttp.open('GET', 'insert.php?name='+name+'&comments='+comments, true); 
		xmlhttp.send();
	}
	
		$(document).ready(function(e) {
			$.ajaxSetup({cache:false});
			setInterval(function() {$('#comment_logs').load('logs.php');}, 2000);
		});
		
</script>
</head>
<body>
<div id="container">
	<div class="page_content">
    	<p class="secondary">
      IT HAS BEEN ANNOUNCED THAT THE CREATOR OF FACEBOOK HAS DECIDED<br>TO PERMANENTLY END THE SOCIAL NETWORKING SITE.
      MANY USERS HAVE SWITCHED TO USING OTHER SOCIAL NETWORKING APPLICATIONS<br>
      SUCH AS TWITTER, TUMBLR AND THE ONE USED BY MANY, INSTAGRAM.<br>
      IN THE PAST FEW MONTHS OF THE ANNOUNCEMENT OF THE SHUTDOWN OF FACEBOOK,<br>
      THE NUMBER OF PEOPLE USING INSTAGRAM HAS INCREASED BY AT LEAST 40%.
		</p>
    </div>
    <div class="comment_input">
        <form name="form1">
        	<input type="text" name="name" placeholder="Name..."/></br></br>
            <textarea name="comments" placeholder="Leave Comments Here..." style="width:635px; height:100px;"></textarea></br></br>
            <a href="#" onClick="commentSubmit()" class="button">Post</a></br>
        </form>
    </div>
    <div id="comment_logs">
    	Loading comments...
    <div>
</div>
</body>
</html>