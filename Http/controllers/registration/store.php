<?php

use Core\App;
use Core\Authenticator;
use Http\Forms\RegistrationForm;

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordConfirmation = $_POST['password_confirmation'];

$name = cleanString($name);
$email = cleanString($email);
$password = cleanString($password);
$passwordConfirmation = cleanString($passwordConfirmation);

$form = RegistrationForm::validate([
    'name' => $name,
    'email' => $email,
    'password' => $password,
    'password_confirmation' => $passwordConfirmation
]);

$userExists = RegistrationForm::checkIfUserExists($email);

if ($userExists) {
    $form->error("An account with this email already exists.")->throw();
} else {
    $db = App::resolve("db");
    $db->query("INSERT INTO users (name, email, password) VALUES (:name, :email, :password);", [
        "name" => $name,
        "email" => $email,
        "password" => password_hash($password, PASSWORD_BCRYPT)
    ]);

    $signedIn = (new Authenticator())->attempt($email, $password);

    redirect('/');
}