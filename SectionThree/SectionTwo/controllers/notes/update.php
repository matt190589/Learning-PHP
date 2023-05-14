<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$currentUserId = 1;

//Function here finds the corresponding note
$note = $db->query('SELECT * FROM notes where id = :id', [
    'id'  => $_POST['id']
])->findOrFail();

//Function here authorizes that the current use can edit the note
authorize($note['user_id'] === $currentUserId);

//Function here validates the form
$errors = [];
if (!Validator::string($_POST['body'], 1, 100)) {
    $errors['body'] = 'A body of no more than 100 characters is required';
}

//if no validation errors, update the record in the notes database table
if (count($errors)){
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);

}

//Query for updating the DB
$db->query('update notes set body = :body where id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body']
]);

//redirect the user
header('location: /notes');
die();
