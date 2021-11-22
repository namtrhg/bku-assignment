<?php
include_once "../../class/Backend.php";
$Backend = new Backend;
?>

<!doctype html>
<html lang="en">

<style>
  main {
    padding: 10px; 
    margin-top: 20px
  }

.grid-container {
  display: grid;
  grid-template-columns: auto auto 400px;
  grid-template-rows: auto auto;
  grid-row-gap: 5px;
  grid-column-gap: 15px;
  background-color: #ffffff;
  padding: 0 20px 20px;
}

.grid-container div {
  background-color: #F5F5F5;
  padding: 20px 0;
  font-size: 30px;
  top: 0;
  color: #3a3a3a;
  font-size: 16px;
  line-height: 1.7em; 
}

.job_header {
  text-align: center;
  opacity: 100;
  align-self: start;
  grid-column: 1 / 3;
  position: sticky;
  border-bottom: 1px solid #000000;
  border: 0;
  border-radius: 4px;
}

.job_header_inner {
  margin-right: 50px;
  margin-left: 50px;

}

.company_info {
  text-align: center;
  align-self: start;
  position: sticky;
  border: 0;
  border-radius: 4px;
}

.job_des {
  grid-column: 1 / 3;
  border: 0;
  border-radius: 4px;
}

.job_name {
  text-align: center;
}
</style>


<?php 

$para_id = $_GET['id'];

?>


<?php
include_once('../../components/header/index.php')
?>


<main class="container">

<?php
	
	$result = $Backend->get_joblist();
	
	
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = $result->fetch_assoc())  
                {  
			if($para_id == $row["ID"]){
?>

<div class='grid-container'>
	<div class='job_header'>
		<div class='job_header_inner'>
		<h1 class='job_name'> <?php echo $row["NAME"]; ?> </h1>
		<br>
			<button type="button" class="btn btn-block btn-danger">Apply now</button>
		</div>
	</div>
                    <?php
                        }
                    }}
                    ?>
	<div class='company_info'>
                <?php
		$connect = mysqli_connect('localhost','root','','baitap');

		$query = "SELECT user_id as 'UID', role_id as 'RID', user_name as 'UNAME', user_email as 'UMAIL' FROM `user`";  
	        $result = mysqli_query($connect, $query);

		$query2 = "SELECT user_id as 'UID2' FROM `jobs`";  
	        $result2 = mysqli_query($connect, $query2);
		
		if(mysqli_num_rows($result2) > 0)  
           	{  
                while($row2 = $result2->fetch_assoc())  
                { $para_uid = $row2["UID2"];}}

		if(mysqli_num_rows($result) > 0)  
           	{  
                while($row = $result->fetch_assoc())  
                {  
			if($para_uid == $row["UID"]){
                ?>
		<h2><?php echo $row["UNAME"]; ?></h2>
		<div class='container'>
		Contact detail: <?php echo $row["UMAIL"]; ?>
		</div>
                    <?php
                        }
                    }}
                    ?>
	</div>
<?php
	
	$result = $Backend->get_joblist();
           if(mysqli_num_rows($result) > 0)  
           {  
                while($row = $result->fetch_assoc())  
                {  
			if($para_id == $row["ID"]){
?>
	<div class='job_des'>
				
			<div class='salary'>
				<h3>Job Salary: <?php echo $row["SALARY"]; ?></h3> 
			</div>
		<h3>Job Description</h3>
	
		<?php echo $row["DESCRIPTION"]; ?>
	
	
	
                    <?php
                        }
                    }}
                    ?>
	
	
		
	</div>
</div>
</main>

<?php
include_once('../../components/footer/index.php')
?>

</html>
