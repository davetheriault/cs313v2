<?php require 'includes/library_db_connection.php'; ?>

<?php 
    if (isset($_POST)){
    $db->exec('INSERT INTO books (title, author, genre) '
            . 'VALUES ('
            . '"'.$_POST['title'].'", '
            . '"'.$_POST['author'].'", '
            . '"'.$_POST['genre'].'" '
            . ')');
    }
?>

<?php $title = 'Confirm'; ?>
            
            <?php include 'includes/header.php'; ?>
            
            <div id="mainContain">
                <div id="mainBox">
                    <h1>Confirmation</h1>
                    <p>
                        <?php 
                        if (isset($_POST)){
                            echo $_POST['title'] . 'was added to inventory. <br><br>';
                        } else {
                            echo '';
                        }
                        ?>
                        <a href="librarymanagement.php">Return to Management</a>
                    </p>
                </div>
            </div>

<?php include 'includes/footer.php'; ?>
