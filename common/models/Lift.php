<?php
namespace common\models;

use Yii;
use \yii\db\ActiveRecord;

/** 
*
* @property int $id
* @property string $description
* @property string $url_image
* @property int $type_id
* @property int $producer_id
*/
class Lift extends ActiveRecord
{
    public static function tableName()
    {
        return 'lift';
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