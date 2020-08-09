<?php

ob_start();

require 'connect.php';


if (isset($_GET['u'])) {
    $username = mysqli_real_escape_string($db, $_GET['u']);

    if (ctype_alnum($username)) {
        $data = mysqli_query($db, "SELECT * FROM users WHERE username='$username' ");

        if (mysqli_num_rows($data) === 1) {
            $result = mysqli_fetch_assoc($data);
            $location = $result['location'];
            $description = $result['description'];
        } else {
            header("HTTP/1.0 404 Not Found");
            exit();
        }
    }
}


?>

<h2><?php echo $username ?>'s Profile</h2>
Location: <?php echo $location ?> <br />
Description: <?php echo $description ?> <br />