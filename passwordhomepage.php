<?php
    session_start();
    if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true || !isset($_SESSION['user'])) {
        header('Location: signin.php');
        exit();
    }
?>
<html>
    <head>
        <title>Welcome</title>
    </head>
    <body>
        <h1>Welcome 
        <?php
            require('includes/dbconnection.php');
            
            $results = $db->query("SELECT * FROM users WHERE user_id = " . $_SESSION['user']);
            
            if ($results !== false && $results->rowCount() === 1) {
                $results->setFetchMode(PDO::FETCH_ASSOC);
                $user = $results->fetch();
                
                echo $user['user_name'];
            } else {
                header('Location: signin.php');
                exit();
            }
        ?>!
        </h1>
    </body>
</html>