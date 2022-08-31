<?php

abstract class Model{
    protected $dbh;
    protected $stmt;

    public function __construct()
    {
        //dsn
        $this->dbh = new PDO("mysql:host=".DB_HOST.";"."dbname=".DB_NANE,DB_USER,DB_PASS);
    }

    //Query Function
    public function query($query){
$this->stmt = $this->dbh->prepare($query);
    }
    // End Of Query Function


    // binding function
    public function bind($param, $value, $type = null){
		if(is_null($type)){
			switch(true){
				case is_int($value):
					$type = PDO::PARAM_INT;
					break;
				case is_bool($value):
					$type = PDO::PARAM_BOOL;
					break;
				case is_null($value):
					$type = PDO::PARAM_NULL;
					break;
					default:
					$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}
    // End of binding function

    // execute method
    public function execute(){
		return $this->stmt->execute();
	}
    // end of execute method

//Method to get result set

public function resultset(){
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
}
// End of Method to get result set


}