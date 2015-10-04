<!DOCTYPE html>
<html>
    <head>
        <title>Week 3 Team Readiness Activity</title>
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
                <h1>Week 3 Team Readiness Activity</h1>
                    
                <form id="form1" action="welcome.php" method="post">
                    Name: <input type="text" name="name"><br>
                    <br>
                    Email: <input type="email" name="email"><br>
                    <br>
                    Major: <br>
                    <input type="radio" name="major" value="Computer Science">Computer Science<br>
                    <input type="radio" name="major" value="Web Development and Design">Web Development and Design<br>
                    <input type="radio" name="major" value="Computer information Technology">Computer information Technology<br>
                    <input type="radio" name="major" value="Computer Engineering">Computer Engineering<br>
                    <br>
                    Places you have visited: <br>
                    <input type="checkbox" name="places[]" value="North America">North America<br>
                    <input type="checkbox" name="places[]" value="South America">South America<br>
                    <input type="checkbox" name="places[]" value="Europe">Europe<br>
                    <input type="checkbox" name="places[]" value="Asia">Asia<br>
                    <input type="checkbox" name="places[]" value="Australia">Australia<br>
                    <input type="checkbox" name="places[]" value="Africa">Africa<br>
                    <input type="checkbox" name="places[]" value="Antarctica">Antarctica<br>
                    <br>
                    Comments: <br>
                    <textarea name="comments" form="form1" style="width: 600px;"></textarea><br><br>
                    <input type="submit">
                                     
                </form>
                
            </div>
        </div>
    </body>
</html>