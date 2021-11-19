<?php 
class Backend
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'namkute';
    
    private $connect = '';
    
    public function __construct()
    {
        $this->connect = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
    }
    
    /*Code o day*/
    
    public function get_joblist()
    {
        return $this->connect->query("SELECT Jobs_id as 'ID', Jobs_name as 'NAME', Jobs_description as 'DESCRIPTION', Jobs_updatedAt as 'UPDATEDAT', Jobs_salary as 'SALARY' FROM `Jobs`");
    }
    
    public function get_rolelist()
    {
        return $this->connect->query("SELECT Category_id as 'ID', Category_name as 'NAME' FROM `category`");
    }
    
    public function add_newjob($name,$salary,$des,$cate)
    {
        return $this->connect->query( "INSERT INTO `jobs` (`Jobs_id`, `user_id`, `Category_id`, `Jobs_name`, `Jobs_description`, `Jobs_salary`, `Jobs_createAt`, `Jobs_updatedAt`, `Jobs_hide`) 
                                                     VALUES (NULL, '1', '".$cate."' , '".$name."', '".$des."', '".$salary."', CURRENT_DATE(), CURRENT_DATE(), '0');");
    }
}
?>