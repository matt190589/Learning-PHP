<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo</title>
    <style>
        body {
            display: grid;
            place-items: center;
            margin: 0;
            font-family: sans-serif;
        }
    </style>
</head>
<body>
    <?php
    $books = [['name' => "Hail Mary", 'author'=> 'Phillip K. Dick'],
        ['name' =>'Project Hail Mary', 'author'=> 'Andy Weir'],
    ]; //associative array
?>
<h1>Recommended Books</h1>
    <ul>
        <?php foreach ($books as $book) : ?>
            <li><?= $book['name'] ?>
        </li>
            <?php endforeach; ?>
    </ul>
</body>
</html>