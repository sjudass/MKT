<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class SortForm extends Model
{
    public $sortby; //сортировка по правилу
    public $number; //количество выводимых товаров




    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['sortby', 'number'], 'trim'],
        ];
    }
}
