<?php
include_once '../../class/Backend.php';
$Backend = new Backend;
session_start();

// Handling register
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $response = "";
    $error = false;

    // Checking for existing username or email
    if ($Backend->check_existing_user($_POST["email"], $_POST["username"])) {
        $response = "Existing username or email !";
        $error = true;
    } else {
        if ($Backend->add_new_user($_POST["email"], $_POST["username"], $_POST["password"], $_POST["role"]) === TRUE) {
            $response = "Creating user successfully !";
        } else {
            $error = true;
            $response = "Error when creating user !";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register | BKU JOB FINDER</title>
    <link href="index.css" rel="stylesheet">
    <?php
    include_once('../../components/header/index.php')
    ?>
    <div class="container my-5 py-5 bg-light border">
        <form class="needs-validation" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" novalidate>
            <h1 class="h3 mb-3 font-weight-bold">Register</h1>
            <h3 class="h6 mb-3 font-weight-normal">Please fill the form to create an account</h3>

            <div class="mb-3">
                <label for="username">Username</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
                    <div class="invalid-feedback" style="width: 100%;">
                        Your username is required.
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <input type="text" class="form-control" id="email" placeholder="Email Address" name="email" required>
                    <div class="invalid-feedback" style="width: 100%;">
                        Your Email is required.
                    </div>
                </div>
                <div class="invalid-feedback">
                    Please enter a valid email address
                </div>
            </div>

            <div class="mb-3">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                    <div class="invalid-feedback" style="width: 100%;">
                        Your Password is required.
                    </div>
                </div>
                <div class="invalid-feedback">
                    Please enter a valid password
                </div>
            </div>

            <div class="mb-3">
                <label for="role">Your role</label>
                <select class="custom-select d-block w-100" id="role" required name="role">
                    <option value="">Please choose one role</option>
                    <option value="1">Employer</option>
                    <option value="2">Employee</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid role.
                </div>
            </div>

            <div class="<?php if ($error) {
                            echo "text-danger";
                        } else {
                            echo "text-success";
                        } ?>">
                <h4><?php echo $response ?></h4>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit" id="liveToastBtn">Register</button>
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