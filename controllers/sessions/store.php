<?php
use Core\Database;
use Core\App;
use Core\Validator;


// login user if the credentials match

$db = App::resolve(Database::class);

$email = $_POST['email'];
$password = $_POST['password'];

// validate the form inputs 
$errors = [];

if (!Validator::email($email)) {
  $errors['email'] = "Please provide a valid email address";
}

if (!Validator::string($password, 6, 255)) {
  $errors['password'] = "Please provide a password.";
}

if (!empty($errors)) {
  return view("sessions/create.view.php", [
    "errors" => $errors,
  ]);
}

$user = $db->query('SELECT * FROM demo.users where email = :email ', [
  'email' => $email
])->find();

if ($user) {
  if (password_verify($password, $user['password'])) {
    login([
      'email' => $email,
      'name' => $user['name'],
    ]);

    header('location: /');
    exit();
  }

}


return view('sessions/create.view.php', [
  'errors' => [
    'email' => 'No matching account found for that email address and password.'
  ]
]);




