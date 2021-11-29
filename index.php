<?php
session_start();
include_once 'class/Backend.php';
$Backend = new Backend;
?>
<!doctype html>
<html lang="en">

<head>
    <link href="index.css" rel="stylesheet">
    <title>Home | BKU JOB FINDER</title>
    <?php
    include_once('components/header/index.php')
    ?>
    <script src="js/index.js"></script>
    <main role="main">

        <section class="container text-left py-4">
            <div class="row">
                <div class="col-sm">
                    <h1 class="jumbotron-heading">Jobs finder for developers</h1>
                    <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
                    <form class="form-inline d-flex justify-content-start" method="post" action="pages/Products/index.php">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="input-search" onkeyup="SearchWord(this)" name="keyword">
                        <button class="form-control btn btn-danger my-2 mr-sm-2" type="submit">Search</button>
                        <?php
                        if ($_SESSION["user_role"] == 1) {
                        ?>
                            <a href="pages/ProductPost/index.php" class="form-control btn btn-secondary my-2">Add a new job</a>
                        <?php
                        }
                        ?>

                    </form>
                    <div id="autos"></div>
                </div>
                <div class="col-sm" id="map" style="width:500px; height: 500px;">

                </div>
            </div>
        </section>


        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
                    <?php

                    $result = $Backend->get_joblist();

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
                                                <a href="./pages/ProductDetail/index.php?id=<?php echo $row["ID"]; ?>" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                                                <?php
                                                if ($_SESSION["login_user_id"] == $row["UID"] and $_SESSION["user_role"] == 1) {
                                                ?>
                                                    <a href="./pages/ProductEdit/index.php?id=<?php echo $row["ID"]; ?>" class="btn btn-sm btn btn-danger" type="button">Edit</a>
                                                    <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
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
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script>
        var myMap;
        var myLatlng = new google.maps.LatLng(52.518903284520796, -1.450427753967233);

        function initialize() {
            var mapOptions = {
                zoom: 13,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel: false
            }
            myMap = new google.maps.Map(document.getElementById('map'), mapOptions);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: myMap,
                title: 'Name Of Business',
                icon: 'http://www.google.com/intl/en_us/mapfiles/ms/micons/red-dot.png'
            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>

    <?php
    include_once('components/footer/index.php')
    ?>

</html>