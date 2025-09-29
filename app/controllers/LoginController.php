<?php

namespace App\controllers;
use App\models\Login;

class LoginController
{
    public function register()
    {
        return view('register', [
            'title' => 'Регистрация',
        ]);
    }

    public function store()
    {
        $model = new Login();
        $model->loadData();
        if (!$model->validate()) {
            session()->setFlash('error', 'Validation errors');
            session()->set('form_errors', $model->getErrors());
            session()->set('form_data', $model->attributes);
        } else {
            $model->attributes['password'] = password_hash($model->attributes['password'], PASSWORD_DEFAULT);
            if ($id = $model->save()) {
                session()->setFlash('success', 'Регистрация прошла успешно');
            } else {
                session()->setFlash('error', 'Ошибка регистрации');
            }
        }
        response()->redirect('/register');
    }

    public function login()
    {
        return view('user/login', [
            'title' => 'Login page',
        ]);
    }

//    public function login()
//    {
//        var_dump($_POST['login']);
//        $log = new Login();
//        $log->checkPass($login, $password);
//    }
}