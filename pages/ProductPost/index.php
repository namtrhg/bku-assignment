<?php
    include_once "../../class/Backend.php";
    $Backend = new Backend;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
  <h2>Employment</h2>
  <form class="employmentForm" method ="POST">
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
      <label for="jobCategory" class="form-label">Category</label>
      <select class="form-select" name="SelectCate">
        <option selected>Choose one, please...</option>
<?php
    $result = $Backend->get_rolelist();

    if ($result->num_rows > 0) 
    {
        // output data of each row
        while($row = $result->fetch_assoc()) 
        {

?>        
        
        <option value="<?php echo $row["ID"]; ?>"><?php echo $row["NAME"]; ?></option>
<?php
        }
    }
?>        
        
      </select>
    </div>
    <button class="btn btn-danger" style="width: 100%">Submit</button>
  </form>
</div>

</body>
</html>


<?php 

if( isset($_POST["jobName"]) )
{
    if($_POST["jobName"] !=  "")
    {
       $name = $_POST['jobName'];
       $salary = $_POST['salary'];
       $des = $_POST["jobDescription"];
       $cate = $_POST["SelectCate"];
       
       //Day la vi tri them code insert sql
       // $con la bien ket noi  cong sql
        $Backend->add_newjob($name,$salary,$des,$cate);
        
        echo "Da them job";
    
    }
    else
    {
        echo "Chua co noi dung";
    }
}
else
{
    echo "Vui long nhap noi dung va Submit";
}

?>