<?php
    session_start();
    require 'includes/dbconnection.php';
    include 'includes/hashthing.php';
    $title = "Sign Up";
    include 'includes/header.php';
?>
        <h1>Sign Up</h1>
        <form id="signUpForm" method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
            Username: <input type="text" name="username" required/><br />
            Password: <input type="password" name="password" required/>
            <?php
                if (isset($_POST['password']) && isset($_POST['confirm']) &&
                    $_POST['password'] !== $_POST['confirm']) {
                    echo "<span style='color:red;'>*</span>";
                }
            ?>
            <br />
            Confirm Password: <input type="password" name="confirm" required/>
            <?php
                if (isset($_POST['password']) && isset($_POST['confirm']) &&
                    $_POST['password'] !== $_POST['confirm']) {
                    echo "<span style='color:red;'>*</span>";
                }
            ?>
            <br />
            
            <input name="submit" type="submit" value="Sign Up" />
        </form>
        <br>
        <a href="signin.php">Already have an account?...</a>
        <?php 
            if (isset($_POST['submit']) && isset($_POST['username']) &&
                isset($_POST['password']) && isset($_POST['confirm'])) {
                   
                $results = $db->query("SELECT * FROM users WHERE user_name = '" . $_POST['username'] . "' LIMIT 1");
                
                if ($results !== false ) {
                    echo "<h3>Username is not available.</h3>";
                } 
                
                else if ($_POST['password'] === $_POST['confirm']){
                    if( preg_match( '~\d~', $_POST['password']) && (strlen( $_POST['password']) >= 7)){
                         
                        $hashedpass = password_hash($_POST['password'], PASSWORD_DEFAULT);


                        if ($db->exec('INSERT INTO users (username, password) VALUES ("' . $_POST['username'] . '", "' . $hashedpass . '")')) {
                        header('Location: signin.php');
                        exit();
                        } else {
                            echo "<h3>Database error. Username might not be available.</h3>";
                        }
                    }
                    else {
                        echo "<h3 style='color:red;'>The password must contain seven or more characters and at least one must be a number.</h3>";
                    }
                }
                else { 
                
                    echo "<h3 style='color:red;'>Passwords do not match.</h3>"; 
                    
                }
                }
        ?>
<?php include 'includes/footer.php';