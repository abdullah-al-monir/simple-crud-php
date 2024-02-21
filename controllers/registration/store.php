<?php
use Core\Database;
use Core\App;
use Core\Validator;

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// validate the form inputs 
$errors = [];

if (!Validator::string($name, 6, 50)) {
  $errors['name'] = "Please provide a name of at least six characters";
}
if (!Validator::email($email)) {
  $errors['email'] = "Please provide a valid email address";
}

if (!Validator::string($password, 6, 255)) {
  $errors['password'] = "Please provide a password of at least six characters";
}

if (!empty($errors)) {
  return view("registration/create.view.php", [
    "errors" => $errors,
  ]);
}

$db = App::resolve(Database::class);


// check if the account already exists

$user = $db->query("SELECT * FROM demo.users where email = :email", [
  'email' => $email
])->find();

//if yes, redirect to login page
if ($user) {

  header('location: /');

} else {
  // if not , save one to the database and logged user in database
  $db->query('INSERT INTO demo.users(name,email,password) VALUES (:name,:email,:password)', [
    'name' => $name,
    'email' => $email,
    'password' => password_hash($password, PASSWORD_BCRYPT)
  ]);

  login([
    'name' => $name,
    'email' => $email
  ]);

  header('location: /');
  exit();
}










