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

    <!--  NAV BAR -->


    <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">BKU JOBS FINDER</h4>
                        <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Contact</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Follow on Twitter</a></li>
                            <li><a href="#" class="text-white">Like on Facebook</a></li>
                            <li><a href="#" class="text-white">Email me</a></li>
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
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>

    <!-- END  NAV BAR -->

<!-- DB access -->

<?php
                    $con = new mysqli("localhost", "root", "", "baitap");

                    $result = $con->query("SELECT Jobs_id as 'ID', Jobs_name as 'NAME', Jobs_description as 'DESCRIPTION', Jobs_updatedAt as 'UPDATEDAT', Jobs_salary as 'SALARY' FROM `Jobs`");

                    if ($result->num_rows > 0) {
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {

                    ?>

<!-- END DB access 1 -->


<div class='grid-container'>
	<div class='job_header'>
		<div class='job_header_inner'>
		<h1 class='job_name'> <?php echo $row["NAME"]; ?> </h1>
			<div class="apply_box">
				<a class="apply_button" href="#">Apply Now</a>
			</div>
		</div>
	</div>
	<div class='company_info'>
		<a href="#">Company name</a>
		<div class='container'>
		Short company describtion.
		</div>
	</div>
	<div class='job_des'>
			<div class='job_tag'>
				Tag here
			</div>	
			<div class='salary'>
				<?php echo $row["SALARY"]; ?>
			</div>
		<h2>Title</h2>

		<?php echo $row["DESCRIPTION"]; ?>




		<?php
                        }
                    }
                    ?>

<!-- END DB access 2 -->

		<ul>
			<li>Paragrahp here</li>
			<li>Paragrahp here</li>
			<li>Paragrahp here</li>
		</ul>
		<h2>Job Description</h2>
			<p>Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here Paragrahp here </h2>
		<ul>
			<li>Paragrahp here Paragrahp here Paragrahp here Paragrahp here </li>
			<li>Paragrahp here Paragrahp here Paragrahp here Paragrahp here </li>
			<li>Paragrahp here Paragrahp here Paragrahp here Paragrahp here </li>
			<li>Paragrahp here Paragrahp here Paragrahp here Paragrahp here </li>
			<li>Paragrahp here Paragrahp here Paragrahp here Paragrahp here </li>
			<li>Paragrahp here Paragrahp here Paragrahp here Paragrahp here </li>
			<li>Paragrahp here Paragrahp here Paragrahp here Paragrahp here </li>
			<li>Paragrahp here Paragrahp here Paragrahp here Paragrahp here </li>
		</ul>
		<h2>Paragrahp here Paragrahp here Paragrahp here Paragrahp here</h2>
		<ul>
			<li>Paragrahp here Paragrahp here Paragrahp here Paragrahp here </li>
			<li>Paragrahp here Paragrahp here Paragrahp here Paragrahp here </li>
			<li>Paragrahp here Paragrahp here Paragrahp here Paragrahp here </li>
			<li>Paragrahp here Paragrahp here Paragrahp here Paragrahp here </li>
			<li>Paragrahp here Paragrahp here Paragrahp here Paragrahp here </li>
			<li>Paragrahp here Paragrahp here Paragrahp here Paragrahp here </li>
			<li>Paragrahp here Paragrahp here Paragrahp here Paragrahp here </li>
			<li>Paragrahp here Paragrahp here Paragrahp here Paragrahp here </li>
		</ul>
	</div>
</div>

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