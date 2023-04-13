<?php



$heading = 'My Notes';


$notes = $db->query('SELECT * FROM notes where USER_ID = 1')->get();



require "views/notes.view.php";
