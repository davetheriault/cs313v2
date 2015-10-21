<?php
require 'includes/dbconnection.php';
?>


<?php $title = 'CS313 Team Readiness Scriptures 2'; ?>
            
            <?php include 'includes/header.php'; ?>
            
            <div id="mainContain">
            <div id="mainBox">
            <h1>Insert New Scripture</h1>
            
            
            <div>
                <form id="addScripture" action="scriptures2.php" method="post">
                    Book: <input type="text" name="book"><br>
                    Chapter: <input type="number" name="chapter"><br>
                    Verse Number: <input type="number" name="verse"><br>
                    Content: <textarea form="addScripture" cols="100" rows="7"></textarea><br>
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
                <?php 
                    if (isset($_POST['book'])) {
                        try {
                        $verse = $_POST['verse'];
                        $book = $_POST['book'];
                        $chapter = $_POST['chapter'];
                        $content = $_POST['content'];
                        $topics = $_POST['topic'];
                        $db->exec('INSERT INTO scriptures (book, chapter, verse, content) VALUES ("'.$book.'", '.$chapter.', '.$verse.', "'.$content.'"') ;
                        
                        $scripId = $db->query('SELECT id FROM scriptures WHERE book = "' . $book . '" AND chapter = '.$chapter.' AND verse = '.$verse.' ');
                        foreach ($topics as $topic) { 
                            $topicID[] = $db->query('SELECT id FROM topics WHERE name = "' .$topic. '" '); 
                        
                            foreach ($topicID as $topId) { 
                                $db->exec('INSERT INTO topic_verse_link (topic_id, scripture_id) VALUES (' . $topID . ', ' .$scripID. ' )');
                            }
                                    
                        }
                        echo "Scripture Inserted";
                        } catch (PDOException $e)    {
                                     echo $sql . "<br>" . $e->getMessage();
                        }
                    }
                ?>
     
        </div>
        </div>
        
    </body>
</html>
