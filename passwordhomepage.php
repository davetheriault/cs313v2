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
            
            $results = $db->query("SELECT * FROM users WHERE id = " . $_SESSION['user']);
            
            $results->setFetchMode(PDO::FETCH_ASSOC);
            $user = $results->fetch();
                
            echo $user['username'];
             
        ?>!</h1>
    </body>
</html>