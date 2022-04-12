<?php 
    namespace common\models;

    use Yii;
    use \yii\db\ActiveRecord;

    /**
     * 
     * @property int $id
     * @property string $name
     * @property string $url_file
     * @property string $description
     * @property int $producer_id
     */
    class Support extends ActiveRecord
    {
        public static function tableName()
        {
            return 'support';
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