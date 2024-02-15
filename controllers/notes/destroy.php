<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query('SELECT * FROM demo.notes where  note_id = :id ', ['id' => $_POST['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

// delete the current note
$db->query('DELETE FROM demo.notes where note_id = :id', [
  'id' => $_POST['id']
]);

header('location: /notes');
exit();


