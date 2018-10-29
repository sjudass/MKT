<?php
namespace app\models;
use yii\base\Model;

class TestForm extends Model {
    public $name;
    public $email;
    public $pass;
    public $confpass;

    public function rules()
    {
        return [
            [['name','email'], 'required'],
            ['email', 'email'],
            [['pass','confpass'],'required'],
        ];
    }
}