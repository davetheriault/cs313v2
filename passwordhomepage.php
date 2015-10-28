<?php
    session_start();
    if (!isset($_SESSION['logged']) || $_SESSION['logged'] !== true || !isset($_SESSION['user'])) {
        header('Location: signin.php');
        exit();
    }
    $title = "Welcome";
    include 'includes/header.php';
?>

        <h1>Welcome 
        <?php
            require('includes/dbconnection.php');
            
            $results = $db->query("SELECT * FROM users WHERE id = " . $_SESSION['user']);
            
            $results->setFetchMode(PDO::FETCH_ASSOC);
            $user = $results->fetch();
                
            echo $user['username'];
             
        ?>!</h1>
        <a href="endsession.php" style="opacity: .8;">Sign Out</a>

        
        <?php                include 'includes/footer.php'; ?>