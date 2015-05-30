<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "{{%subcategory}}".
 *
 * @property integer $id
 * @property string $title
 * @property integer $category_id
 */
class Subcategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%subcategory}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'category_id'], 'required'],
            [['category_id'], 'integer'],
            [['title'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'title' => 'Описание',
            'category_id' => 'Категория',
        ];
    }
	 public function getCategory()
    {
        return $this->hasOne (Category::className(),['id'=>'category_id']);
    }
}
