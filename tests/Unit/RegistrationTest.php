<?php


use Core\App;
use Core\Authenticator;
use Http\Forms\RegistrationForm;

test('attempt to register a user', function () {
    $name = "Walter";
    $email = "walter@yahoo.com";
    $password = "password";

    $form = RegistrationForm::validate([
        'name' => $name,
        'email' => $email,
        'password' => $password
    ]);

    expect($form)->toBeObject("Registration form validation failed.");

    $userExists = RegistrationForm::checkIfUserExists($email);

    expect($userExists)->toBeFalse("A user with this email exists already.");

    if (!$userExists) {
        $db = App::resolve("db");
        $result = $db->query("INSERT INTO users (name, email, password) VALUES (:name, :email, :password);", [
            "name" => $name,
            "email" => $email,
            "password" => password_hash($password, PASSWORD_BCRYPT)
        ]);

        expect($result)->toBeObject("An error occurred while executing the query.");

        $signedIn = (new Authenticator())->attempt($email, $password);

        expect($signedIn)->toBeTrue("Login attempt failed.");
    }

    // cleanup
    $query = "DELETE FROM users WHERE email = ?";
    $db->query($query, [$email]);
});