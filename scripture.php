<?php
require 'includes/dbconnection.php';
?>


<?php $title = 'CS313 Team Readiness Scriptures'; ?>
            
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
                <h3>Display scriptures by book:</h3>
                <form id="searchBook" action="scripture.php" method="post">
                    <input type='radio' name='book' value='john' />John <br>
                    <input type='radio' name='book' value='doctrine and covenants' />Doctrine and Covenants <br>
                    <input type='radio' name='book' value='mosiah' />Mosiah <br><br>

                    <input type="submit" value="Submit"><br><br>
                </form>
                <?php 
                    if (isset($_POST['book'])) {
                        echo '<p>Scriptures from the book of <span style="text-transform: capitalize;">' . $_POST['book'] . '</span>:</p><br>';
                        foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures WHERE book = "' . $_POST['book'] . '"') as $results){
                            echo '<div class="block"><strong>'. $results['book'] . ' ' . $results['chapter'] . ':' . $results['verse'] . '</strong> - "'
                        . $results['content'] . '"</div><br><br>';
                    
                        }
                    }
                    ?><br><br>
            </div>
        </div>
        </div>
        
    </body>
</html>
