<?php
include_once "../../class/Backend.php";
$Backend = new Backend;
session_start();
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
    opacity: 100;
    align-self: start;
    grid-column: 1 / 3;
    border-bottom: 1px solid #000000;
    border: 0;
    border-radius: 4px;
  }

  .job_header_inner {}

  .company_info {
    text-align: center;
    align-self: start;
    position: sticky;
    border: 0;
    border-radius: 4px;
  }

  .job_des {
    margin-right: 50px;
    margin-left: 50px;
    border: 0;
    border-radius: 4px;
  }

  .job_name {
    text-align: center;
  }

  ul {
    list-style-type: none;
    text-align: left;
    margin: 40px;
  }
</style>


<?php

$para_id = $_GET['id'];
$_SESSION['para_id_sec'] = $para_id;
?>


<?php
include_once('../../components/header/index.php')
?>

<main class="container">

  <?php

  $apply = $Backend->get_joblist();


  if (mysqli_num_rows($apply) > 0) {
    while ($row = $apply->fetch_assoc()) {
      if ($para_id == $row["ID"]) {
  ?>

        <div class='grid-container'>
          <div class='job_header'>
            <div class='job_header_inner position-sticky text-align-center'>
              <h1 class='job_name'> <?php echo $row["NAME"]; ?> </h1>
              <br>
              <button type="button" class="btn btn-block btn-danger" id="apply_button">Apply now</button>

            </div>

      <?php
      }
    }
  }
      ?>

      <?php

      $result = $Backend->get_job_detail($para_id);
      if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
      ?>
          <div class='job_des'>
            <div class='jobsum'>
              <h3>Short Job Summary: </h3>
              <p> <?php echo $row["SUMMARY"]; ?> </p>
            </div>
            <div class='jobnum'>
              <h3>Number of job Opening left: <?php echo $row["QUANTITY"]; ?></h3>
            </div>
            <div class='salary'>
              <h3>Job Salary: <?php echo $row["SALARY"]; ?></h3>
            </div>
            <h3>Job Description</h3>

            <?php echo $row["DESCRIPTION"]; ?>
        <?php

        }
      }
        ?>
          </div>
          </div>

          <div class='company_info'>
            <?php
            $connect = mysqli_connect('localhost', 'root', '', '');

            $query = "SELECT user_id as 'UID', role_id as 'RID', user_name as 'UNAME', user_number as 'UNUM', user_description as 'UDES', user_email as 'UMAIL' FROM `user`";
            $result = mysqli_query($connect, $query);

            $query2 = "SELECT user_id as 'UID2' FROM `jobs`";
            $result2 = mysqli_query($connect, $query2);

            if (mysqli_num_rows($result2) > 0) {
              while ($row2 = $result2->fetch_assoc()) {
                $para_uid = $row2["UID2"];
              }
            }

            if (mysqli_num_rows($result) > 0) {
              while ($row = $result->fetch_assoc()) {
                if ($para_uid == $row["UID"]) {
            ?>
                  <h2><?php echo $row["UNAME"]; ?></h2>
                  <div class='container p-3'>
                    <!-- Write Short company describtion -->
                    <?php echo $row["UDES"]; ?> </li>
                  </div>
                  <div class='container'>
                    Contact Detail:
                    <ul>
                      <li> Email: <?php echo $row["UMAIL"]; ?> </li>
                      <li> Phone: <?php echo $row["UNUM"]; ?></li>
                    </ul>
                  </div>
            <?php
                }
              }
            }
            ?>
          </div>

        </div>
</main>

<?php
include_once('../../components/footer/index.php')
?>
<script src="../../pages/ProductDetail/script.js"></script>

</html>