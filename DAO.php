<?php
require_once 'db.php';

class DAO {
	private $db;

	// za 2. nacin resenja
	private $GETSTUDENT = "SELECT * FROM student WHERE id = ?;";
	private $UPDATESTUDENT = "UPDATE student SET ime = ?, prezime = ?, indeks = ? where id = ?;";
	
	
	public function __construct()
	{
		$this->db = DB::createInstance();
	}

	public function getStudent($id)
	{
				
		$statement = $this->db->prepare($this->GETSTUDENT);
		$statement->bindValue(1, $id);
		
		$statement->execute();
		
		$result = $statement->fetch();
		return $result;
	}
	public function getStudentByID($id)
	{
				
		$statement = $this->db->prepare($this->GETSTUDENT);
		$statement->bindValue(1, $id);
		
		$statement->execute();
		
		if($result = $statement->fetch())
		return true;
		else false;		
	}

	public function updateStudent($id, $ime, $prezime, $indeks)
	{
		
		$statement = $this->db->prepare($this->UPDATESTUDENT);
		$statement->bindValue(1, $ime);
		$statement->bindValue(2, $prezime);
		$statement->bindValue(3, $indeks);
		$statement->bindValue(4, $id);
		
		$statement->execute();
	}

	public function deleteOsoba($idosoba)
	{
		// 1. nacin
		/*
		$statement = $this->db->prepare("DELETE  FROM osoba WHERE idosoba = :idosoba");
		$statement->execute(array(':idosoba' => $idosoba));
		*/
		
		// 2. nacin
		$statement = $this->db->prepare($this->DELETEOSOBA);
		$statement->bindValue(1, $idosoba);
		
		$statement->execute();
	}

	public function getOsobaById($idosoba)
	{
		// 1. nacin
		/*
		$statement = $this->db->prepare("SELECT * FROM osoba WHERE idosoba = :idosoba");
		$statement->execute(array(':idosoba' => $idosoba));
		
		$result = $statement->fetch();
		return $result;
		*/
		
		// 2. nacin
		$statement = $this->db->prepare($this->SELECTBYID);
		$statement->bindValue(1, $idosoba);
		
		$statement->execute();
		
		$result = $statement->fetch();
		return $result;
	}
}
?>
