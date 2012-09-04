<?php
/**
 * VIANCH UPLOADER  Class
 *
 * @author Victor Chavarro {@link http://www.vianch.com Victor Chavarro (victor@vianch.com)}
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License
 * aunque el uso de la función nativa php mysql_connect esta obsoleto la utilizo para mostrar
 * la teoria básica de un conector a MySQL desde PHP (se recomienda el uso de  MySQLi o PDO_MySQL)
 */

/**
 * if is active will print errors
 */
define('DEBUG',false);

/* demo mode if is true simulates file uploads */
define('DEMO_MODE', true);

/*default types of files*/
define('DEFAULT_TYPES', serialize(array('jpg','jpeg','png','gif')));

/*default folder where the files will be uploaded*/
define('DEFAULT_DIR','uploads');

/*Max size in bytes of the uploaded file*/
define('MAX_FILE_SIZE',1048576); // Max file size is 1Megabyte

/*path where the file will be uploaded*/
define('_PATH_','localhost');



class vuploader{

   /**
	* Allowed type of files
	* @var array
	*/
	public $allowed_types;

    /**
     * dir where the files will be uploaded
     * @var string
     */
	public $upload_dir;

	/**
 	 * Create a new class instance,
 	 * the params are allowed types to upload and
 	 * upload url, dir, folder on the server
 	 * Both parameters are optional
 	 *
 	 * @param array $allowed_types
 	 * @param string $upload_dir
 	 *
 	 * @see __destruct()
	 */
	public function __construct( $upload_dir = null, $allowed_types = null){

		if($allowed_types == null){
			$this->allowed_types = unserialize (DEFAULT_TYPES);
		}
		else{
			$this->allowed_types = $allowed_types;
		}

		if($upload_dir == null){
			$this->upload_dir = DEFAULT_DIR;
		}
		else{
			$this->upload_dir = $upload_dir;
		}

		return true;
	}

	/**
     * Allow upload one single file to the server
     *
     * @param $file
	 */
	public function single_upload($file){
		if(!in_array($this->get_extension($file['name']),$this->allowed_types)){
			$this->exit_status('Only '.implode(',',$this->allowed_types).' type of files are allowed!');
		}
		else{
			if($file['error'] == 0){

				if(DEMO_MODE){	
					$this->printer($file);
					$this->exit_status('File Upload:>> '.implode(',',$file).' - Uploads are ignored in demo mode.');
				}
				else{
					if( $file['size'] <= MAX_FILE_SIZE ){
						
						/*Create the folder to be upload if doesnt exist*/
						if(!is_dir($this->upload_dir)){
							mkdir("$this->upload_dir", 0755);
						}
							
							
						// Move the uploaded file from the temporary 
						// directory to the uploads folder:
						if(move_uploaded_file($file['tmp_name'], $this->upload_dir."/".$file['name'])){
							$this->exit_status('File was uploaded successfuly!');
						}
					}
					else{
						$this->exit_status('file  exceeds the allowed size');
					}
				
				}
					
			}
			else{
				$this->exit_status('Something went wrong with the upload!');
			}
			
		}	
	}

	public function multi_upload($file_array){
		foreach ($file_array as  $file) {
			$this->single_upload($file);
		}
	}

	public function delete_file(){

	}

	private function mk_dir(){

	}

	private function delete_dir(){

	}


	/**
	 * output when error happend,
	 * @param string
	 */
	public function exit_status($str){
		$this->printer(json_encode(array('status'=>$str)));
		exit;
	}

	/**
	 * Get the file extention
	 * @param string $file
	 */
	private function get_extension($file){
		$ext = explode('.', $file);
		$ext = array_pop($ext);
		return strtolower($ext);
	}


	/**
	 * print any file on the screen
	 */
	private function printer($info){
		if(is_array($info)){
			print_r($info);	
		}
		else{
			echo $info;
		}
	}

	public function __destruct(){
		return true;
	}
}
?>

