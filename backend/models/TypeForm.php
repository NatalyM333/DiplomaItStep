<?php 
namespace backend\models;

use yii\base\Model;

class TypeForm extends Model
{
    public $name;
    public $description;
    public $imageFile;
    
    public function rules()
    {
        return [
            [['name','description'], 'string', 'message' => 'Invalid field type'],
            [['name',], 'required', 'message' => 'The value is required'],
            //[['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 1]
        ];
        
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Назва виду',
            'description' => 'Опис'
        ];
    }
    public function upload()
    {
        if($this->validate())
        {
            $result = [];
            foreach ($this->imageFile as $file) {
                $fileName = md5(microtime() . rand(0, 1000));
                $imagePath = '../../images/type/' . $fileName . '.' . $file->extension;
                $file->saveAs($imagePath);
                $result = $imagePath;
            }
            return $result;
        }
        return false;
    }
}