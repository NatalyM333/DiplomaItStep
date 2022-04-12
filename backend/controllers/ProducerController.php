<?php
namespace backend\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use backend\models\ProducerForm;
use common\models\Lift;
use common\models\Support;
use backend\models\Producer;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;

class ProducerController extends Controller
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
                        'roles' => ['admin','owner','manager'],
                    ]
                ],
            ],
        ];
    }
    public function actionIndex()
    {
       // $producer = Producer::find()->all();
       

        return $this->render('index',[
            'producers' =>Producer::find()->asArray()->all()
        ]);
    }

    public function actionCreate()
    {
        $model = new ProducerForm;
        
        if($model->load(Yii::$app->request->post()))
        {   $model->imageFile = UploadedFile::getInstances($model,'imageFile');
            if($imagePath=$model->upload())
           {
                $producer = new Producer;
                $producer->name = $model->name;
                $producer->description = $model->description;
                $producer->url_image = json_encode($imagePath);
                if($producer->save())
                {
            //  Yii::$app->session->setFlash('success', 'Виробника збережено в БД ');
                }
                else{
                    Yii::$app->session->setFlash('error', 'Помилка НЕ збережено в БД ');
                }  
                return  $this->redirect(['producer/index']);
            }else{
                $model->imageFile='';
                return $this->render('create', [
                    'model' => $model,    
                    'initialPreview' => [],
                    'initialConfig' => [],
                    'producer_id'=> '',
                    'msg'=>'обов\'язкове поле',
                    'dangerStyle' =>'border: 1px solid red; border-radius: 10px;',
                ]);
            }
          
        }
        return $this->render('create', [
            'model' => $model,
            'msg'=>'',
            'dangerStyle' =>'',
            'initialPreview' => [],
            'initialConfig' => [],
            'producer_id'=> '',
        ]);
    }
    public function actionUpdate($id){
        $model = new ProducerForm;
        $producer = Producer::findOne(['id' => $id]);
        if($model->load(Yii::$app->request->post()))
        {
            $model->imageFile = UploadedFile::getInstances($model,'imageFile');
            $imagePath=$model->upload();
           if($imagePath !== false)
           {
                $producer->name = $model->name;
                $producer->description = $model->description;
                if($imagePath)
                {
                    $file = json_decode($producer->url_image,true);
                    unlink($file);
                    $producer->url_image = json_encode($imagePath);
                    
                }
                if($producer->save())
                {
                //Yii::$app->session->setFlash('success', 'Товар збережено в БД ');
                }
                else{
                    Yii::$app->session->setFlash('error', 'Помилка НЕ збережено в БД ');
                }
            }
         return  $this->redirect(['producer/index']);
          
        }

        $model->name = $producer->name;
        $model->description = $producer->description;

        $file= json_decode($producer->url_image,true);
       
        
            $initialPreview[]='../../' . $file;
          
            $initialConfig []=[
                'key' => $file,
            ];
      
        return $this->render('create', [
            'model' => $model,
            'initialPreview' => $initialPreview,
            'producer_id'=> $producer->id,
            'initialConfig' =>  $initialConfig,
            'msg'=>'',
            'dangerStyle' =>''
        ]);

    }

    public function actionDelete($id){
        $producer = Producer::findOne(['id' => $id]);
        $lifts = Lift::find()->where(['producer_id' => $id])->all();
        foreach ($lifts as $lift) {  
            $images = json_decode($lift->url_image,true);
            foreach ($images as $value) {  
                unlink($value);
            }
      
            if($lift -> delete())
            {
             //Yii::$app->session->setFlash('success', 'Товар видалено з БД ');
            }
            else{
                Yii::$app->session->setFlash('error', 'Помилка НЕ видалено з БД ');
            }
        }

        $supports = Support::find()->where(['producer_id' => $id])->all();
        foreach ($supports as $support) {  
            $file = json_decode($support->url_file,true);
            unlink($file);
            if($support -> delete())
            {
            //Yii::$app->session->setFlash('success', 'Товар видалено з БД ');
            }
            else{
                Yii::$app->session->setFlash('error', 'Помилка НЕ видалено з БД ');
            }
        }

        $file = json_decode($producer->url_image,true);
        unlink($file);
        if($producer -> delete())
            {
             //Yii::$app->session->setFlash('success', 'Виробника видалено з БД ');
            }
            else{
                Yii::$app->session->setFlash('error', 'Помилка НЕ видалено з БД ');
            }
           
        return  $this->redirect(['producer/index']);
    }
   
    public function actionView($id){
        $model = new ProducerForm;
        $producer = Producer::findOne(['id' => $id]);
        if($model->load(Yii::$app->request->post()))
        {           
            $producer->name = $model->name;
            $producer->description = $model->description ;
     
         return  $this->redirect(['producer/index']);
        }

        $model->name = $producer->name;
        $model->description = $producer->description; 
      
        $file= json_decode($producer->url_image,true);
        $initialPreview[]='' . $file;
        $initialConfig []=[
            'key' => $file,
        ];
   
        return $this->render('view', [
            'model' => $model,
            'initialPreview' => $initialPreview,
            'producer_id'=> $producer->id,
            'initialConfig' =>  $initialConfig,
        ]);

    }
    public function actionFileDeleteProducer($id){
        
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        // if(isset($_POST['key'])){
        //     $file = $_POST['key'];
           
        //     unlink($_POST['key']);
        //     $producer = Producer::findOne(['id' => $id]);
        //     $files = json_decode($producer->url_image,true);
        //     $result = [];
        //     foreach ($files as $value) {
        //         if($file != $value){
        //             $result[] = $value;
        //         }
        //     }
        //     $producer->url_file = json_encode($result);
        //     $producer->save();
        // }
        return true;
    }
}