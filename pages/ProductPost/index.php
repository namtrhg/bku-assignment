<?php
include_once "../../class/Backend.php";
$Backend = new Backend;
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<style>
  main {
    padding: 20px; 
    margin-top: 40px
  }

  main h2 {
    margin-bottom: 40px;
  }

  label{
    font-size: large;
  }

  #submit-btn {
    width: 100%;
    padding: 10px;
    margin: 20px 0px 5px;
  }
</style>

<?php
include_once('../../components/header/index.php')
?>

<main class="container box-shadow">
  <h2>Employment</h2>
  <form class="employmentForm" method="POST">
    <div class="mb-3">
      <label for="jobName" class="form-label">Job Name</label>
      <input type="text" class="form-control form-control-lg" id="jobName" name="jobName">
    </div>
    <div class="mb-3">
      <label for="jobDescription" class="form-label">Job Description</label>
      <textarea class="form-control" id="jobDescription" name="jobDescription" rows="5"></textarea>
    </div>
    <div class="mb-3">
      <label for="salary" class="form-label">Salary</label>
      <div class="input-group">
        <span class="input-group-text">$</span>
        <input type="number" class="form-control" id="salary" name="salary" placeholder="Starts at">
      </div>
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Category</label>
      <select class="form-control" name="SelectCate" id="category">
        <option selected>Choose one, please...</option>
        <?php
        $result = $Backend->get_rolelist();

        if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) {

        ?>
          <option value="<?php echo $row["ID"]; ?>"><?php echo $row["NAME"]; ?></option>
        <?php
          }
        }
        ?>

      </select>
      </div>
    <button id="submit-btn" class="btn btn-danger">Submit</button>
  </form>
</main>

<?php
include_once('../../components/footer/index.php')
?>


</html>


<!-- <?php

if (isset($_POST["jobName"])) {
  if ($_POST["jobName"] !=  "") {
    $name = $_POST['jobName'];
    $salary = $_POST['salary'];
    $des = $_POST["jobDescription"];
    $cate = $_POST["SelectCate"];
    $user_id =  $_SESSION["login_user_id"];

    //Day la vi tri them code insert sql
    // $con la bien ket noi  cong sql
    $Backend->add_newjob($user_id, $name, $salary, $des, $cate);

    alert("Da them job");
  } else {
    alert("Chua co noi dung");
  }
} else {
  alert("Vui long nhap noi dung va Submit");
}
function alert($msg) {
  echo "<script type='text/javascript'>alert('$msg');</script>";
}
?> -->