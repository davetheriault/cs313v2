<?php require 'includes/dbconnection.php'; ?>

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
                        
                        echo $scripId['id'];
                        
                        foreach ($topics as $topic) { 
                            foreach ($db->query('SELECT id FROM topics WHERE name = "' .$topic. '" ') as $topicId) {
                                
                                echo '<br>' . $topicId['id'];
                                
                                $stmt  = 'INSERT INTO topic_verse_link ';
                                $stmt .= '(topic_id, scripture_id) ';
                                $stmt .= 'VALUES (';
                                $stmt .= $topicId['id'];
                                $stmt .= ', ';
                                $stmt .= $scripId['id'];
                                $stmt .= ')';
                                        
                                $db->exec($stmt);
                            }    
                        }
                        
                     
                        echo "<br><br>Scripture Inserted";
                        } catch (PDOException $e)    {
                                     echo $sql . "<br>" . $e->getMessage();
                        }
                    }
                ?>

<?php include 'scripture.php'; ?>