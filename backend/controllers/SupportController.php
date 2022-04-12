<?php
namespace backend\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use backend\models\SupportForm;
use common\models\Producer;
use common\models\Support;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use yii\db\Query;

class SupportController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                // 'only' => ['index', 'create', 'update', 'delete'],
                'only' => [],
                'rules' => [
                    [
                        'allow' => true,
                        // 'actions' => ['index', 'create', 'update', 'delete'],
                        'roles' => ['admin'],
                    ]
                ],
            ],
        ];
    }
    public function actionIndex()
    {   
        $producers = [];
        $supports = Support::find()->all();
        foreach($supports as $support){
            $producers[$support->producer_id] = Producer::find()->where(['id' => $support->producer_id])->one();
       }
        return $this->render('index',[
            'support' => $supports,
            'producers' => $producers,
        ]);
    }

    public function actionCreate()
    { 
        $providers = Producer::find()->all();
        if(count($providers) == 0)
        {
            Yii::$app->session->setFlash('error', 'Немає виробників ліфтів');
            return  $this->redirect(['lift/index']);
        }
        $model = new SupportForm;
        if($model->load(Yii::$app->request->post()))
        {
            $model->supportFile = UploadedFile::getInstances($model,'supportFile');
           if($supportPath=$model->upload())
           {
            $support = new Support;
            $support->description = $model->description;
            $support->name = $model->name;
            $support->producer_id = $model->producer_id ;
            $support->url_file = json_encode($supportPath);
            if($support->save())
            {
            // Yii::$app->session->setFlash('success', 'Товар збережено в БД ');
            }
            else{
                Yii::$app->session->setFlash('error', 'Помилка НЕ збережено в БД ');
               }
           }
         return  $this->redirect(['support/index']);
          
        }
        
        foreach ($providers as $provider) {
            $provider_array[$provider->id] = $provider->name;
        }
        return $this->render('create', [
            'model' => $model,
            'initialPreview' => [],
            'initialConfig' => [],
            'support_id'=> '',
            'producers' => $provider_array,
        ]);
    }
    public function actionUpdate($id){
        $model = new SupportForm;
        $support = Support::findOne(['id' => $id]);
        if($model->load(Yii::$app->request->post()))
        {
            $model->supportFile = UploadedFile::getInstances($model,'supportFile');
            $supportPath=$model->upload();
           if($supportPath !== false)
           {
            $support->description = $model->description;
            $support->name = $model->name;
            $support->producer_id = $model->producer_id ;
            if($supportPath)
            {
                $file = json_decode($support->url_file,true);
                unlink($file);
                $support->url_file = json_encode($supportPath);
                
            }
            
            if($support->save())
            {
             //Yii::$app->session->setFlash('success', 'Товар збережено в БД ');
            }
            else{
                Yii::$app->session->setFlash('error', 'Помилка НЕ збережено в БД ');
               }
           }
         return  $this->redirect(['support/index']);
          
        }

        $model->description = $support->description;
        $model->name = $support->name;
        $model->producer_id = $support->producer_id;
        $providers = Producer::find()->all();
        foreach ($providers as $provider) {
            $provider_array[$provider->id] = $provider->name;
        }
        $file= json_decode($support->url_file,true);
        $initialPreview = [];
        $initialConfig = [];
        
            $initialPreview[]='../../' . $file;
          
            $initialConfig []=[
                'key' => $file,
            ];
        

        return $this->render('create', [
            'model' => $model,
            'initialPreview' => $initialPreview,
            'support_id'=> $support->id,
            'initialConfig' =>  $initialConfig,
            'producers' => $provider_array,
        ]);

    }

    public function actionDelete($id){
        $model = new SupportForm;
        $support = Support::findOne(['id' => $id]);
        $file = json_decode($support->url_file,true);
        $result = [];
         
               unlink($file);
        

        if($support -> delete())
            {
             //Yii::$app->session->setFlash('success', 'Товар видалено з БД ');
            }
            else{
                Yii::$app->session->setFlash('error', 'Помилка НЕ видалено з БД ');
            }
           
        return  $this->redirect(['support/index']);
    }
    public function actionFileDeleteSupport($id){
        
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        // if(isset($_POST['key'])){
        //     $file = $_POST['key'];
           
        //     unlink($_POST['key']);
        //     $support = Support::findOne(['id' => $id]);
        //     $files = json_decode($support->url_file,true);
        //     $result = [];
        //     foreach ($files as $value) {
        //         if($file != $value){
        //             $result[] = $value;
        //         }
        //     }
        //     $support->url_file = json_encode($result);
        //     $support->save();
        // }
        return true;
    }
    public function actionView($id){
        $model = new SupportForm;
        $support = Support::findOne(['id' => $id]);
       

        $model->description = $support->description;
        $model->name = $support->name;
        $model->producer_id = $support->producer_id;
        $file= json_decode($support->url_file,true);
        $initialPreview[]='' . $file;
        $initialConfig []=[
            'key' => $file,
        ];
        
        return $this->render('view', [
            'model' => $model,
            'initialPreview' => $initialPreview,
            'support_id'=> $support->id,
            'initialConfig' =>  $initialConfig,
            'producer' => Producer::find()->where(['id' => $support->producer_id])->one()->name,
        ]);

    }
    public function actionFile($filename)
    {
        //return \Yii::$app->response->sendFile($filename); 
        return Yii::$app->response->sendFile($filename,'', ['inline'=>true]);
       
    }
}