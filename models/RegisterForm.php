<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{

    public $username;
    public $password;
    public $confpass;
    public function rules()
    {
        return [
            [['username', 'password', 'confpass'], 'required'],
        ];
    }


    public function attributeLabels()
    {
        return [
            'username' => 'Логин',
            'password' => 'Пароль',
            'confpass' => 'Подтвердите пароль',
        ];
    }

    public function findUser()
    {
        $user = User::findByUsername($this->username);
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
