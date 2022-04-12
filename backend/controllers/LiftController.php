<?php
namespace backend\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use backend\models\LiftForm;
use common\models\Type;
use common\models\Producer;
use common\models\Lift;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\web\Response;

class LiftController extends Controller
{

    public $imagesOnCreate = '';
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
       
        $lifts = Lift::find()->all();
        $types = [];
        $producers = [];

        foreach($lifts as $lift){
             $types[$lift->type_id] = Type::find()->where(['id' => $lift->type_id])->one();
        }
        foreach($lifts as $lift){
            $producers[$lift->producer_id] = Producer::find()->where(['id' => $lift->producer_id])->one();
       }

        return $this->render('index',[
            'lifts' => $lifts,
            'types' => $types,
            'producers' => $producers
        ]);
    }

    public function actionCreate()
    {
        $types = Type::find()->all();
        $providers = Producer::find()->all();
        if(count($types) == 0)
        {
            Yii::$app->session->setFlash('error', 'Немає видів ліфтів');
            return  $this->redirect(['lift/index']);
        }
        if(count($providers) == 0)
        {
            Yii::$app->session->setFlash('error', 'Немає виробників ліфтів');
            return  $this->redirect(['lift/index']);
        }
        foreach ($types as $type) {
            $type_array[$type->id] = $type->name;
        }
       
        foreach ($providers as $provider) {
            $provider_array[$provider->id] = $provider->name;
        }
        $model = new LiftForm;
        if($model->load(Yii::$app->request->post()))
        {
            $model->imageFile = UploadedFile::getInstances($model,'imageFile');
            if($imagePath=$model->upload())
           {
            $lift = new Lift;
            $lift->description = $model->description;
            $lift->type_id = $model->type_id ;
            $lift->producer_id = $model->producer_id ;

            $lift->url_image = json_encode($imagePath);
            if($lift->save())
            {
                return  $this->redirect(['lift/'.$lift->id.'/update']);
            // Yii::$app->session->setFlash('success', 'Товар збережено в БД ');
            }
            else{
                Yii::$app->session->setFlash('error', 'Помилка НЕ збережено в БД ');
               }
           } else{
           return $this->render('create', [
            'model' => $model,
            'types' => $type_array,
            'producers' => $provider_array,
            'initialPreview' => [],
            'initialConfig' => [],
            'lift_id'=> '',
            'msg'=>'обов\'язкове поле',
            'dangerStyle' =>'border: 1px solid red; border-radius: 10px;',
        ]);
    }
   
          
        }
        
       

        return $this->render('create', [
            'model' => $model,
            'types' => $type_array,
            'producers' => $provider_array,
            'initialPreview' => [],
            'initialConfig' => [],
            'lift_id'=> '',
            'msg'=>'',
            'dangerStyle' =>'',
        ]);
    }
    public function actionUpdate($id){
        $model = new LiftForm;
        $lift = Lift::findOne(['id' => $id]);
        if($model->load(Yii::$app->request->post()))
        {       
            $lift->description = $model->description;
            $lift->type_id = $model->type_id ;
            $lift->producer_id = $model->producer_id ;        
            if($lift->save())
            {
             //Yii::$app->session->setFlash('success', 'Товар збережено в БД ');
            }
            else{
                Yii::$app->session->setFlash('error', 'Помилка НЕ збережено в БД ');
            }
           
         return  $this->redirect(['lift/index']);
          
        }

        $model->description = $lift->description;
        $model->type_id = $lift->type_id;
        $model->producer_id = $lift->producer_id;
        $providers = Producer::find()->all();
        foreach ($providers as $provider) {
            $provider_array[$provider->id] = $provider->name;
        }
        $types = Type::find()->all();
        foreach ($types as $type) {
            $type_array[$type->id] = $type->name;
        }
        $images= json_decode($lift->url_image,true);
        $initialPreview = [];
        $initialConfig = [];
        foreach ($images as $image) {
            $initialPreview[]='../../' . $image;
          
            $initialConfig []=[
                'key' => $image,
            ];
        }

        return $this->render('update', [
            'model' => $model,
            'producers' => $provider_array,
            'types' => $type_array,
            'initialPreview' => $initialPreview,
            'lift_id'=> $lift->id,
            'initialConfig' =>  $initialConfig,
        ]);

    }

    public function actionDelete($id){
        $model = new LiftForm;
        $lift = Lift::findOne(['id' => $id]);
        $images = json_decode($lift->url_image,true);
        $result = [];
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
           
        return  $this->redirect(['lift/index']);
    }
    public function actionFileDeleteLift($id){
        
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
       // var_dump("1");
        if(isset($_POST['key'])){
            $image = $_POST['key'];
           // var_dump("2");
           // var_dump($_POST['key']);
           
            
            $lift = Lift::findOne(['id' => $id]);
            $images = json_decode($lift->url_image,true);
            if(count($images) > 1){
                unlink($_POST['key']);
                $result = [];
                foreach ($images as $value) {
                    if($image != $value){
                        $result[] = $value;
                    }
                }
                $lift->url_image = json_encode($result);
                $lift->save();
            }
        }
        return true;
    }
    public function actionView($id){
        $model = new LiftForm;
        $lift = Lift::findOne(['id' => $id]);
        if($model->load(Yii::$app->request->post()))
        {
            $model->imageFile = UploadedFile::getInstances($model,'imageFile');
            $imagePath=$model->upload();
           if($imagePath !== false)
           {    
            $lift->description = $model->description;
            $lift->type_id = $model->type_id ;
            $lift->producer_id = $model->producer_id ;
            if($imagePath)
            {
                $image = json_decode($lift->url_image,true);
                $imagePath = array_merge($image, $imagePath);
                $lift->url_image = json_encode($imagePath);

            }
            $lift->url_image = json_encode($imagePath);
            
           }
         return  $this->redirect(['lift/index']);
          
        }

        $model->description = $lift->description;
        $model->type_id = $lift->type_id;
        $model->producer_id = $lift->producer_id;
        $producer = Producer::find()->where(['id' => $lift->producer_id])->one();
        $type = Type::find()->where(['id' => $lift->type_id])->one();
       
        $images= json_decode($lift->url_image,true);
        $initialPreview = [];
        $initialConfig = [];
        foreach ($images as $image) {
            $initialPreview[]='../../' . $image;
          
            $initialConfig []=[
                'key' => $image,
            ];
        }

        return $this->render('view', [
            'model' => $model,
            'type' => $type->name,
            'producer' => $producer->name,
            'initialPreview' => $initialPreview,
            'lift_id'=> $lift->id,
            'initialConfig' =>  $initialConfig,
        ]);

    }
    public function actionUpload($id)
    {
        if (isset($_POST)) {
            $files= LiftController::SaveTempAttachments($_FILES, $id);
            $result = ['files'=>$files];
            Yii::$app->response->format = trim(Response::FORMAT_JSON);
            return  $result;
        }

    }
    public static function SaveTempAttachments($attachments, $id)
    {    $lift = Lift::findOne(['id' => $id]);
        $files[]='';
        $allwoedFiles=['jpg'];
        $imagePath=[];
        if (!empty($attachments)) {
            if (count($attachments['files']['name']) > 0) {
                //Loop through each file
                for ($i = 0; $i < count($attachments['files']['name']); $i++) {
                    //Get the temp file path
                    $tmpFilePath = $attachments['files']['tmp_name'][$i];
    
                    //Make sure we have a filepath
                    if ($tmpFilePath != "") {
                        //save the filename
                        $shortname = $attachments['files']['name'][$i];
                        $size = $attachments['files']['size'][$i];
                        $ext = substr(strrchr($shortname, '.'), 1);
                        if(in_array($ext,$allwoedFiles)){
                            //save the url and the file
                            $newFileName = Yii::$app->security->generateRandomString(40) . "." . $ext;
                            //Upload the file into the temp dir

                          array_push($imagePath , '../../images/lift/' . $newFileName);
                            if (move_uploaded_file( $tmpFilePath ,  '../../images/lift/' . $newFileName)) {
                                $files[] =['fileName'=>$newFileName,'type'=>$ext,'size'=>(($size/1000)),'originalName'=>$shortname];
                               
                            }
    
                        }
                    }
                }
            }
    
        }
        $image = json_decode($lift->url_image,true);
        $imagePath = array_merge($image, $imagePath);
        $lift->url_image = json_encode($imagePath);
        if($lift->save())
            {
             //Yii::$app->session->setFlash('success', 'Товар збережено в БД ');
            }
            else{
                Yii::$app->session->setFlash('error', 'Помилка НЕ збережено в БД ');
               }
           
        $images = json_decode($lift->url_image,true);
        return $images;
    }
   
   
}