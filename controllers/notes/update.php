<?php
use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$currentUserId = 1;

// find the corresponding note

$note = $db->query('SELECT * FROM demo.notes where  note_id = :id ', ['id' => $_POST['id']])->findOrFail();

// authorize the user

authorize($note['user_id'] === $currentUserId);


// validate the form

if (!Validator::string($_POST['description'], 50, 1000)) {
  $errors['description'] = 'A description of 50 to 1000 characters is required.';
}

if (!empty($errors)) {
  return view('notes/edit.view.php', [
    'heading' => 'Edit Note',
    'errors' => $errors,
    'note' => $note
  ]);
}

// if no validation errors , update the record in the database



$db->query('UPDATE demo.notes SET title = :title, description = :description WHERE note_id = :id', [
  'id' => $_POST['id'],
  'title' => $_POST['title'],
  'description' => $_POST['description'],

]);

//redirect the user

header('location: /notes ');

die();