<h1>Scripture Resources</h1>
            <?php 
            foreach ($db->query('SELECT id, book, chapter, verse, content FROM scriptures ORDER BY book ASC') as $row){
                echo '<div class="block"><strong>'. $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</strong> - "'
                        . $row['content'] . '" <br> <div style="font-size: 0.9em; font-family: serif; color: darkgray;">Related Topics:<br>';
                foreach ($db->query('SELECT topic_id FROM topiclink WHERE scripture_id = "' . $row['id'] . '"') as $top){
                    foreach ($db->query('SELECT name FROM topics WHERE id = "'.$top['topic_id'].'"') as $topname) {
                        echo $topname['name'] . "<br>";
                    }
                }
                
                echo '</div></div><br><br>';
            }
            
            ?>