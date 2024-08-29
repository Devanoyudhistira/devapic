<?php 
class databases{
    private $dbs = "dbname=devapic";
    private $host = "mysql:host=localhost;";
    private $dbh,
     $statement;
    public function __construct(){
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        $this->dbh =  new PDO($this -> host . $this -> dbs ,USERNAME,PASSWORD,$option);

    }

    public function query ($query){
        $this ->statement = $this->dbh->prepare($query);
    }
    public function bind($param,$value,$type = null){
        switch(true){
            case is_int($value) :
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value) :
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value) :
                $type = PDO::PARAM_NULL;
                break;
                default : $type = PDO::PARAM_STR;
        }
        $this->statement->bindValue($param,$value,$type) ;
    }
    public function execute(){
        $this->statement->execute();
    }
    public function allresult(){
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
    public function result(){
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }
   

}

?>