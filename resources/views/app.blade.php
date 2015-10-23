<!doctype html>
<html lang="eng">
<head>
	<meta charset="UTF-8">
	<title>My First App</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
	
</head>
<body>
	<div class="container">
	
		@include("flash::message")
		
		@yield("content")
	</div>
	
	<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	
	<script>
		$("#flash-overlay-modal").modal();
		//	$("div.alert").not("alert-important").delay(3000).slideUp(3000);
	</script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
	@yield("footer")
</body>
</html>