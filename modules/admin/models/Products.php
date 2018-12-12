<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property int $price
 * @property string $price_old
 * @property string $img
 * @property string $description
 * @property string $article
 * @property int $in_stock
 * @property int $hit
 * @property int $new
 * @property int $sale
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    public function getCategory(){
        return $this->hasOne(Categories::className(), ['id' => 'category_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'price', 'price_old', 'img', 'description', 'article', 'in_stock'], 'required'],
            [['category_id', 'price', 'in_stock', 'hit', 'new', 'sale'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 150],
            [['price_old', 'article'], 'string', 'max' => 15],
            [['img'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '№ Товара',
            'category_id' => 'Категория',
            'name' => 'Название',
            'price' => 'Цена',
            'price_old' => 'Старая цена',
            'img' => 'Изображение',
            'description' => 'Описание',
            'article' => 'Артикл',
            'in_stock' => 'Количество на складе',
            'hit' => 'Хит',
            'new' => 'Новинка',
            'sale' => 'Распродажа',
        ];
    }
}
