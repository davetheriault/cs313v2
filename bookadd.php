<?php require 'includes/library_db_connection.php'; ?>

<?php 

    $db->exec('INSERT INTO books (title, author, genre) '
            . 'VALUES ('
            . '"'.$_POST['title'].'", '
            . '"'.$_POST['author'].'", '
            . '"'.$_POST['genre'].'" '
            . ')');
?>

<?php $title = 'Confirm'; ?>
            
            <?php include 'includes/header.php'; ?>
            
            <div id="mainContain">
                <div id="mainBox">
                    <h1>Confirmation</h1>
                    <p>
                        The following book was added to inventory: <br>
                        
                        <?php 
                            foreach ($db->query('SELECT * FROM books WHERE title = "'.$_POST['title'].'" '
                                    . 'AND author = "'.$_POST.'" AND genre = "'.$_POST.'"') as $conf) {
                            echo $conf['title'] . '<br>';
                            echo $conf['author'] . '<br>';
                            echo $conf['genre'] . '<br>';
                            echo $conf['status'] . '<br>';
                            }
                        ?>
                    </p>
                    <a href="librarymanagement.php">Return to Management</a>
                    
                </div>
            </div>

<?php include 'includes/footer.php'; ?>
