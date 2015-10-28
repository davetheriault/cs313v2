<?php
    session_start();
    include 'hashthing.php';
?>
<html>
    <head>
        <title>Sign In</title>
    
    </head>
    <body>
        <h1>Log In</h1>
        <form name="login" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
            Username: <input type="text" name="username" required/><br />
            Password: <input type="password" name="password" required/><br />
            
            
            <input name="submit" type="submit" value="Log in" />
        </form>
        <p>Don't have an account? Sign up <a href="signup.php">here!</a></p>
        <?php
            if (isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['password'])) {
                require 'includes/dbconnection.php';
                
                $results = $db->query("SELECT * FROM users WHERE username = '" . $_POST['username'] . "' LIMIT 1");
                var_dump($results);
                if ($results !== false && $results->rowCount() === 1) {
                    $results->setFetchMode(PDO::FETCH_ASSOC);
                    $user = $results->fetch();
                    
                    if (password_verify($_POST['password'], $user['password'])) {
                        $_SESSION['logged'] = true;
                        $_SESSION['user']   = $user['user_id'];
                        
                        header('Location: passwordhomepage.php');
                        exit();
                    } else {
                        echo "<h1>Username/Password is incorrect!</h1>";
                        echo "1<br>";
                    }
                } else {
                    echo "<h1>Username/Password is incorrect!</h1>";
                    echo "2<br>";
                }
            }
        ?>
    </body>
</html>