<?php 
class Backend
{
    // Define all the needed informatio
    private $host = '';
    private $user = ''; 
    private $pass = '';
    private $dbname = 'bku-assignment';
    
    private $connect = '';
    
    public function __construct()
    {
        $this->connect = new mysqli($this->host,$this->user,$this->pass,$this->dbname,3307);
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

    public function get_job_by_keyword($keyword)
    {
        $sql = "SELECT Jobs_id as 'ID', Jobs_name as 'NAME', Jobs_description as 'DESCRIPTION', Jobs_updatedAt as 'UPDATEDAT', Jobs_salary as 'SALARY' FROM `Jobs` WHERE Jobs_name LIKE ?";
        if ($stmt = mysqli_prepare($this->connect, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_term);
        
            // Set parameters
            $param_term = $keyword . '%';
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                return mysqli_stmt_get_result($stmt);
            }
            else
            {
                return false;
            }
        }
        else{
            return false;
        }
    }
}
