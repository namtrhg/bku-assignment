<?php
include_once '../../class/Backend.php';
$Backend = new Backend;
session_start();
// Handling Login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $response = "";
    $error = false;

    $id_type = "user_name";

    if (strpos($_POST["email_or_un"], '@') !== false) {
        $id_type = "user_email";
    }


    // Checking for existing username or email
    if ($Backend->check_existing_user($_POST["email_or_un"], $_POST["email_or_un"])) {
        if ($row = $Backend->login_processing($id_type, $_POST["email_or_un"], $_POST["password"])) {
            $_SESSION["loggedin"] = true;
            $_SESSION['login_user'] = $row["user_name"];
            $_SESSION['login_user_id'] = $row["user_id"];
            $_SESSION['user_role'] = $row["role_id"];
            $response = "Login succesfully !";
        } else {
            $error = true;
            $response = "Wrong password !".$id_type;
        }
    } else {
        $response = "No username or password, please try again !";
        $error = true;
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link href="index.css" rel="stylesheet">
    <title>Login | BKU JOB FINDER</title>
    <?php
    include_once('../../components/header/index.php')
    ?>

    <div class="container my-5 py-5 bg-light border">
        <form class="form-signin needs-validation" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" novalidate>
            <h1 class="h3 mb-3 font-weight-normal">Login</h1>
            <div class="form-label-group">
                <input type="text" id="inputEmail" class="form-control" name="email_or_un" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address or username</label>
                <div class="invalid-feedback" style="width: 100%;">
                    Your Email or Username is required.
                </div>
            </div>

            <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" required>
                <label for="inputPassword">Password</label>
                <div class="invalid-feedback" style="width: 100%;">
                    Your Email or Username is required.
                </div>
            </div>

            <div class="<?php if ($error) {
                            echo "text-danger";
                        } else {
                            echo "text-success";
                        } ?>">
                <h4><?php echo $response ?></h4>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
    </div>

    <script>
        (function() {
            'use strict'

            var forms = document.querySelectorAll('.needs-validation')

            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>

    <?php
    include_once('../../components/footer/index.php')
    ?>

</html>