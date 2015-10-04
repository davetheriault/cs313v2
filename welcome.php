<?php $title = 'Welcome ' . $_POST['name'] . "!"; ?>

<?php include 'includes/header.php'; ?>


            <div id="mainContain">
                <h1>Welcome!</h1>
                
                <section>
                    <strong>Welcome, <?php echo $_POST['name'];?>!</strong><br><br>
                    
                    <strong>Your Email:</strong> <?php echo $_POST['email']; ?> <br><br>
                    
                    <strong>Your Major:</strong> <?php echo $_POST['major']; ?> <br><br>
                    
                    <strong>Places Visited:</strong> <br>
                        <?php foreach($_POST['places'] as $selected){
                        echo $selected . "</br>"; } ?><br><br>
                    
                        <strong>Comments:</strong> <br>
                    <?php echo $_POST['comments']; ?>
                    
                </section>
                    
                
                
            </div>
        </div>
    </body>
</html>