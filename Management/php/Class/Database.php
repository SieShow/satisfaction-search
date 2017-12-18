<?php

class Database
{
    private static $db;
    private $connection;

    private function __construct() {
        $this->connection = mysqli_connect("149.56.175.201", "user", "mafra1045@", "satisfactionbd");
    }

    function __destruct() {
        $this->connection->close();
    }

    public static function getConnection() {
        if (self::$db == null) {
            self::$db = new Database();
        }
        return self::$db->connection;
    }

	public static function runQuery($query) {
		$result = mysqli_query(self::conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	public static function numRows($query) {
		$result  = mysqli_query(self::conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}