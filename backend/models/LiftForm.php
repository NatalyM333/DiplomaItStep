<?php

namespace backend\models;

use yii\base\Model;

class LiftForm extends Model
{
    public $description;
    public $imageFile;
    public $type_id;
    public $producer_id;

    public function rules()
    {
        return[
            [['description',], 'string', 'message' => 'не правильний тип поля'],
          
           
            [['type_id','producer_id'], 'required', 'message' => 'значення обов\'язкове'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 100],
        ];     
    }
    public function attributeLabels()
    {
        return [
            'description' => 'Опис',
            'producer_id' => 'Виробник',
            'type_id' => 'Вид ліфта',
        ];
    }
    public function upload()
    {
        if($this->validate())
        {
            $result = [];
            foreach ($this->imageFile as $file) {
                $fileName = md5(microtime() . rand(0, 1000));
                $imagePath = '../../images/lift/' . $fileName . '.' . $file->extension;
                $file->saveAs($imagePath);
                $result[] = $imagePath;
            }
            return $result;
        }
        return false;
    }

}
