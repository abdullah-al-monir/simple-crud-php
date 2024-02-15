<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


$notes = $db->query('SELECT * FROM demo.notes where user_id = 1')->get();


view('notes/index.view.php', [
  'heading' => 'My Notes',
  'notes' => $notes
]);