<html>
 <head>
 	<title>Upload Test</title>
 	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.1.min.js"></script>
 	<script type="text/javascript" src="scripts.js"></script>
 </head>
 <body>
 	<form action="test.php" method="post" enctype="multipart/form-data">

	<input type="file" name="file" id="file" /> 
	<br />
	<input type="file" name="file1" id="file1" /> 
	<br />
	<input type="file" name="file2" id="file2" /> 
	<br />
	<input type="file" name="file3" id="file3" /> 
	<br />
	<input type="file" name="file4" id="file4" /> 
	<br />
	<input type="hidden" name="send" value="1" />
	<div id="submit" > ENVIAR </div>
	</form>
 </body>
</html>