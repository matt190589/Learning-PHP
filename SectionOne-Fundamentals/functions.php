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
    $books = [
        ['name' => "Hail Mary", 'author' => 'Phillip K. Dick', 'releaseYear' => 2021],
        ['name' => 'Project Hail Mary', 'author' => 'Andy Weir', 'releaseYear' => 2011,], ['name' => "The Martian", 'author' => 'Andy Weir', 'releaseYear' => 2023],
    ]; //associative array

    function filterByAuthor($books, $author)
    {
        $filteredBooks = [];

        foreach ($books as $book) {
            if ($book['author'] === $author) {
                $filteredBooks[] = $book;
            }
        }
        return $filteredBooks;
    }
    ?>
    <h1>Recommended Books</h1>
    <ul>
        <?php foreach (filterByAuthor($books, "Andy Weir") as $book) : ?>
            <li>
                <?= $book['name'] ?> (<?= $book['releaseYear'] ?>) - By <?= $book['author'] ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>