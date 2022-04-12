<?php 
namespace backend\models;

use yii\base\Model;

class SupportForm extends Model
{
    public $name;
    public $description;
    public $supportFile;
    public $producer_id;
    
    public function rules()
    {
        return [
            [['name','description'], 'string', 'message' => 'Invalid field type'],
            [['name','producer_id',], 'required', 'message' => 'The value is required'],
        //   [['supportFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf', 'maxFiles' => 10]
        ];
        
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Назва',
            'description' => 'Опис'
        ];
    }
    public function upload()
    {
        if($this->validate())
        {
            $result = [];
            foreach ($this->supportFile as $file) {
                $fileName = md5(microtime() . rand(0, 1000));
                $supportPath = '../../files/support/' . $fileName . '.' . $file->extension;
                $file->saveAs($supportPath);
                $result = $supportPath;
            }
            return $result;
        }
        return false;
    }
}