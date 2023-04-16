<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);
$currentUserId = 1;



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // First block checks if the user deleting the note is the same user that created the note
    $note = $db->query('SELECT * FROM notes where id = :id', [
        'id'  => $_GET['id']
    ])->findOrFail();


    authorize($note['user_id'] === $currentUserId);
    //form was submitted. Delete the current note!
    $db->query('DELETE FROM notes where id = :id', [
        'id' => $_GET['id']

    ]);

    header('location: /notes');
    exit();
} else {

    $note = $db->query('SELECT * FROM notes where id = :id', [
        'id'  => $_GET['id']
    ])->findOrFail();


    authorize($note['user_id'] === $currentUserId);


    view("notes/show.view.php", [
        'heading' => 'Note',
        'note' => $note
    ]);
}
