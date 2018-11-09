<?php

/**
 *
 */
class Data_plan extends Objects {

	protected $pdo;

	// construct $pdo
	function __construct($pdo) {
		$this->pdo = $pdo;
	}
	
	public function searchRoom($roll,$reg,$room,$dept){

		$sql = "SELECT * FROM seat_plan WHERE month LIKE '%$roll%' AND year LIKE '%$reg%' AND meter_no LIKE '%$room%' AND status LIKE '%$dept%'";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function searchSub($roll,$reg,$sub,$dept){

		$sql = "SELECT * FROM exam_plan WHERE s_roll LIKE '%$roll%' AND s_reg LIKE '%$reg%' AND sub LIKE '%$sub%' AND dept LIKE '%$dept%'";
		$stmt = $this->pdo->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
}

?>

