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
                        . $row['content'] . '"</div><br><br>';
            }
            ?>
            <div>
                Search for scripture by book:
                <form id="searchBook" action="scripture.php" method="post">
                    <input type='radio' name='book' value='john' />John <br>
                    <input type='radio' name='book' value='doctrine and covenants' />Doctrine and Covenants <br>
                    <input type='radio' name='book' value='mosiah' />Mosiah <br>

                    <input type="submit" value="Submit">
                </form>
                <?php 
                    if (isset($_POST['book'])) {
                        echo '<p>Scriptures from the book of ' . $_POST['book'] . ':<br>';
                        foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures WHERE book = "' . $_POST['book'] . '"') as $results){
                            echo '<div class="block"><strong>'. $results['book'] . ' ' . $results['chapter'] . ':' . $results['verse'] . '</strong> - "'
                        . $results['content'] . '"</div><br><br>';
                    
                        }
                    }
                    echo $_POST['book'];
                ?>
            </div>
        </div>
        </div>
        
    </body>
</html>
