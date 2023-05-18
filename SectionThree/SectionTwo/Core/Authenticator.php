<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        //match the credentials
        $user = App::resolve(Databae::class) > query('SELECT * FROM users WHERE email = :email', [
            'email' => $email
        ])->find();

        if ($user) {
            //Need to check the password provided against the password in the database
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email => $email'
                ]);
                return true;
            }
        }
        return false;
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email']
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        //empty the session array
        $_SESSION = [];
        //Delete the current session
        session_destroy();

        //Expire the cookie
        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}
