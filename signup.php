
// SECOND PAGE (SIGN-UP PAGE)
<?php
    session_start();
    require 'includes/dbconnection.php';
?>
<?php require 'includes/header.php'; ?>

        <h1>Sign Up</h1>
        <form id="signUpForm" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
            Username: <input type="text" name="username" required/><br />
            Password: <input type="password" name="password" required/><br />
            Confirm Password: <input type="password" name="confirm" required/><br />
            
            <input name="submit" type="submit" value="Sign Up" />
        </form>
        <?php
            $results = $db->query("SELECT * FROM users WHERE user_name = '" . $_POST['username'] . "' LIMIT 1");
                
                 
            if (isset($_POST['submit']) && isset($_POST['username']) &&
                   isset($_POST['password']) && isset($_POST['confirm'])) {
                
                if ($results !== false || $results->rowCount() === 1) {
                    echo "Username is not available.";
                } 
                
                else if ($_POST['password'] === $_POST['confirm']){
                    
                    $hashedpass = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    
                    $db->exec('INSERT INTO users (username, password) VALUES ("'.$_POST['username'].'", "'.$hashedpass.'")');
                }
                else { 
                
                    echo "Passwords do not match." ;
                    
                }
        ?>
        
<?php include 'includes/footer.php'; ?>