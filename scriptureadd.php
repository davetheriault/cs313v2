<h1>Scripture Resources</h1>
            <?php 
            foreach ($db->query('SELECT id, book, chapter, verse, content FROM scriptures ORDER BY book ASC') as $row){
                echo '<div class="block"><strong>'. $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</strong> - "'
                        . $row['content'] . '" <br><br><div id="topix">Related Topics:<ul id="relTop">';
                foreach ($db->query('SELECT DISTINCT topic_id FROM topiclink WHERE scripture_id = "' . $row['id'] . '"') as $top){
                    foreach ($db->query('SELECT DISTINCT name FROM topics WHERE id = "'.$top['topic_id'].'"') as $topname) {
                        echo "<li>" . $topname['name'] . "</li>";
                    }
                }
                
                echo '</ul></div></div><br><br>';
            }
            
            ?>