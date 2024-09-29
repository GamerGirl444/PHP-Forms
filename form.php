<?php
// Array of album titles
$albums = [
    'album1' => 'The Dark Side of the Moon',
    'album2' => 'Back in Black',
    'album3' => 'Thriller',
    'album4' => 'Rumours',
    'album5' => 'Saturday Night Fever'
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album Order Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Album Order Form</h1>
        <form action="handle-form.php" method="post">
            <div class="form-group">
                <label for="name">Your Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="album">Select Album:</label>
                <select class="form-control" id="album" name="album" required>
                    <option value="">Choose an album</option>
                    <?php foreach($albums as $key => $title): ?>
                        <option value="<?php echo $key; ?>"><?php echo $title; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="quantity">Number of Albums:</label>
                <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
            </div>
            
            <div class="form-group">
                <label>Format:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="format" id="cd" value="CD" required>
                    <label class="form-check-label" for="cd">CD</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="format" id="download" value="Download">
                    <label class="form-check-label" for="download">Download</label>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit Order</button>
        </form>
    </div>
</body>
</html>
