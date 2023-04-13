//Page logic
<?php

$books = [
    ['name' => "Hail Mary", 'author' => 'Phillip K. Dick', 'releaseYear' => 2021],
    ['name' => 'Project Hail Mary', 'author' => 'Andy Weir', 'releaseYear' => 2011,], ['name' => "The Martian", 'author' => 'Andy Weir', 'releaseYear' => 2023],
]; //associative array

function filter($items, $function) //passing a function gives more flexibility when calling the filter
{
    $filteredItems = [];

    foreach ($items as $item) {
        if ($function($item)) {
            $filteredItems[] = $item;
        }
    }
    return $filteredItems;
}

$filteredBooks = filter($books, function ($book) {
    return $book['releaseYear'] >= 2000;
});

require "index.view.php";
?>