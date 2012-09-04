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
	else{
		echo json_encode(array('status'=>"No reuqests"));
	}
?>