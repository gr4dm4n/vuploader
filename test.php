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
			//test single upload
			//$upload->single_upload($_FILES["file"]);

		 /* test multiupload */
			$files_array = array($_FILES["file"],$_FILES["file1"],$_FILES["file2"],$_FILES["file3"],$_FILES["file4"]);
			$upload->multi_upload($files_array);
		
		}
	}
?>
<html>
 <head>
 	<title>Upload Test</title>
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
	<input type="hidden" name="send" val="1" />
	<input type="submit" name="submit" value="Submit" />
	</form>
 </body>
</html>