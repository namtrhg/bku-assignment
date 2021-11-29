<?php
include_once "../../class/Backend.php";
$job_id = $_GET['id'];
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

  #update-btn {
    width: 100%;
    padding: 10px;
    margin: 20px 0px 5px;
  }
</style>

<?php
include_once('../../components/header/index.php')
?>

<?php
$result = $Backend->get_job_detail($job_id);
$job = $result->fetch_assoc();
?>

<main class="container box-shadow">
  <h2>Edit Job Detail</h2>
  <form class="employmentForm" method="POST">
    <div class="mb-3">
      <label for="jobName" class="form-label">Job Name</label>
      <input type="text" class="form-control form-control-lg" id="jobName" name="jobName" value="<?php echo $job["NAME"]; ?>" required>
    </div>
    <div class="mb-3">
      <label for="jobDescription" class="form-label">Job Detail Description</label>
      <textarea class="form-control" id="jobDescription" name="jobDescription" rows="5" required><?php echo $job["DESCRIPTION"]; ?></textarea>
    </div>
    <div class="mb-3">
      <label for="jobSummary" class="form-label">Job Summary</label>
      <input type="text" class="form-control" id="jobSummary" name="jobSummary" value="<?php echo $job["SUMMARY"]; ?>" required>
    </div>
    <div class="mb-3 row">
      <div class="col-2">
        <label for="jobQuantity" class="form-label justify-content-start">Job Quantity</label>
      </div>
      <div class="col-1">
        <input type="number" class="form-control" id="jobQuantity" name="jobQuantity" value="<?php echo $job["QUANTITY"]; ?>" required>
      </div>
    </div>
    <div class="mb-3">
      <label for="salary" class="form-label">Salary</label>
      <div class="input-group">
        <span class="input-group-text">$</span>
        <input type="number" class="form-control" id="salary" name="salary" value= '<?php echo $job["SALARY"]; ?>' required>
      </div>
    </div>
    <div class="mb-3">
      <label for="category" class="form-label">Category</label>
      <select class="form-control" name="SelectCate" id="category" required>
        <?php
        $result = $Backend->get_rolelist();

        if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) {

        ?>
          <option value="<?php echo $row["ID"];?>" <?php if($row["ID"] == $job["CATEGORY"]){echo 'selected';} ?>><?php echo $row["NAME"]; ?></option>
        <?php
          }
        }
        ?>

      </select>
      </div>
    <button id="update-btn" class="btn btn-danger">Update</button>
  </form>
</main>

<?php
include_once('../../components/footer/index.php')
?>


</html>


<?php
if (isset($_POST["jobName"])) {
  if ($_POST["jobName"] !=  "") {
    $name = $_POST['jobName'];
    $salary = $_POST['salary'];
    $des = $_POST["jobDescription"];
    $sum = $_POST["jobSummary"];
    $quan = $_POST["jobQuantity"];
    $cate = $_POST["SelectCate"];

    //Day la vi tri them code insert sql
    // $con la bien ket noi  cong sql
    $Backend->update_job($job_id, $name, $salary, $des, $sum, $quan, $cate);

    alert("Job updated successfully");
  } else {
    alert("Please input required information");
  }
} 
function alert($msg) {
  echo "<script type='text/javascript'>alert('$msg');</script>";
}
?> 