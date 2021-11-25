<?php
class Backend
{
    // Define all the needed informationn
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $dbname = 'bku-assignment';
    private $connect = '';

    public function __construct()
    {
        $this->connect = new mysqli($this->host,$this->user,$this->pass,$this->dbname);
    }
  
    public function get_joblist()
    {
        return $this->connect->query("SELECT Jobs_id as 'ID', Jobs_name as 'NAME', user_id as 'UID', Jobs_description as 'DESCRIPTION', Jobs_updatedAt as 'UPDATEDAT', Jobs_salary as 'SALARY' FROM `Jobs`");
    }

    public function get_rolelist()
    {
        return $this->connect->query("SELECT Category_id as 'ID', Category_name as 'NAME' FROM `category`");
    }

    public function add_newjob($name, $salary, $des, $cate)
    {
        return $this->connect->query("INSERT INTO `jobs` (`Jobs_id`, `user_id`, `Category_id`, `Jobs_name`, `Jobs_description`, `Jobs_salary`, `Jobs_createAt`, `Jobs_updatedAt`, `Jobs_hide`) 
                                                     VALUES (NULL, '1', '" . $cate . "' , '" . $name . "', '" . $des . "', '" . $salary . "', CURRENT_DATE(), CURRENT_DATE(), '0');");
    }
    
    
    public function get_searchAutofill()
    {
        return $this->connect->query("SELECT Jobs_id as 'ID', Jobs_name as 'NAME', Jobs_description as 'DESCRIPTION', Jobs_updatedAt as 'UPDATEDAT', Jobs_salary as 'SALARY' 
                                        FROM `Jobs`
                                        WHERE 'Jobs_hide' = 0
                                     ");
    }
    
    
    public function get_searchWord($word)
    {
        return $this->connect->query("SELECT Jobs_id as 'ID', Jobs_name as 'NAME', Jobs_description as 'DESCRIPTION', Jobs_updatedAt as 'UPDATEDAT', Jobs_salary as 'SALARY' 
                                        FROM `Jobs`
                                        WHERE 'Jobs_hide' = 0 AND Jobs_name like '%".$word."%'
                                     ");
    }
    
    /*Code of another teamate*/
    public function get_job_by_keyword($keyword)
    {
        $sql = "SELECT Jobs_id as 'ID', Jobs_name as 'NAME', Jobs_description as 'DESCRIPTION', Jobs_updatedAt as 'UPDATEDAT', Jobs_salary as 'SALARY' FROM `Jobs` WHERE Jobs_name LIKE ?";
        if ($stmt = mysqli_prepare($this->connect, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_term);

            // Set parameters
            $param_term = $keyword . '%';

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                return mysqli_stmt_get_result($stmt);
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function check_existing_user($email, $username)
    {
        $sql = "SELECT * FROM `user` WHERE `user_email`='$email' OR `user_name`='$username'";
        if ($result = mysqli_query($this->connect, $sql)) {
            $count = mysqli_num_rows($result);
            if ($count == 0) {
                return false;
            } else {
                return true;
            }
        }
        else{
            return true;
        }
    }

    public function add_new_user($email, $username, $password, $role)
    {
        $password = md5($password);
        return $this->connect->query("INSERT INTO `user` (`user_id`,`role_id`, `user_name`, `user_password`, `user_email`,`user_createAt`, `user_updatedAt`, `user_hide`) 
                                                     VALUES (NULL, '$role', '$username', '$password' , '$email', CURRENT_DATE(), CURRENT_DATE(), '0');");
    }

    public function login_processing($id_type, $identity, $password){
        $password = md5($password);
        $sql = "SELECT * FROM `user` WHERE `$id_type`='$identity' AND `user_password`='$password'";
        if ($result = mysqli_query($this->connect, $sql)) {
            $count = mysqli_num_rows($result);
            if ($count == 1) {
                return mysqli_fetch_array($result, MYSQLI_ASSOC);
            } else {
                return false;
            }
        }
        else{
            return false;
        }
    }
}
