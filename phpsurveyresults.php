<?php session_start();

$reslts = file_get_contents('phpsurvey.txt');
$sonynum = substr_count($reslts, "y");
$samsnum = substr_count($reslts, "g");
$vizinum = substr_count($reslts, "v");
$pananum = substr_count($reslts, "c");

//type vote numbers
$numlcd = substr_count($reslts, "d");
$numplas = substr_count($reslts, "p");
$numled = substr_count($reslts, "e");
$numoled = substr_count($reslts, "o");

//feat votes
$num3d = substr_count($reslts, "3");
$numwifi = substr_count($reslts, "w");
$numsav = substr_count($reslts, "a");
$numcurv = substr_count($reslts, "0");

//movie votes
$numless = substr_count($reslts, "l");
$num400 = substr_count($reslts, "4");
$num700 = substr_count($reslts, "7");
$nummore = substr_count($reslts, "m");

//total votes
$brandsum = ($sonynum + $samsnum + $vizinum + $pananum);
// averages
$sonyAvg = round(($sonynum / $brandsum * 100), 2);
$samsAvg = round(($samsnum / $brandsum * 100), 2);
$viziAvg = round(($vizinum / $brandsum * 100), 2);
$panaAvg = round(($pananum / $brandsum * 100), 2);

//total type votes
$typeSum = ($numplas + $numlcd + $numled + $numoled);
// averages
$plasAvg = round(($numplas / $typeSum * 100), 2);
$lcdAvg = round(($numlcd / $typeSum * 100), 2);
$ledAvg = round(($numled / $typeSum * 100), 2);
$oledAvg = round(($numoled / $typeSum * 100), 2);

//total
$featSum = ($num3d + $numwifi + $numsav + $numcurv);
//percent 
$_3dAvg = round(($num3d / $featSum * 100), 2);
$wifiAvg = round(($numwifi / $featSum * 100), 2);
$curvAvg = round(($numcurv / $featSum * 100), 2);
$savAvg = round(($numsav / $featSum * 100), 2);

$spendSum = ($numTMNT + $numless + $num400 + $num700 + $nummore);

$_400Avg = round(($num400 / $spendSum * 100), 2);
$_700Avg = round(($num700 / $spendSum * 100), 2);
$moreAvg = round(($nummore / $spendSum * 100), 2);
$lessAvg = round(($numless / $spendSum * 100), 2);
?>

<?php $title = 'Survey Results'; ?>
<?php include 'includes/header.php'; ?>

<div id="mainContain"><br>
            <?php if (isset($_SESSION['voted'])){
                echo 'Your vote has been submitted. Thank you.';} ?>
            <h1>Results</h1>
            
                <h2>Best Brand:</h2><br><?php echo $brandsum . ' total votes'; ?><br>
                <ul class="barGraph">
                    <?php echo "<li class=\"bar1\" style=\"width: " . $sonyAvg*5 . "px;\">Sony<br>" . $sonyAvg . "%</li>"; ?>
                    <?php echo "<li class=\"bar2\" style=\"width: " . $samsAvg*5 . "px;\">Samsung<br>" . $samsAvg . "%</li>"; ?>
                    <?php echo "<li class=\"bar3\" style=\"width: " . $viziAvg*5 . "px;\">Vizio<br>" . $viziAvg . "%</li>"; ?>
                    <?php echo "<li class=\"bar4\" style=\"width: " . $panaAvg*5 . "px;\">Panasonic<br>" . $panaAvg . "%</li>"; ?>
                </ul>
            
                <h2>Best Type:</h2><br><?php echo $typeSum . ' total votes'; ?> <br>
                <ul class="barGraph">
                    <?php echo "<li class=\"bar1\" style=\"width: " . $plasAvg*5 . "px;\">Plasma<br>" . $plasAvg . "%</li>"; ?>
                    <?php echo "<li class=\"bar2\" style=\"width: " . $lcdAvg*5 . "px;\">LCD<br>" . $lcdAvg . "%</li>"; ?>
                    <?php echo "<li class=\"bar3\" style=\"width: " . $ledAvg*5 . "px;\">LED<br>" . $ledAvg . "%</li>"; ?>
                    <?php echo "<li class=\"bar4\" style=\"width: " . $oledAvg*5 . "px;\">OLED<br>" . $oledAvg . "%</li>"; ?>
                </ul>
            
                <h2>Best Feature:</h2><br><?php echo $featSum . ' total votes'; ?> <br>
                <ul class="barGraph">
                    <?php echo "<li class=\"bar1\" style=\"width: " . $_3dAvg*5 . "px;\">3D TV<br>" . $_3dAvg . "%</li>"; ?>
                    <?php echo "<li class=\"bar2\" style=\"width: " . $wifiAvg*5 . "px;\">WiFi<br>" . $wifiAvg . "%</li>"; ?>
                    <?php echo "<li class=\"bar3\" style=\"width: " . $curvAvg*5 . "px;\">Curved_TV<br>" . $curvAvg . "%</li>"; ?>
                    <?php echo "<li class=\"bar4\" style=\"width: " . $savAvg*5 . "px;\">Smell_a_Vision<br>" . $savAvg . "%</li>"; ?>
                </ul>
            
                <h2>Price:</h2><br><?php echo $spendSum . ' total votes'; ?> <br>
                <ul class="barGraph">
                    <?php echo "<li class=\"bar1\" style=\"width: " . $lessAvg*5 . "px;\">&lt;$400<br>" . $lessAvg . "%</li>"; ?>
                    <?php echo "<li class=\"bar2\" style=\"width: " . $_400Avg*5 . "px;\">$400_$700<br>" . $_400Avg . "%</li>"; ?>
                    <?php echo "<li class=\"bar3\" style=\"width: " . $_700Avg*5 . "px;\">$700_$1000<br>" . $_700Avg . "%</li>"; ?>
                    <?php echo "<li class=\"bar4\" style=\"width: " . $moreAvg*5 . "px;\">&gt;$1000<br>" . $moreAvg . "%</li>"; ?>
                </ul>
            
        </div>
        </div>
        
    </body>
</html>
