<?php
/**
 *
 */
class Students extends Objects {

	protected $pdo;

	// construct $pdo
	function __construct($pdo) {
		$this->pdo = $pdo;
	}

	public function total_student() {
		$stmt = $this->pdo->prepare("SELECT * FROM student");
		$stmt->execute();
		$stmt->fetchAll(PDO::FETCH_OBJ);
		$count = $stmt->rowCount();
		return $count;
	}

	public function studentByDepartment($value)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM student WHERE dept = :value");
		$stmt->bindParam(":value", $value);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}


	public function totalSeletedStudent($dept,$value,$value2)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM `student` WHERE `dept` = :dept AND id BETWEEN :value AND :value2");
		$stmt->bindParam(":dept", $dept);
		$stmt->bindParam(":value", $value);
		$stmt->bindParam(":value2", $value2);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_OBJ);
	}
}

?>

