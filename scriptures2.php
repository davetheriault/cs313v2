<?php
require 'includes/dbconnection.php';
?>


<?php $title = 'CS313 Team Readiness Scriptures'; ?>
            
            <?php include 'includes/header.php'; ?>
            
            <div id="mainContain">
            <div id="mainBox">
            <h1>Insert New Scripture</h1>
            
            
            <div>
                <form id="addScripture" action="scriptures2.php">
                    Book: <input type="text" name="book">
                    Chapter: <input type="number" name="chapter">
                    Verse Number: <input type="number" name="verse">
                    Content: <textarea form="addScripture" cols="100" rows="7"></textarea>
                    Topics: <br>
                    <?php 
                    foreach ($db->query('SELECT name FROM topics') as $row){
                        echo '<input type="checkbox" name="topic" value="' . $row['name'] . '">' . $row['name'] . '<br>';
                    } ?>
                    
             
                
                </form>
            </div>

        
    </body>
</html>
at