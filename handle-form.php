<?php
// Define variables
$shipping = 2.99;
$downloadPrice = 9.99;
$cdPrice = 12.99;
$heading = "Cost by Quantity";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all fields are filled
    if (empty($_POST['name']) || empty($_POST['album']) || empty($_POST['quantity']) || empty($_POST['format'])) {
        $error = "All fields are required.";
    } else {
        // Process the form data
        $name = $_POST['name'];
        $album = $_POST['album'];
        $quantity = intval($_POST['quantity']);
        $media = $_POST['format'];
        
        // Album titles array (should match the one in form.php)
        $albums = [
            'album1' => 'The Dark Side of the Moon',
            'album2' => 'Back in Black',
            'album3' => 'Thriller',
            'album4' => 'Rumours',
            'album5' => 'Saturday Night Fever'
        ];
        
        $selectedAlbum = $albums[$album];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Order Summary</h1>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php else: ?>
            <p>Thank you for your order, <?php echo htmlspecialchars($name); ?>!</p>
            <p>You've selected: <?php echo htmlspecialchars($selectedAlbum); ?></p>
            <p>Format: <?php echo htmlspecialchars($media); ?></p>
            
            <h2><?php echo $heading; ?></h2>
            
            <?php
            $totalCost = 0;
            
            if ($media == "CD") {
                for ($i = 1; $i <= $quantity; $i++) {
                    $cost = $cdPrice * $i;
                    echo "<p>$i CD" . ($i > 1 ? "s" : "") . ": $" . number_format($cost, 2) . "</p>";
                }
                $totalCost = $cdPrice * $quantity + $shipping;
                echo "<p>Shipping: $" . number_format($shipping, 2) . "</p>";
            } else {
                $i = 1;
                while ($i <= $quantity) {
                    $cost = $downloadPrice * $i;
                    echo "<p>$i Download" . ($i > 1 ? "s" : "") . ": $" . number_format($cost, 2) . "</p>";
                    $i++;
                }
                $totalCost = $downloadPrice * $quantity;
            }
            
            echo "<h3>Total Cost: $" . number_format($totalCost, 2) . "</h3>";
            ?>
            
            <a href="form.php" class="btn btn-primary mt-3">Place Another Order</a>
        <?php endif; ?>
    </div>
</body>
</html>
