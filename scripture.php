<?php
require 'includes/dbconnection.php';

?>
<?php $title = 'CS313 Theriault'; ?>
            
            <?php include 'includes/header.php'; ?>
            
            <div id="mainContain">
            <div id="mainBox">
            <h1>Scripture Resources</h1>
            <?php 
            foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures') as $row){
                echo '<div class="block"><strong>'. $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</strong> - "'
                        . $row['content'] . '"</div>';
            }
            ?>
            
        </div>
        </div>
        
    </body>
</html>
