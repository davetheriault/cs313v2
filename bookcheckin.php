<?php require 'includes/library_db_connection.php'; ?>
<?php
    if (isset($_POST['book'])){
       $db->exec('UPDATE books SET user_id="1", status="1", date_due="0000-00-00", date_out="0000-00-00" WHERE id = "'.$_POST['book'].'"');

    }

?>
<?php header('Location: librarymanagement.php');
    exit; ?>

