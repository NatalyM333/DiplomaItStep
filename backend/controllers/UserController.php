<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use backend\models\UserForm;
use common\models\User;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;

//use backend\models\CategorySearch;
//use yii\web\NotFoundHttpException;


/**
 * CategoryController implements the CRUD actions for Category model.
 */
class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
   
    public function actionIndex()
    {
       
        
       $dataProvider = new ActiveDataProvider([
        'query' => user::find(),
    ]);

    return $this->render('index',[
        'dataProvider' => $dataProvider
    ]);

    }
    public function actionView($id){
        $role = Yii::$app->AuthManager->Roles;
        $role_array = [];

        foreach ($role as $key => $value) {
            $role_array[$key] = $key;
        }
      
        $model = new UserForm;
        $user = User::findOne(['id' => $id]);
        if($model->load(Yii::$app->request->post()))
        {
                $auth = Yii::$app->authManager;
                
                if(array_keys(Yii::$app->AuthManager->getRolesByUser($user['id'])) != null){
                    $role_old = array_keys(Yii::$app->AuthManager->getRolesByUser($user['id']))[0];
                    $role_old = $auth->getRole($role_old);
                    Yii::$app->AuthManager->revoke($role_old, $user['id']);
                } 
                $role_new = $auth->getRole($model->username);
                $auth->assign($role_new, $user['id']);
            
         return  $this->redirect(['user/index']);
        }

        $model->username = $user->username;
        $model->email = $user->email;
        if(array_keys(Yii::$app->AuthManager->getRolesByUser($user['id'])) != null){
            $role = array_keys(Yii::$app->AuthManager->getRolesByUser($user['id']))[0];
        } else {
            $role= '';
        }
        return $this->render('view', [
            'model' => $model,
            'role'=>$role,
            'role_array'=>$role_array,
        ]);

    }
    public function actionDelete($id){
        $model = new UserForm;
        $user = User::findOne(['id' => $id]);
        if($user -> delete())
            {
             //Yii::$app->session->setFlash('success', ' видалено з БД ');
            }
            else{
                Yii::$app->session->setFlash('error', 'Помилка НЕ видалено з БД ');
            }
           
        return  $this->redirect(['user/index']);
    }
    public function actionChangeRole(){
         if ($_POST['id'] != '' && $_POST['role'] != ''){
                $auth = Yii::$app->authManager;
                
                if(array_keys(Yii::$app->AuthManager->getRolesByUser($_POST['id'])) != null){
                    $role_old = array_keys(Yii::$app->AuthManager->getRolesByUser($_POST['id']))[0];
    
                    $role_old = $auth->getRole($role_old);
                    Yii::$app->AuthManager->revoke($role_old, $_POST['id']);
                } 
                $role_new = $auth->getRole($_POST['role']);
                $auth->assign($role_new, $_POST['id']);
            }
            return false;
    }

   
}
