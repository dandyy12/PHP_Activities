<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peys App</title>
</head>
<body>
    <h3>Peys App</h3>

    <form method="post">
        <label for="txtSize">Select Photo Size: </label>
        <input type="range" name="txtSize" id="txtSize" min="10" max="100" step="10"><br>
        
        <label for="">Select Border Color: </label>
        <input type="color" name="clrTheme" id="clrTheme" value="#000000" ><br>
        <input type="submit" name="btnProceed" value="Proceed">   
    </form>
</body>
<?php 
echo '<br>';
    if (isset($_REQUEST['btnProceed'])) {
        $borderColor = $_REQUEST['clrTheme'];
        $size = $_REQUEST['txtSize'];
        }
        echo '<img src="whatareu.png" width="' . (empty($size) ? '60' : $size) . '%" height="' . (empty($size) ? '60' : $size) . '%" style="border:5px solid '. (empty($borderColor) ? '#000000' : $borderColor) . ';">'
        ?>
</html>