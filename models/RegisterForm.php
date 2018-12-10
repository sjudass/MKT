<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{

    public $login;
    public $password;
    public $confpass;
    public $email;

    public function rules()
    {
        return [
            [['login', 'password', 'confpass', 'email'], 'required'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'password' => 'Пароль',
            'confpass' => 'Подтвердите пароль',
            'email' => 'Электронная почта',
        ];
    }

    public function findUser()
    {
        $user = User::findByUsername($this->login);
        return $user;
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->findUser());
        }
        return false;
    }
}
