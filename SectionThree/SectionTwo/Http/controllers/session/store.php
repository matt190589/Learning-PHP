<?php

//log in the user if the credientials match

use Core\Authenticator;
use Http\Form\LoginForm;

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);


if ((new Authenticator)->attempt($attributes['email'], $attributes['password'])) {
    redirect('/');
}

$form->error('email', 'No matching account found for that email address and password.');


return redirect('/login');
