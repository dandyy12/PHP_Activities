<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendo Machine</title>
</head>
<body>
    <h2>Vendo Machine</h2>

    <form method="post">
        <fieldset style="width: 35%;">
            <legend>Products: </legend>
            <input type="checkbox" name="chkDrink[]" id="chkCoke" value="Coke">
            <label for="chkCoke">Coke - ₱ 15</label><br>
            <input type="checkbox" name="chkDrink[]" id="chkRoyal" value="Royal">
            <label for="chkRoyal">Royal - ₱ 20</label><br>
            <input type="checkbox" name="chkDrink[]" id="chkSprite" value="Sprite">
            <label for="chkSprite">Sprite - ₱ 20</label><br>
            <input type="checkbox" name="chkDrink[]" id="chkPepsi" value="Pepsi">
            <label for="chkPepsi">Pepsi - ₱ 15</label><br>
            <input type="checkbox" name="chkDrink[]" id="chkMountain Dew" value="Mountain Dew">
            <label for="chkMountain Dew">Mountain Dew - ₱ 20</label><br>
        </fieldset>
           

    

        <fieldset style="width: 35%;">
        <legend>Options: </legend>
                    <label for="sizes">Size:</label>
                    <select name="size" id="sizes">
                        <option value="Regular">Regular</option>
                        <option value="Up-size">Up-Size (add 5)</option>
                        <option value="Large">Jumbo (add 10)</option>
                    </select>
                    <label for="txtNumber"> Quantity:</label>
                    <input type="number" name=quantity id="txtNumber" min="1" required>
                    <input type="submit" name="btnCheckout" value="Check Out">
        </fieldset>

    </form>
    <hr>
</body>
<?php
    if (isset($_POST['btnCheckout'])) {
        if (isset($_POST['chkDrink'])) {
            $prices = [
                'Coke' => 15,
                'Royal' => 20,
                'Sprite' => 20,
                'Pepsi' => 15,
                'Mountain Dew' => 20
            ];
    
            $selectedDrinks = $_POST['chkDrink'];
            $quantity = intval($_POST['quantity']); 
            $size = $_POST['size'];
            $sizeAdditionalCost = 0;
    
            if ($size == 'Up-size') {
                $sizeAdditionalCost = 5;
            } elseif ($size == 'Large') {
                $sizeAdditionalCost = 10;
            }
    
            $totalItems = 0;
            $totalCost = 0;
    
            echo "<h3>Purchase Summary:</h3>";
            foreach ($selectedDrinks as $drink) {
                $costPerDrink = $prices[$drink] + $sizeAdditionalCost;
                $drinkTotalCost = $costPerDrink * $quantity;
                $totalItems += $quantity; 
                $totalCost += $drinkTotalCost; 
    
                $pieceLabel = ($quantity == 1) ? "piece" : "piece/s";
                $sizeLabel = ($size == 'Regular') ? "regular" : strtolower($size);
                echo "<p>$quantity $pieceLabel of $sizeLabel $drink amounting to ₱ " . number_format($drinkTotalCost, 2) . "</p>";
            }
            echo "<b>Total number of items: </b>" . number_format($totalItems) . "<br>";
            echo "<b>Total amount: ₱ </b>" . number_format($totalCost, 2);
        } else {
            echo "<h3>Please select at least one drink.</h3>";
        }
    }
    
?>
</html>