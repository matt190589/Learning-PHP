<?php

$config = require base_path('config.php');
$db = new Database($config['database']);

$notes = $db->query('SELECT * FROM notes where USER_ID = 1')->get();


view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);