<h1>Scripture Resources</h1>
            <?php 
            foreach ($db->query('SELECT book, chapter, verse, content FROM scriptures') as $row){
                echo '<div class="block"><strong>'. $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</strong> - "'
                        . $row['content'] . '"</div><br><br>';
            }
            
            ?>