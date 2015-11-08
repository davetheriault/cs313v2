<?php require 'includes/library_db_connection.php'; ?>
<?php $title = 'Check Book'; ?>
            <?php 
                        if (isset($_POST['title']) && isset($_POST['genre'])){
                            $db->exec('UPDATE books SET title="'.$_POST['title'].'", author="'.$_POST['author'].'",'
                                    . 'genre="'.$_POST['genre'].'" WHERE id = "'.$_POST['book'].'"');
                        }
                    ?>
            <?php include 'includes/header.php'; ?>
            
            <div id="mainContain">
                <div id="mainBox">
                    <h1>Book Check In/Out</h1>
                    
                    <?php 
                        $id = $_POST['book'];
                        $book = $db->query('SELECT * FROM books WHERE id = "'.$id.'"');
                        $book->setFetchMode(PDO::FETCH_ASSOC);
                        $info = $book->fetch();
                        
                    ?>
                                            
                        Book Title: <br>
                        <?php echo $info['title']; ?><br><br>
                        Availability:
                        <?php 
                        if ($result['status'] = '1') { 
                            echo 'Available<br>'
                               . '<form action="bookcheckout.php" method="post">'
                               . 'Check Out To:<select name="user">';
                            echo '<input type="hidden" name="book" value="'.$id.'">';
                            foreach ($db->query('SELECT * FROM users ORDER BY last_name ASC, first_name ASC') as $option){
                                echo '<option value="'.$option['id'].'">'.$option['last_name'].', '.$option['first_name'].'</option>';
                            }
                            echo '</select><br><input type="submit" value="Check Out"></form>';
                        } else { 
                            echo 'Unavailable<br><br>'
                               . 'Due Back: '.$info['date_due'].'<br>'
                               . '<form action="bookcheck.php" method="post">'
                               . '<button name="checkin" type="submit" value="'.$info['id'].'">Check In</button>'
                               . '</form>'; } ?><br>
                        
                    
                    
                    <h4><a href="librarymanagement.php">Return to Management</a></h4>

                </div>  
                <div id="mainBox2">
                </div>
            </div>

<?php include 'includes/footer.php'; ?>