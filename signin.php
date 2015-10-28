<?php
    session_start();
    require_once 'includes/header.php';
    require 'dbconnection.php';
?>
        <h1>Log In</h1>
        <form name="login" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
            Username: <input type="text" name="username" required/><br />
            Password: <input type="password" name="password" required/><br />
            
            <input name="submit" type="submit" value="Log in" />
        </form>
        <?php
            if (isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['password'])) {
                require 'includes/dbconnection.php';
                
                $results = $db->query("SELECT * FROM users WHERE user_name = '" . $_POST['username'] . "' LIMIT 1");
                
                if ($results !== false && $results->rowCount() === 1) {
                    $results->setFetchMode(PDO::FETCH_ASSOC);
                    $user = $results->fetch();
                    
                    if (password_verify($_POST['password'], $user['pass_hash'])) {
                        $_SESSION['logged'] = true;
                        $_SESSION['user']   = $user['user_id'];
                        
                        header('Location: index.php');
                        exit();
                    } else {
                        echo "<h1>Username/Password is incorrect!</h1>";
                    }
                } else {
                    echo "<h1>Username/Password is incorrect!</h1>";
                }
            }
        ?>
<?php        include 'includes/footer.php'; ?>