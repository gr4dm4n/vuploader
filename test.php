<?php
	if(isset($_REQUEST['send'])){
		
		include_once 'vuploader.class.php';

		$upload = new vuploader();
		/**
		 * example indicating the folder : $upload = new vuploader('img');
		 * example indicating the folder and file type: $upload = new vuploader('img',array('png'));
		*/

		if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
			$upload->exit_status('Error! Wrong HTTP method!');
		}
		else{
			$upload->single_upload($_FILES["file"]);
		}
	}
?>
<html>
 <head>
 	<title>Upload Test</title>
 </head>
 <body>
 	<form action="test.php" method="post" enctype="multipart/form-data">
	<label for="file">Filename:</label>
	<input type="file" name="file" id="file" /> 
	<br />
	<input type="hidden " name="send" val="1" />
	<input type="submit" name="submit" value="Submit" />
	</form>
 </body>
</html>