<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$notes = $db->query('SELECT * FROM notes where USER_ID = 1')->get();


view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);
