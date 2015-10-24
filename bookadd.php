<?php require 'includes/library_db_connection.php'; ?>

<?php 

    $db->exec('INSERT INTO books (title, author, genre) '
            . 'VALUES ('
            . '"'.$_POST['title'].'", '
            . '"'.$_POST['author'].'", '
            . '"'.$_POST['genre'].'" '
            . ')');
?>

<?php
    header("Location: librarymanagement.php");
    exit;
?>
