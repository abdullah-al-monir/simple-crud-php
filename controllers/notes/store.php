<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$notes = $db->query("SELECT * FROM demo.notes")->get();

$notesLength = count($notes);
$errors = [];
if (!Validator::string($_POST['title'], 1, 150)) {
  $errors['title'] = 'A title of no more than 150 characters is required.';
}
if (!Validator::string($_POST['description'], 50, 1000)) {
  $errors['description'] = 'A description of 50 to 1000 characters is required.';
}

if (!empty($errors)) {
  return view('notes/create.view.php', [
    'heading' => 'Create Note',
    'errors' => $errors
  ]);
}


$db->query('INSERT INTO notes(note_id,title, description, user_id) VALUES(:note_id,:title, :description, :user_id)', [
  'note_id' => $notesLength + 1,
  'title' => $_POST['title'],
  'description' => $_POST['description'],
  'user_id' => 1,
]);

header('location: /notes');
exit();