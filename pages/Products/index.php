<?php

if (isset($_POST['keyword'])) {
  $keyword = $_POST['keyword'];
} else {
  $keyword = NULL;
}

if (isset($_GET['id'])){
  $id = $_GET['id'];
}

include_once '../../class/Backend.php';
$Backend = new Backend;
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Jobs List | BKU JOB FINDER</title>
  <?php
  include_once('../../components/header/index.php')
  ?>

  <main>
    <div class="container my-5 py-5 bg-light border">
      <h1 class="fw-light text-center jumbotron-heading"><?php
                                                          if (is_null($keyword)) {
                                                            echo "Top Jobs";
                                                          } else {
                                                            echo "Jobs for <strong>" . $keyword . "</strong>";
                                                          }
                                                          ?></h1>

      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3" id="job_list">
            <?php

            if (is_null($keyword)) {
              $keyword = "";
            }

            $result = $Backend->get_job_by_keyword($keyword);

            if ($result->num_rows > 0) {
              // output data of each row
              while ($row = $result->fetch_assoc()) {

            ?>
                <div class="col-md-4 mb-4">
                  <div class="card mb-4 box-shadow h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                      <h3 class="card-text"><?php echo $row["NAME"]; ?></h3>
                      <p class="card-text"><?php echo $row["SUMMARY"]; ?></p>
                      <p class="card-text">Salary: <?php echo $row["SALARY"]; ?> $</p>
                      <div class="d-flex justify-content-between align-items-center ">
                        <div class="btn-group">
                          <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                          <?php
                          if ($_SESSION["login_user_id"] == $row["UID"] and $_SESSION["user_role"] == 1) {
                          ?>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                          <?php
                          }
                          ?>
                        </div>
                        <small class="text-muted"><?php echo $row["UPDATEDAT"]; ?></small>
                      </div>
                    </div>
                  </div>
                </div>
              <?php
              }
            } else {
              ?>
              <div style="justify-content: center; text-align:center">
                <h4 class="fw-light text-center jumbotron-heading">Sorry, there is no jobs for <strong><?php echo $keyword ?></strong></h4>
                <h6 class="fw-light text-center jumbotron-heading">Please enter the right job name</strong></h6>
              </div>
            <?php
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php
  include_once('../../components/footer/index.php')
  ?>

</html>