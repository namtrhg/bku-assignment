<?php
include_once "../../class/Backend.php";
$Backend = new Backend;
?>

<!doctype html>
<html lang="en">
<?php

$para_id = $_GET['id'];

?>
<head>

<?php
include_once('../../components/header/index.php')
?>


<main class="container">

    <?php

    $result = $Backend->get_joblist();


    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($para_id == $row["ID"]) {
    ?>

                <div class='grid-container'>
        <?php
            }
        }
    }
        ?>
        <div class='company_info'>
            <?php
            $connect = mysqli_connect('', '', '', '');

            $query = "SELECT user_id as 'UID', role_id as 'RID', user_name as 'UNAME', user_email as 'UMAIL' FROM `user`";
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
                        <div>
                            Contact detail: <?php echo $row["UMAIL"]; ?>
                        </div>
            <?php
                    }
                }
            }
            ?>
        </div>
                </div>
                </div>
</main>

<?php
include_once('../../components/footer/index.php')
?>

</html>