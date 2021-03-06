<?php include 'includes/library_db_connection.php'; ?>

<?php $title = 'Library Search'; ?>
            
            <?php include 'includes/header.php'; ?>
            
            <div id="mainContain">
                <div id="mainBox">
                    <h1>Find a Book</h1>
                    
                    <form id="searchBooks" action="librarysearch.php" method="get">
                        <input id="bookSearch" name="bkstring" type="search">
                        <select name="searchby">
                            <option value="title">by Title</option>
                            <option value="author">by Author</option>
                        </select>
                        <input type="submit" value="Submit">
                        <a href="librarysearch.php?browse=true">Browse by Genre</a>
                    </form>
                    
                    <div id="results">
                        <?php 
                            if (isset($_GET['browse'])) {
                                foreach ($db->query('SELECT DISTINCT genre FROM books') as $genre){
                                    echo '<h2><a href="librarysearch.php?genre='.$genre['genre'].'">'
                                            . $genre['genre'] . '</a></h2>';
                                }
                            }

                        ?>
                        
                        <?php
                            if (isset($_GET['bkstring']) & isset($_GET['searchby'])) {
                                $strng = $_GET['bkstring'];
                                $srchby = $_GET['searchby'];
                                
                                if ($srchby = 'title') {
                                    foreach ($db->query('SELECT * FROM books WHERE title LIKE "%'.$strng.'%" GROUP BY title') as $result) {
                                        echo '<div class="result">Title: <span class="value">'.$result['title'].'</span><br>'
                                                . 'Author: <span class="value">'.$result['author'].'</span><br>'
                                                . 'Genre: <span class="value">'.$result['genre'].'</span><br>'
                                                . 'Status: <span class="value">';
                                        if ($result['status'] == '1') { echo 'Available</span>'; }
                                        else { echo 'Unavailable</span><br>'
                                            . 'Due Back: <span class="value">'.$result['date_due'].''; }
                                        echo '</span><br></div>';
                                    }
                                }
                                if ($srchby = 'author') {
                                    foreach ($db->query('SELECT * FROM books WHERE author LIKE "%'.$strng.'%" GROUP BY title') as $result) {
                                        echo '<div class="result">Title: <span class="value">'.$result['title'].'</span><br>'
                                                . 'Author: <span class="value">'.$result['author'].'</span><br>'
                                                . 'Genre: <span class="value">'.$result['genre'].'</span><br>'
                                                . 'Status: <span class="value">';
                                        if ($result['status'] == '1') { echo 'Available</span>'; }
                                        else { echo 'Unavailable</span><br>'
                                            . 'Due Back: <span class="value">'.$result['date_due'].''; }
                                        echo '</span><br></div>';
                                    }
                                }
                            }
                        ?>
                        <?php 
                            if (isset($_GET['genre'])) {
                                $gnre = $_GET['genre'];
                                foreach ($db->query('SELECT * FROM books WHERE genre = "'.$gnre.'"') as $result) {
                                    echo '<div class="result">Title: <span class="value">'.$result['title'].'</span><br>'
                                            . 'Author: <span class="value">'.$result['author'].'</span><br>'
                                            . 'Genre: <span class="value">'.$result['genre'].'</span><br>'
                                            . 'Status: <span class="value">';
                                    if ($result['status'] == '1') { echo 'Available</span>'; }
                                    else { echo 'Unavailable</span><br>'
                                        . 'Due Back: <span class="value">'.$result['date_due'].''; }
                                    echo '</span><br></div>';
                                }
                            }
                        ?>
                    </div>
                </div>  
            </div>
        </div>
    </body>
</html>