<?php include 'includes/library_db_connection.php'; ?>

<?php $title = 'Library Management'; ?>
            
            <?php include 'includes/header.php'; ?>
            
            <div id="mainContain">
                <div id="mainBox">
                    <h1>Library Management</h1>
                    
                    <div class="formbox">
                    <h3><a href="#" id="addLink">+Add a book to inventory</a></h3>
                    
                    <form id="addBook" class="hide" action="bookadd.php" method="post">
                        Book Title: <br>
                        <input type="text" name="title" class="textInput" required="required"><br><br>
                        Author: <br>
                        <input type="text" name="author" class="textInput" required="required"><br><br>
                        Genre:<br>
                        <input type="text" name="genre" class="textInput" required="required"><br><br>
                        <input type="submit" value="Submit"><br>
                    </form>
                    </div>
                    
                    <form id="searchBooks" action="librarymanagement.php" method="get">
                        <input id="bookSearch" name="bkstring" type="search">
                        <select name="searchby">
                            <option value="title">by Title</option>
                            <option value="author">by Author</option>
                        </select>
                        <input type="submit" value="Submit">
                        <a href="librarymanagement.php?browse=true">Browse by Genre</a>
                    </form>
                    
                    <div id="results">
                        <?php 
                            if (isset($_GET['browse'])) {
                                foreach ($db->query('SELECT DISTINCT genre FROM books') as $genre){
                                    echo '<h2><a href="librarymanagement.php?genre='.$genre['genre'].'">'
                                            . $genre['genre'] . '</a></h2>';
                                }
                            }

                        ?>
                        
                        <?php
                            if (isset($_GET['bkstring']) & isset($_GET['searchby'])) {
                                $strng = $_GET['bkstring'];
                                $srchby = $_GET['searchby'];
                                
                                if ($srchby == 'title') {
                                    foreach ($db->query('SELECT * FROM books WHERE title LIKE "%'.$strng.'%" GROUP BY title') as $result) {
                                        echo '<div class="result">Title: <span class="value">'.$result['title'].'</span><br>'
                                                . 'Author: <span class="value">'.$result['author'].'</span><br>'
                                                . 'Genre: <span class="value">'.$result['genre'].'</span><br>'
                                                . 'Status: <span class="value">';
                                        if ($result['status'] == '1') { echo 'Available</span>'; }
                                        else { echo 'Unavailable</span><br>'
                                            . 'Due Back: <span class="value">'.$result['date_due'].'</span>'; }
                                        echo '<form action="bookedit.php" method="post">'
                                            . '<button name="book" type="submit" value="'.$result['id'].'">Edit</button></form>';
                                        echo '<form action="bookcheck.php" method="post">'
                                        . '<button name="book" type="submit" value="'.$result['id'].'">Check Out/In</button></form></div>';
                                    }
                                }
                                if ($srchby == 'author') {
                                    foreach ($db->query('SELECT * FROM books WHERE author LIKE "%'.$strng.'%" GROUP BY title') as $result) {
                                        echo '<div class="result">Title: <span class="value">'.$result['title'].'</span><br>'
                                                . 'Author: <span class="value">'.$result['author'].'</span><br>'
                                                . 'Genre: <span class="value">'.$result['genre'].'</span><br>'
                                                . 'Status: <span class="value">';
                                        if ($result['status'] == '1') { echo 'Available</span>'; }
                                        else { echo 'Unavailable</span><br>'
                                            . 'Due Back: <span class="value">'.$result['date_due'].'</span>'; }
                                        echo '<form action="bookEdit.php" method="post">'
                                            . '<button name="book" type="submit" value="'.$result['id'].'">Edit</button></form>';
                                        echo '<form action="bookCheck.php" method="post">'
                                        . '<button name="book" type="submit" value="'.$result['id'].'">Check Out/In</button></form></div>';
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
                                        . 'Due Back: <span class="value">'.$result['date_due'].'</span>'; }
                                    echo '<form action="bookEdit.php" method="post">'
                                            . '<button name="book" type="submit" value="'.$result['id'].'">Edit</button></form>';
                                    echo '<form action="bookCheck.php" method="post">'
                                    . '<button name="book" type="submit" value="'.$result['id'].'">Check Out/In</button></form></div>';
                                }
                            }
                        ?>
                    </div>
                </div>  
            </div>

<?php require 'includes/footer.php'; ?>

<script>
    $('#addLink').click(function(){
        $('#addBook').toggleClass('hide');
    })

</script>