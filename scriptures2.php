<?php
require 'includes/dbconnection.php';
?>


<?php $title = 'CS313 Team Readiness Scriptures 2'; ?>
            
            <?php include 'includes/header.php'; ?>
            
            <div id="mainContain">
            <div id="mainBox">
            <h1>Insert New Scripture</h1>
            
            
            <div>
                <form id="addScripture" action="scriptureadd.php" method="post">
                    Book: <input type="text" name="book"><br>
                    Chapter: <input type="number" name="chapter"><br>
                    Verse Number: <input type="number" name="verse"><br>
                    Content: <textarea form="addScripture" cols="100" rows="7" name="content"></textarea><br>
                    Topics: <br>
                    <?php
                    foreach ($db->query('SELECT name FROM topics') as $row){
                        echo '<input type="checkbox" name="topic[]" value="' . $row['name'] . '">' . $row['name'] . '<br>';
            }
                    ?>
                    
                    <input type="submit" value="Submit">
             
                
                </form>
            </div>
            <div>
                
                
     
        </div>
        </div>
        
    </body>
</html>
