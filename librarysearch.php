<?php include 'includes/library_db_connection.php'; ?>

<?php $title = 'Library Search'; ?>
            
            <?php include 'includes/header.php'; ?>
            
            <div id="mainContain">
                <div id="mainBox">
                    <h1>Find a Book</h1>
                    
                    <form id="searchBooks" action="librarysearch.php" method="get">
                        <input name="bkstring" type="text">
                        <select name="searchby">
                            <option value="title">by Title</option>
                            <option value="author">by Author</option>
                        </select>
                        <input type="submit" value="Submit">
                        <a href="librarysearch.php?browse=true">Browse by Genre</a>
                    </form>
                    
                    <div id="results">
                    <?php 
                        if ($_GET['browse'] = 'true') {
                            foreach ($db->query('SELECT DISTINCT genre FROM books') as $genre){
                                echo '<h2><a href="librarysearch.php?genre='.$genre['genre'].'">'
                                        . $genre['genre'] . '</a></h2>';
                            }
                        }
                    
                    ?>
                    </div>
                </div>  
            </div>
        </div>
    </body>
</html>