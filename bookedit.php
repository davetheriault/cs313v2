<?php require 'includes/library_db_connection.php'; ?>
<?php $title = 'Edit Book'; ?>
            
            <?php include 'includes/header.php'; ?>
            
            <div id="mainContain">
                <div id="mainBox">
                    <h1>Edit Book</h1>
                    
                    <?php 
                        $id = $_POST['book'];
                        $book = $db->query('SELECT * FROM books WHERE id = "'.$id.'"');
                        $book->setFetchMode(PDO::FETCH_ASSOC);
                        $info = $book->fetch();
                        var_dump($info);
                    ?>
                    
                    <form id="addBook" action="bookedit.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        Book Title: <br>
                        <input type="text" name="title" value="<?php echo $info['title']; ?>" class="textInput" required="required"><br><br>
                        Author: <br>
                        <input type="text" name="author" value="<?php echo $info['author']; ?>" class="textInput" required="required"><br><br>
                        Genre:<br>
                        <input type="text" name="genre" value="<?php echo $info['genre']; ?>" class="textInput" required="required"><br><br>
                        Availability:
                        <?php if ($result['status'] == '1') { echo 'Available'; }
                                        else { echo 'Unavailable<br><br>'
                                            . 'Due Back: '.$info['date_due'].''; } ?><br>
                        <?php echo '<form action="bookcheck.php" method="post">'
                        . '<button name="book" type="submit" value="'.$info['id'].'">Check Out/In</button>'; ?><br>
                        <input type="submit" value="Submit"><br>
                    </form>
                    <?php 
                        if (isset($_POST['title'])){
                            $db->exec('UPDATE books SET title="'.$_POST['title'].'", author="'.$_POST['author'].'",'
                                    . 'genre="'.$_POST['genre'].'" WHERE id = "'.$_POST['id'].'"');
                        }
                    ?>

                </div>  
                <div id="mainBox2">
                </div>
            </div>

<?php include 'includes/footer.php'; ?>