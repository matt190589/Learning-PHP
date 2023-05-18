<?php


//log in the user if the credientials match

use Core\Authenticator;
use Http\Form\LoginForm;


$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {
    $auth = new Authenticator();

    if ($auth->attempt($email, $password)) {
        redirect('/');
    }

    $form->$error('email', 'No matching account found for that email address and password.');
};

return view('session/create.view.php', [
    'errors' => $form->errors()
]);
