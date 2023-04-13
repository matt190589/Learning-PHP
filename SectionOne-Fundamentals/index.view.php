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
    <h1>Recommended Books</h1>
    <ul>
        <?php foreach ($filteredBooks as $book) : ?>
            <li>
                <?= $book['name'] ?> (<?= $book['releaseYear'] ?>) - By <?= $book['author'] ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>