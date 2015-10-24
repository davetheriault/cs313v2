<?php include 'includes/library_db_connection.php'; ?>

<?php $title = 'Library Management'; ?>
            
            <?php include 'includes/header.php'; ?>
            
            <div id="mainContain">
                <div id="mainBox">
                    <h1>Library Management</h1>
                    
                    <h2>Add a book to inventory</h2>
                    
                    <form id="addBook" action="addBook.php" method="post">
                        Book Title: <br>
                        <input type="text" name="title" id="titleInput"><br><br>
                        
                    </form>
                    
                    <!-- Button trigger modal -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
                    
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
                                        echo '<div class="result">Title: '.$result['title'].'<br>'
                                                . 'Author: '.$result['author'].'<br>'
                                                . 'Genre: '.$result['genre'].'<br>'
                                                . 'Status: ';
                                        if ($result['status'] == '1') { echo 'Available'; }
                                        else { echo 'Unavailable<br>'
                                            . 'Due Back: '.$result['date_due'].''; }
                                        echo '<br></div>';
                                    }
                                }
                                if ($srchby = 'author') {
                                    foreach ($db->query('SELECT * FROM books WHERE author LIKE "%'.$strng.'%" GROUP BY title') as $result) {
                                        echo '<div class="result">Title: '.$result['title'].'<br>'
                                                . 'Author: '.$result['author'].'<br>'
                                                . 'Genre: '.$result['genre'].'<br>'
                                                . 'Status: ';
                                        if ($result['status'] == '1') { echo 'Available'; }
                                        else { echo 'Unavailable<br>'
                                            . 'Due Back: '.$result['date_due'].''; }
                                        echo '<br></div>';
                                    }
                                }
                            }
                        ?>
                        <?php 
                            if (isset($_GET['genre'])) {
                                $gnre = $_GET['genre'];
                                foreach ($db->query('SELECT * FROM books WHERE genre = "'.$gnre.'"') as $result) {
                                    echo '<div class="result">Title: '.$result['title'].'<br>'
                                            . 'Author: '.$result['author'].'<br>'
                                            . 'Genre: '.$result['genre'].'<br>'
                                            . 'Status: ';
                                    if ($result['status'] == '1') { echo 'Available'; }
                                    else { echo 'Unavailable<br>'
                                        . 'Due Back: '.$result['date_due'].''; }
                                    echo '<br></div>';
                                }
                            }
                        ?>
                    </div>
                </div>  
            </div>
        </div>
    </body>
</html>