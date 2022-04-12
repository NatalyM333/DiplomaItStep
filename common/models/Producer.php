<?php
namespace common\models;

use Yii;
use \yii\db\ActiveRecord;

/** 
*
* @property int $id
* @property string $name
* @property string $description
* @property string $url_image
*/
class Producer extends ActiveRecord
{
    public static function tableName()
    {
        return 'producer';
    }

    public function rules()
    {
        return [];
    }

    public function attributeLabel()
    {
        return [];
    }
}