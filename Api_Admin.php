<?php
/**
 * Example module API
 * This api can be access only for admins
 */
class Box_Mod_ServerStatus_Api_Admin extends Api_Abstract
{

	public function add($data) {

		$data = array();
				
		$pdo = Box_Db::getPdo();
        $query="INSERT INTO  `server_status` (
				`name` ,
				`host` ,
				`www` ,
				`mail` ,
				`ftp`
				)
				VALUES (
				'".$_POST['host_name']."',  '".$_POST['host_host']."',  '80',  '25',  '21'
				)";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
		
		return $_POST;

	}
	
	public function remove($data) {
		$pdo = Box_Db::getPdo();
        $query="DELETE FROM `server_status` WHERE id=".$data['id'];
        $stmt = $pdo->prepare($query);
        $stmt->execute();
		return true;
	}
	
}