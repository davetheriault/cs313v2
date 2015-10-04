<!DOCTYPE html>
<html>
    <head>
        <title>Welcome <?php echo $_POST['name'];?>!</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="container">
            
            <div id="header">
                <div id="headLogo">
                    <img src="images/dave_theriault_logo.png" alt="Dave Theriault Logo">
                </div>
                <div id="headerBox"><div id="headTitle">David Theriault's CS313 Site</div></div>
            </div>
            <div id="mainContain">
                <h1>Welcome!</h1>
                
                <section>
                    Welcome, <?php echo $_POST['name'];?><br><br>
                    
                    Your Email: <?php echo $_POST['email']; ?> <br><br>
                    
                    Your Major: <?php echo $_POST['major']; ?> <br><br>
                    
                    Visited: <br><?php foreach($_POST['places[]'] as $selected){
                        echo $selected . "</br>"; } ?><br><br>
                      Visited: <br><?php echo $_POST['places']; ?><br><br>
                    Comments: <br>
                    <?php echo $_POST['comments']; ?>
                    
                </section>
                    
                
                
            </div>
        </div>
    </body>
</html>