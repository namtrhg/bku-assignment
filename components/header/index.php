<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">


<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/album/">

<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Custom styles for this template -->
<link href="../../index.css" rel="stylesheet">
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
                <a href="http://localhost/bku-assignment" class="navbar-brand d-flex align-items-center">
                    <img src="https://haitrieu.com/wp-content/uploads/2021/09/Logo-DH-Bach-Khoa-HCMUT.png" alt="bku logo" width="50" height="50" class="img-thumbnail mr-3"/>
                    <strong>BKU JOBS FINDER</strong>
                </a>
                <div class="navbar-brand d-flex align-items-center">
                    <?php if ($_SESSION["loggedin"] === true) {
                    ?> <a href="http://localhost/bku-assignment/pages/Profile/index.php" class="mr-3">Welcome <?php echo $_SESSION["login_user"];?></a>
                    <?php
                    } ?>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

            </div>
        </div>
    </header>