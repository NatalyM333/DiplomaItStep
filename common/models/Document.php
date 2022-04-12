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
     */
    class Document extends ActiveRecord
    {
        public static function tableName()
        {
            return 'documents';
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