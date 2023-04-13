<?php

require('functions.php');

// require 'router.php';


//learn how to connect to MySQL database.
//PDO - Php Data Objects

$dsn = "mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4";
//This is the connection string for the database

$pdo = new PDO($dsn, 'root');
//Create a first instance of a calss

$statement = $pdo->prepare("SELECT * FROM posts");
//Prepared a query for the database

$statement->execute();


$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
//Fetch all the results from the query

foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}
