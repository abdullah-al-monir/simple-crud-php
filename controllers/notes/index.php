<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;
$notes = $db->query('SELECT * FROM demo.notes where user_id = :currentUserId', [
  'currentUserId' => $currentUserId
])->get();


view('notes/index.view.php', [
  'heading' => 'My Notes',
  'notes' => $notes
]);