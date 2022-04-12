<?php

namespace backend\models;

use yii\base\Model;

class UserForm extends Model
{   public $id;
    public $username;
    public $email;
    public $role;
 

    public function rules()
    {
        return[
            
            
           
            [['username','email'], 'required', 'message' => 'значення обов\'язкове'],
        ];     
    }
    public function attributeLabels()
    {
        return [
            'username' => 'Назва ',
            'role' => 'Роль',
        ];
    }
  

}
