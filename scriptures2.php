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
                    Book: <br>
                    <input type="text" name="book" required><br><br>
                    Chapter: <br><input type="number" name="chapter" required=""><br><br>
                    Verse Number: <br><input type="number" name="verse" required=""><br><br>
                    Content: <br><textarea form="addScripture" cols="60" rows="7" name="content" required=""></textarea><br><br>
                    Topics: <br>
                    <?php
                    foreach ($db->query('SELECT name FROM topics') as $row){
                        echo '<input type="checkbox" name="topic[]" value="' . $row['name'] . '">' . $row['name'] . '<br>';
            }
                    ?>
                    
                    <input type="submit" value="Submit">
             
                
                </form>
            </div>
           
            <?php 
                    if (isset($_POST['book'])) {
                        try {
                        $verse = (int)$_POST['verse'];
                        $book = $_POST['book'];
                        $chapter = (int)$_POST['chapter'];
                        $content = $_POST['content'];
                        $topics = $_POST['topic'];
                        
                        
                        
                        $db->exec('INSERT INTO scriptures (book, chapter, verse, content) VALUES ("' . $book . '", ' . $chapter.', '.$verse.', "'.$content.'") ') ;

                        $scripId = $db->query('SELECT id FROM scriptures WHERE book = "' . $book . '" AND chapter = '.$chapter.' AND verse = '.$verse.' ');
                        $scripId->setFetchMode(PDO::FETCH_ASSOC);
                        $scripId = $scripId->fetch();
                        $sId = (int)$scripId['id'];
                        
                        foreach ($topics as $topic) { 
                            foreach ($db->query('SELECT id FROM topics WHERE name = "' .$topic. '" ') as $topicId) {
                                
                                $tId = (int)$topicId['id'];
                                $db->exec('INSERT INTO topiclink (topic_id, scripture_id) VALUES ( '.$tId.', '.$sId.' ) ');
                            }    
                        }
                        
                        
                        echo "<br>Scripture Inserted";
                        } catch (PDOException $e)    {
                                     echo $sql . "<br>" . $e->getMessage();
                        }
                        unset($_POST['book']);
                    }
                    
                        include 'scriptureadd.php';
                ?>


                
                
     
        </div>
        </div>
        
    </body>
</html>
