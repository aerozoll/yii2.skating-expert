<?php

namespace app\modules\admin\models;

use Yii;
use Yii\web\UploadedFile;
use yii\base\Model;
/**
 * This is the model class for table "{{%advert}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $category_id
 * @property integer $subcategory_id
 * @property integer $user_id
 * @property integer $region_id
 * @property integer $city_id
 * @property integer $privat_business
 * @property integer $created
 * @property integer $expiration
 * @property integer $status
 * @property integer $buy_selling
 */
class Advert extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
	 
	public $file;
	
    public static function tableName()
    {
        return '{{%advert}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           // [['title', 'content', 'category_id', 'subcategory_id', 'user_id', 'region_id', 'city_id', 'privat_business', 'expiration', 'status', 'buy_selling'], 'required'],
            [['title', 'content', 'category_id', 'subcategory_id', 'user_id', 'region_id', 'city_id', 'privat_business','status', 'buy_selling'], 'required'],
			[['content'], 'string'],
            [['category_id', 'subcategory_id', 'user_id', 'region_id', 'city_id', 'privat_business', 'status', 'buy_selling'], 'integer'],
           	//[['expiration'], 'datetime'],
			[['file'], 'file'],
			[['title'], 'string', 'max' => 150],
			
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Описание',
            'content' => 'Содержание',
            'category_id' => 'Категория',
            'subcategory_id' => 'Подкатегория',
            'user_id' => 'Пользователь',
            'region_id' => 'Регион',
            'city_id' => 'Город',
            'privat_business' => 'Частное Коммерческое',
            'created' => 'Создано',
            'expiration' => 'Окончание',
            'status' => 'Status',
            'buy_selling' => 'Купить Продать',
			'file' => 'Добавить фото',
        ];
    }
	public function getCategory()
    {
        return $this->hasOne (Category::className(),['id'=>'category_id']);
    }
	
	public function getSubcategory()
    {
        return $this->hasOne (Subcategory::className(),['id'=>'subcategory_id']);
    }
	
	public function getRegion()
    {
        return $this->hasOne (Region::className(),['id'=>'region_id']);
    }
	
	public function getCity()
    {
        return $this->hasOne (City::className(),['id'=>'city_id']);
    }
}
