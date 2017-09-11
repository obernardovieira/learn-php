<html>
    <head>
    
    </head>
    <body>

        <?php
        
            $last_id = $_POST['uid'];
            if(isset($_POST['country']) && isset($_POST['city'])) {

                $mysqli = new mysqli(
                    "localhost:3306","root","secret","threestepregistration");

                if ($mysqli->connect_errno) {
                    printf("Connect failed: %s\n", $mysqli->connect_error);
                    exit();
                }

                $insert_query = "INSERT INTO tmp2step(uid, country, city) VALUES(".$last_id.",'".$_POST['country']."','".$_POST['city']."')";

                if ($mysqli->query($insert_query) != TRUE) {
                    printf("Errormessage: %s\n", $mysqli->error);
                    exit();
                }
            }
        
        ?>


        <form action="end.php" method="post">
            <input style="display:none;" type="text" name="uid" value="<?php echo $last_id; ?>" >
            University: <input type="text" name="university" required><br>
            Degree: <input type="text" name="degree" required><br>
            <input type="submit">
        </form>
    </body>
</html>