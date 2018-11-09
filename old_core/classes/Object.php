<?php

/**
 * the user class
 */
class Objects {
	protected $pdo;

	// construct $pdo
	function __construct($pdo) {
		$this->pdo = $pdo;
	}

	// prevent sql injection
	public function escape($var) {
		$var = trim($var);
		$var = htmlspecialchars($var);
		$var = stripcslashes($var);
		return $var;
	}

	// user login method
	// public function login($email,$password)
	// {
	// $stmt = $this->pdo->prepare("SELECT user_id FROM users WHERE email = :email AND password = :password");
	//    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
	//    $stmt->bindParam(":password", md5($password), PDO::PARAM_STR);
	//    $stmt->execute();
	//    $user = $stmt->fetch(PDO::FETCH_OBJ);
	//    $count = $stmt->rowCount();

	//    if ($count > 0) {
	//      $_SESSION['user_id'] = $user->user_id;
	//      header("Location: home.php");
	//    }else{
	//     return false;
	//    }
	// }

	// getting all user data form database
	// public function menuData_by_id($menu_no)
	// {
	//   $stmt = $this->pdo->prepare("SELECT * FROM menu_list WHERE menu_no = :menu_no");
	//   $stmt->bindParam(":menu_no", $menu_no , PDO::PARAM_INT);
	//   $stmt->execute();
	//   return $stmt->fetch(PDO::FETCH_OBJ);
	// }

	//  public function all_orders()
	// {
	//   $stmt = $this->pdo->prepare("SELECT * FROM orders ORDER BY order_id DESC");
	//   $stmt->execute();
	//   return $stmt->fetchAll(PDO::FETCH_OBJ);
	// }
	// public function all_menus()
	// {
	//   $stmt = $this->pdo->prepare("SELECT * FROM menu_list ORDER BY menu_no ASC");
	//   $stmt->execute();
	//   return $stmt->fetchAll(PDO::FETCH_OBJ);
	// }

	// public function searchOrderByID($order_id)
	// {
	//   $stmt = $this->pdo->prepare("SELECT * FROM orders_list LEFT JOIN orders  ON  orders_list.order_id = orders.order_id WHERE orders_list.order_id = :order_id;");
	//   $stmt->bindParam(":order_id", $order_id);
	//   $stmt->execute();
	//   return $stmt->fetchAll(PDO::FETCH_OBJ);
	// }

	// public function searchOrderByDate($lowerdate,$upperdate)
	// {
	//   $stmt = $this->pdo->prepare("SELECT * FROM orders WHERE date between :lowerdate and :upperdate");
	//   $stmt->bindParam(":lowerdate", $lowerdate);
	//   $stmt->bindParam(":upperdate", $upperdate);
	//   $stmt->execute();
	//   return $stmt->fetchAll(PDO::FETCH_OBJ);
	// }

	public function create($table, $fields = array()) {
		$columns = implode(',', array_keys($fields));
		$values = ":" . implode(', :', array_keys($fields));
		$sql = "INSERT INTO {$table}({$columns}) VALUES($values)";

		if ($stmt = $this->pdo->prepare($sql)) {
			foreach ($fields as $key => $data) {
				$stmt->bindValue(":" . $key, $data);
			}

			$stmt->execute();
			return $this->pdo->lastInsertId();
		}
	}

	public function update($table, $colum_name, $id, $fields = array()) {
		$columns = '';

		$i = 1;
		foreach ($fields as $name => $value) {
			$columns .= "{$name} = :{$name}";
			if ($i < count($fields)) {
				$columns .= ', ';
			}
			$i++;
		}

		$sql = "UPDATE {$table} SET {$columns} WHERE {$colum_name} = {$id}";
		if ($stmt = $this->pdo->prepare($sql)) {
			foreach ($fields as $key => $value) {
				$stmt->bindValue(":" . $key, $value);
			}
			$stmt->execute();
			return $stmt->rowCount();
		}

	} // end of update

	public function delete($table, $array) {
		$sql = "DELETE FROM {$table}";
		$where = " WHERE ";
		foreach ($array as $key => $value) {
			$sql .= "{$where} {$key} = :{$key}";
			$where = " AND ";
		}
		if ($stmt = $this->pdo->prepare($sql)) {
			foreach ($array as $key => $value) {
				$stmt->bindValue(":" . $key, $value);
			}
			$stmt->execute();
		}
	}

	public function confirm_delete($table,$row,$id){
		$stmt = $this->pdo->prepare("DELETE FROM ".$table." WHERE ".$row."=".$id."" );
		$stmt->execute();
	}


	public function total_count($table) {
		$stmt = $this->pdo->prepare("SELECT * FROM " . $table . " ");
		$stmt->execute();
		$stmt->fetchAll(PDO::FETCH_OBJ);
		$count = $stmt->rowCount();
		return $count;
	}

