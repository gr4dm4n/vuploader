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

/**
 * demo mode if is true simulates file uploads
 */
define('demo_mode', false);

class vuploader{

   /**
	* Allowed type of files
	* @var array
	*/
	public $allowed_types = array('jpg','jpeg','png','gif');

    /**
     * dir where the files will be uploaded
     * @var string
     */
	public $upload_dir = 'uploads/';

	/**
 	 * Create a new class instance,
 	 * the params are allowed types to upload and
 	 * upload url, dir, folder on the server
 	 * Both parameters are optional
 	 *
 	 * @param array $allowed_types
 	 * @param string $upload_dir
	 */
	public function __construct($allowed_types = $this->allowed_types, $upload_dir = $this->upload_dir){

		$this->allowed_types = $allowed_types;
		$this->upload_dir = $upload_dir;
		return true;
	}

	public function single_upload(){

	}

	public function multi_upload(){

	}

	public function delete_file(){

	}

	private function mk_dir(){

	}

	private function delete_dir(){
		
	}

	private function printer(){

	}

	public function __destruct(){
		return true;
	}
}
?>

