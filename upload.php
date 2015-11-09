<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    
	<script>
	$(document).on('ready', function() {
    	$("#input-6").fileinput({
        	showUpload: false,
        	maxFileCount: 10,
        	mainClass: "input-group-lg"
    	});
	});
	</script>
</head>
<body>
	<div class="fileinput fileinput-new" data-provides="fileinput">
  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
  <div>
    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="..."></span>
    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
  </div>
</div>
</body>
</html>