	public function find_all($table) {
		$stmt = $this->pdo->prepare("SELECT * FROM " . $table . " WHERE deleted_at = '' ORDER BY id DESC ");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function find_all_info_form_table($table){
		$stmt = $this->pdo->prepare("SELECT * FROM " . $table . "");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}

	public function find_all_deleted($table) {
		$stmt = $this->pdo->prepare("SELECT * FROM " . $table . " WHERE deleted_at != '' ORDER BY id DESC ");
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}


	// find a specific data
	public function find_by_id($table,$column,$value) {
		$stmt = $this->pdo->prepare("SELECT * FROM " . $table . " WHERE " . $column . " = :value AND deleted_at = ''");
		$stmt->bindParam(":value", $value);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}

	public function find_by_id_non_filter($table,$column,$value) {
		$stmt = $this->pdo->prepare("SELECT * FROM " . $table . " WHERE " . $column . " = :value ");
		$stmt->bindParam(":value", $value);
		$stmt->execute();
		return $stmt->fetch(PDO::FETCH_OBJ);
	}


	public function converDateForUser($time){
		return $newDate = date("d-m-Y", strtotime($time));
	}

	public function converDateForEvent($time){
		return $newDate = date("d M Y", strtotime($time));
	}

	public function shortSummery($content,$len)
	{
		$content =  substr($content, 0, $len);
		return $content .= "....";
	}



	public function uploadImage($file)
	{
		$fileName = time().'_'.basename($file['name']);
		$fileTmp  = $file['tmp_name'];
		$fileSize  = $file['size'];
		$error  = $file['error'];

		$ext = explode(".", $fileName);
		$ext = strtolower(end($ext));

		$allowedExt = array('jpg','png','jpeg');

		if (in_array($ext, $allowedExt) === true)
		{
			if ($fileSize <= ( 1024 * 2 ) * 1024)
			{
				$fileRoot = $fileName;
				move_uploaded_file($fileTmp, $_SERVER["DOCUMENT_ROOT"] . '/office/pouroshava/dash/image/'. $fileRoot);
				return $fileRoot;

			}else{
				$GLOBALS['imageError'] = "This file size is too large";
			}
		}else{
			$GLOBALS['imageError'] = "This file type is not allowed";
		}
	}

	// public function search($data)
	// {
	//   $stmt = $this->pdo->prepare("SELECT * FROM menu_list WHERE menu_no LIKE ? OR menu_name LIKE ? ");
	//   $stmt->bindValue(1,$data.'%',PDO::PARAM_STR);
	//   $stmt->bindValue(2,$data.'%',PDO::PARAM_STR);
	//   $stmt->execute();
	//   return $stmt->fetchAll(PDO::FETCH_OBJ);
	// }

	// public function selectLastOrderId(){
	//   $stmt = $this->pdo->prepare("SELECT max(id) as maxid FROM orders");
	//   $stmt->execute();
	//  $row = $stmt->fetch(PDO::FETCH_ASSOC);
	//   return $row['maxid'];
	// }

	// public function lastOder($id){
	//   $stmt = $this->pdo->prepare("SELECT order_id FROM orders WHERE id = :id");
	//   $stmt->bindParam(":id",$id);
	//   $stmt->execute();
	//   $row = $stmt->fetch(PDO::FETCH_ASSOC);
	//   return $row['order_id'];
	// }
	public function error_msg(){
		if (isset($_SESSION['msg'])) {
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
	}

	public function timeAgo($dateTime) {
		$time = strtotime($dateTime);
		$current = time();
		$seconds = $current - $time;
		$min = round($seconds / 60);
		$hours = round($seconds / 3600);
		$day = round($seconds / 86400);
		$week = round($seconds / 604800);
		$months = round($seconds / 2600640);

		if ($seconds <= 59) {
			return $seconds == 0 ? 'now' : $seconds . 's ago';

		} else if ($min <= 59) {
			return $min . 'm ago';

		} else if ($hours <= 23) {
			return $hours . 'h ago';

		} else if ($day <= 6) {
			return $day . 'd ago';

		} else if ($months <= 12) {
			return date("M j", $time);

		} else {

			return date("j M Y", $time);

		}

	}

	// public function popupModal($msg)
	// {
	//     return '<div id="confirmModal" class="modal fade" role="dialog">
	// <div class="modal-dialog">
	//         <!-- Modal content-->
	//         <div class="modal-content">
	//           <div class="modal-header">
	//             <button type="button" class="close" data-dismiss="modal">&times;</button>
	//             <h4 class="modal-title">Confirm Message</h4>
	//           </div>
	//           <div class="modal-body">
	//             <p>'.$msg.'</p>
	//           </div>
	//           <div class="modal-footer">
	//             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	//           </div>
	//         </div>

	//       </div>
	//     </div>';
	// }

} //end of class

?>
