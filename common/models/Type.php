<?php 
    namespace common\models;

    use Yii;
    use \yii\db\ActiveRecord;

    /**
     * 
     * @property int $id
     * @property string $name
     * @property string $url_image
     * @property string $description
     */
    class Type extends ActiveRecord
    {
        public static function tableName()
        {
            return 'types';
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