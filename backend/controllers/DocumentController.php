<?php
namespace backend\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use backend\models\DocumentForm;
use common\models\Producer;
use common\models\Document;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use yii\db\Query;

class DocumentController extends Controller
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
        $documents = Document::find()->all();
       
        return $this->render('index',[
            'document' => $documents, 
        ]);
    }

    public function actionCreate()
    {  
        $model = new DocumentForm;
        if($model->load(Yii::$app->request->post()))
        {
            $model->documentFile = UploadedFile::getInstances($model,'documentFile');
           if($documentPath=$model->upload())
           {
            $document = new Document;
            $document->description = $model->description;
            $document->name = $model->name;
            $document->url_file = json_encode($documentPath);
            if($document->save())
            {
            // Yii::$app->session->setFlash('success', 'Товар збережено в БД ');
            }
            else{
                Yii::$app->session->setFlash('error', 'Помилка НЕ збережено в БД ');
               }
           }
         return  $this->redirect(['document/index']);
          
        }
        
       
        return $this->render('create', [
            'model' => $model,
            'initialPreview' => [],
            'initialConfig' => [],
            'document_id'=> '',
        ]);
    }
    public function actionUpdate($id){
        $model = new DocumentForm;
        $document = Document::findOne(['id' => $id]);
        if($model->load(Yii::$app->request->post()))
        {
            $model->documentFile = UploadedFile::getInstances($model,'documentFile');
            $documentPath=$model->upload();
           if($documentPath !== false)
           {
            $document->description = $model->description;
            $document->name = $model->name;
            if($documentPath)
            {
                $file = json_decode($document->url_file,true);
                unlink($file);
                $document->url_file = json_encode($documentPath);
                
            }
            
            if($document->save())
            {
             //Yii::$app->session->setFlash('success', 'Товар збережено в БД ');
            }
            else{
                Yii::$app->session->setFlash('error', 'Помилка НЕ збережено в БД ');
               }
           }
         return  $this->redirect(['document/index']);
          
        }

        $model->description = $document->description;
        $model->name = $document->name;
        $file= json_decode($document->url_file,true);
        $initialPreview = [];
        $initialConfig = [];
            $initialPreview[]='../../' . $file;
            $initialConfig []=[
                'key' => $file,
            ];
        
        return $this->render('create', [
            'model' => $model,
            'initialPreview' => $initialPreview,
            'document_id'=> $document->id,
            'initialConfig' =>  $initialConfig,
        ]);

    }

    public function actionDelete($id){
        $model = new DocumentForm;
        $document = Document::findOne(['id' => $id]);
        $file = json_decode($document->url_file,true);
        $result = [];
         
               unlink($file);
        

        if($document -> delete())
            {
             //Yii::$app->session->setFlash('success', 'Товар видалено з БД ');
            }
            else{
                Yii::$app->session->setFlash('error', 'Помилка НЕ видалено з БД ');
            }
           
        return  $this->redirect(['document/index']);
    }
    public function actionFileDeleteDocument($id){
        
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        // if(isset($_POST['key'])){
        //     $file = $_POST['key'];
           
        //     unlink($_POST['key']);
        //     $document = Document::findOne(['id' => $id]);
        //     $files = json_decode($document->url_file,true);
        //     $result = [];
        //     foreach ($files as $value) {
        //         if($file != $value){
        //             $result[] = $value;
        //         }
        //     }
        //     $document->url_file = json_encode($result);
        //     $document->save();
        // }
        return true;
    }
    public function actionView($id){
        $model = new DocumentForm;
        $document = Document::findOne(['id' => $id]);
       

        $model->description = $document->description;
        $model->name = $document->name;
        $file= json_decode($document->url_file,true);
        $initialPreview[]='' . $file;
        $initialConfig []=[
            'key' => $file,
        ];
        
        return $this->render('view', [
            'model' => $model,
            'initialPreview' => $initialPreview,
            'document_id'=> $document->id,
            'initialConfig' =>  $initialConfig,
        ]);

    }
    public function actionFile($filename)
    {
        //return \Yii::$app->response->sendFile($filename); 
        return Yii::$app->response->sendFile($filename,'', ['inline'=>true]);
       
    }
}