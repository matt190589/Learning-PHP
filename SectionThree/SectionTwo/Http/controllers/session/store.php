<?php


//log in the user if the credientials match

use Core\App;
use Core\Database;
use Core\Validator;
use Http\Form\LoginForm;

$db = App::resolve(Database::class);


$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if (!$form->validate($email, $password)) {
    return view('session/create.view.php', [
        'errors' => $form->errors()
    ]);
};



//match the credentials
$user = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

if ($user) {
    //Need to check the password provided against the password in the database
    if (password_verify($password, $user['password'])) {
        login([
            'email => $email'
        ]);

        header('location: /');
        exit();
    }
}

return view('session/create.view.php', [
    'errors' => [
        'email' => 'No matching account found for that email address and password.'
    ]
]);
