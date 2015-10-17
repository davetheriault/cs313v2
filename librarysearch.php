<?php $title = 'Library Search'; ?>
            
            <?php include 'includes/header.php'; ?>
            
            <div id="mainContain">
                <div id="mainBox">
                    <h1>Find a Book</h1>
                    
                    <form id="searchBooks" action="librarysearch.php">
                        <input name="bkstring" type="text">
                        <select name="searchby">
                            <option value="title">by Title</option>
                            <option value="author">by Author</option>
                        </select>
                        <input type="submit" value="Submit">
                        
                    </form>
                </div>  
            </div>
        </div>
    </body>
</html>