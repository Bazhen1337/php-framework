<?php

    namespace App\models;

    use Framework\Model;

    class Login extends Model
    {

        protected array $loaded = ['name', 'email', 'password', 'confirmPassword'];
        protected array $fillable = ['name', 'email', 'password'];
        protected string $table = 'users';
        public bool $timestamps = false;

        protected array $rules = [
            'required' => ['name', 'email', 'password', 'confirmPassword'],
            'email' => ['email'],
            'lengthMin' => [
                ['password', 3]
            ],
            'equals' => [
                ['password', 'confirmPassword']
            ]
        ];

        protected array $labels = [
            'name' => 'Имя',
            'email' => 'E-mail',
            'password' => 'Пароль',
            'confirmPassword' => 'Подтверждение пароля',
        ];
        public function checkPass($login, $password)
        {
            $res = self::findOne("SELECT * FROM users WHERE login = '".$login."'");
            if (password_verify($password, $res['password'])) {
                header("Location: /main.php");
            } else {
                header("Location: /");
            }
        }
    }
