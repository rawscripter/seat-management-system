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
}

?>

