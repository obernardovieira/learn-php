<html>
    <head>
    
    </head>
    <body>

        <?php

            $last_id = 0;
            if(isset($_POST['first']) && isset($_POST['last'])) {

                $mysqli = new mysqli(
                    "localhost:3306","root","secret","threestepregistration");

                if ($mysqli->connect_errno) {
                    printf("Connect failed: %s\n", $mysqli->connect_error);
                    exit();
                }

                $insert_query = "INSERT INTO tmp1step(firstname, lastname) VALUES('".$_POST['first']."','".$_POST['last']."')";

                if ($mysqli->query($insert_query) != TRUE) {
                    printf("Errormessage: %s\n", $mysqli->error);
                    exit();
                }
                $last_id = $mysqli->insert_id;
            }
        
        ?>

        <form action="finish.php" method="post">
            <input style="display:none;" type="text" name="uid" value="<?php echo $last_id; ?>" >
            Country: <input type="text" name="country" required><br>
            City: <input type="text" name="city" required><br>
            <input type="submit">
        </form>
    </body>
</html>