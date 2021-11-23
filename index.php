<?php
include_once 'class/Backend.php';
$Backend = new Backend;
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>BKU JOB FINDER</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Custom styles for this template -->
    <link href="index.css" rel="stylesheet">
    <script src="js/index.js"></script>
</head>

<body>

    <?php
    include_once('./components/header/index.php')
    ?>

    <main role="main">

        <section class="container text-left py-4">
            <div class="row">
                <div class="col-sm">
                    <h1 class="jumbotron-heading">Jobs finder for developers</h1>
                    <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
                    <form class="form-inline d-flex justify-content-start">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" onfocus="SearchAutoFill(this)" onfocusout="SearchOff(this)" id="input-search" onkeyup="SearchWord(this)">
                        
                        <button class="form-control btn btn-danger my-2 mr-sm-2" type="submit">Search</button>
                        <a href="pages/ProductPost/index.php" class="form-control btn btn-secondary my-2">Add a new job</a>
                        
                        <div id="autos">
                            <ul class="list-group" id="list-auto-fill" style="display: none;">
                                <?php
                                //Giai thich code o day: 
                                //
                                //                     
                                $result = $Backend->get_searchAutofill();
                                
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {

                                ?>
                                    <li class="list-group-item"><a href="/jobs/<?php echo $row["ID"]; ?>"><?php echo $row["NAME"]; ?></a></li>
                                <?php
                                    }
                                }
                                ?>
                            </ul>
                        </div>
                    </form>
                </div>
                <div class="col-sm" id="map" style="width:500px; height: 500px;">

                </div>
            </div>
        </section>
<script>

</script>


        <div class="album py-5 bg-light">
            <div class="container">

                <div class="row">
                    <?php

                    $result = $Backend->get_joblist();

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {

                    ?>
                            <div class="col-md-4">
                                <div class="card mb-4 box-shadow h-100">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <p class="card-text"><?php echo $row["NAME"]; ?></p>
                                        <p class="card-text"><?php echo $row["DESCRIPTION"]; ?></p>
                                        <p class="card-text">Salary: <?php echo $row["SALARY"]; ?> $</p>
                                        <div class="d-flex justify-content-between align-items-center ">
                                            <div class="btn-group">
                                                <a href="./pages/ProductDetail/index.php?id=<?php echo $row["ID"]; ?>" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                                                <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
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

    <footer class="text-muted">
        <div class="container">
            <p class="float-right">
                <a href="#">Back to top</a>
            </p>
            <p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
            <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
        </div>
    </footer>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>