<?php

namespace backend\models;

use yii\base\Model;

class ProducerForm extends Model
{
    public $name;
    public $description;
    public $imageFile;

    public function rules()
    {
        return[
            [['name','description',], 'string', 'message' => 'не вірний тип поля'],
            
            [['name',], 'required', 'message' => 'значення обов\'язкове'],
        ];     
    }
    public function attributeLabels()
    {
        return [
            'name' => 'Назва виробника',
            'description' => 'Опис',
        ];
    }
    public function upload()
    {
        if($this->validate())
        {
            $result = [];
            foreach ($this->imageFile as $file) {
                $fileName = md5(microtime() . rand(0, 1000));
                $imagePath = '../../images/producer/' . $fileName . '.' . $file->extension;
                $file->saveAs($imagePath);
                $result = $imagePath;
            }
            return $result;
        }
        return false;
    }

}
