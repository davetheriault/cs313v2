<?php $title = "TV Survey"; ?>

<?php include 'includes/header.php'; ?>

            <div id="mainContain">
                <h1>Welcome!</h1>
                
                <section>
                    <form action="phpsurveysubmit.php" method="post" id="tvform">
                
                    <h2>Out of the following, which brand makes the highest quality televisions?</h2><br>
                
                    <input type="radio" name="brand" value="y">Sony<br>
                    <input type="radio" name="brand" value="g">Samsung<br>
                    <input type="radio" name="brand" value="v">Visio<br>
                    <input type="radio" name="brand" value="c">Panasonic<br>
                    <br>                   
                
                    <h2>In your opinion, what type of television produces the best picture?</h2><br>
                    
                    <input type="radio" name="type" value="d">LCD<br>
                    <input type="radio" name="type" value="p">Plasma<br>
                    <input type="radio" name="type" value="e">LED<br>
                    <input type="radio" name="type" value="o">OLED<br>
                    <br>                    
                
                    
                    <h2>Which of the following features would you most prefer in a television?</h2>
                    <br>
                    <input type="radio" name="feat" value="3">3D TV<br>
                    <input type="radio" name="feat" value="w">WiFi<br>
                    <input type="radio" name="feat" value="a">Smell-a-Vision<br>
                    <input type="radio" name="feat" value="0">Curved TV<br>
                
                    
                    <h2>How much would you spend on a new television?</h2>
                    <br>
                    <input type="radio" name="spend" value="l">Less than $400<br>
                    <input type="radio" name="spend" value="4">$400 to $700<br>
                    <input type="radio" name="spend" value="7">$700 to $1000<br>
                    <input type="radio" name="spend" value="m">More than $1000<br>
               
            </form>
                    <br>
                    <br>
                <input type="submit" form="tvform"><br>
                <br>
                <a href="phpsurveyresults.php">Skip to results</a>
                <br><br>
                </section>
                    
                
                
            </div>
        </div>
    </body>
</html>