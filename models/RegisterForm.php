<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{

    public $login;
    public $password;
    public $confpass;
    public $username;
    public $user_surname;
    public $email;
    public $phone;
    public $region;
    public $city;
    public function rules()
    {
        return [
            [['login', 'password', 'confpass', 'username', 'user_surname', 'email', 'phone', 'region', 'city'], 'required'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'password' => 'Пароль',
            'confpass' => 'Подтвердите пароль',
            'username' => 'Имя',
            'user_surname' => 'Фамилия',
            'email' => 'Электронная почта',
            'phone' => 'Номер телефона',
            'region' => 'Регион',
            'city' => 'Город',
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
