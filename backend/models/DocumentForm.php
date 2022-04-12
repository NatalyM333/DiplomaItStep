<?php 
namespace backend\models;

use yii\base\Model;

class DocumentForm extends Model
{
    public $name;
    public $description;
    public $documentFile;
 
    
    public function rules()
    {
        return [
            [['name','description'], 'string', 'message' => 'Invalid field type'],
            [['name'], 'required', 'message' => 'The value is required'],
        //   [['documentFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf', 'maxFiles' => 10]
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
            foreach ($this->documentFile as $file) {
                $fileName = md5(microtime() . rand(0, 1000));
                $documentPath = '../../files/document/' . $fileName . '.' . $file->extension;
                $file->saveAs($documentPath);
                $result = $documentPath;
            }
            return $result;
        }
        return false;
    }
}