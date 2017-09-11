<html>
    <head>
        <meta http-equiv="refresh" content="3; url=main.php" />
    </head>
    <body>
        <?php

        $last_id = $_POST['uid'];
        if(isset($_POST['university']) && isset($_POST['degree'])) {

            $mysqli = new mysqli(
                "localhost:3306","root","secret","threestepregistration");

            if ($mysqli->connect_errno) {
                printf("Connect failed: %s\n", $mysqli->connect_error);
                exit();
            }

            $insert_query = "INSERT INTO registers".
                "(firstname, lastname, country, city, university, degree)".
                "SELECT tmp1step.firstname, tmp1step.lastname, tmp2step.country, tmp2step.city, ".
                "'".$_POST['university']."', '".$_POST['degree']."' FROM tmp1step, tmp2step ".
                "WHERE tmp1step.uid = tmp2step.uid AND tmp2step.uid = ".$last_id;

            $delete1_query = "DELETE FROM tmp1step WHERE uid = ".$last_id;
            $delete2_query = "DELETE FROM tmp2step WHERE uid = ".$last_id;

            if ($mysqli->query($insert_query) != TRUE) {
                printf("Errormessage: %s\n", $mysqli->error);
                exit();
            }
            if ($mysqli->query($delete1_query) != TRUE) {
                printf("Errormessage: %s\n", $mysqli->error);
                exit();
            }
            if ($mysqli->query($delete2_query) != TRUE) {
                printf("Errormessage: %s\n", $mysqli->error);
                exit();
            }

        }

        ?>
    </body>
</html>
