<?php require 'includes/library_db_connection.php'; ?>

<?php 

    $date = date("Y-m-d");
    $due = date("Y-m-d", strtotime("+2 weeks"));
    
    if (isset($_POST['user']) && isset($_POST['book'])) {
        $db->exec('UPDATE books SET user_id="'.$_POST['user'].'", status="0", date_out="'.$date.'", date_due="'.$due.'"'
                . 'WHERE id = "'.$_POST['book'].'"');
    }
?>


<?php header('Location: librarymanagement.php'); exit; ?>

