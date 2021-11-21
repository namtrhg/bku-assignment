<?php
session_start();
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

    <!-- Custom styles for this template -->
    <link href="index.css" rel="stylesheet">
</head>

<body>

    <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">BKU JOBS FINDER</h4>
                        <p class="text-muted">We help great employees like you grow your career. We do this by featuring the best jobs in various categories. We also have lots of content and resources on our blog to help you grow.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Contact</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Follow on Twitter</a></li>
                            <li><a href="#" class="text-white">Like on Facebook</a></li>
                            <li><a href="mailto: ducbaojust4u@gmail.com" class="text-white">Email me</a></li>
                            <li><a href="http://localhost/bku-assignment/pages/Login" class="text-white"><?php
                                                                                                            if ($_SESSION["loggedin"] === false || !$_SESSION["loggedin"]) {
                                                                                                                echo "Log In";
                                                                                                            }
                                                                                                            ?></a></li>
                            <li><a href="http://localhost/bku-assignment/pages/Register" class="text-white">Register</a></li>
                            <li>
                                <a href="http://localhost/bku-assignment/pages/Logout" class="text-danger">
                                    <?php
                                    if ($_SESSION["loggedin"] === true) {
                                        echo "Log out";
                                    }
                                    ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
                        <circle cx="12" cy="13" r="4"></circle>
                    </svg>
                    <strong>BKU JOBS FINDER</strong>
                </a>
                <div class="navbar-brand d-flex align-items-center">
                    <?php if ($_SESSION["loggedin"] === true) {
                    ?> <span class="mr-3">Welcome <?php echo $_SESSION["login_user"]; ?></span>
                    <?php
                    } ?>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Jobs finder for developers</h1>
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
                <form class="form-inline d-flex justify-content-center">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="form-control btn btn-danger my-2 mr-sm-2" type="submit">Search</button>
                    <?php
                    if ($_SESSION["user_role"] == 1) {
                    ?>
                        <a href="pages/ProductPost/index.php" class="form-control btn btn-secondary my-2">Add a new job</a>
                    <?php
                    }
                    ?>
                </form>
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
                            <div class="col-md-4">
                                <div class="card mb-4 box-shadow h-100">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <h3 class="card-text"><?php echo $row["NAME"]; ?></h3>
                                        <p class="card-text"><?php echo $row["DESCRIPTION"]; ?></p>
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>