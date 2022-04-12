<?php 
    namespace backend\controllers;
    
    use Yii;
    use yii\web\Controller;
    use yii\web\UploadedFile;
    use yii\data\ActiveDataProvider;
    use yii\helpers\ArrayHelper;
    use yii\filters\AccessControl;
    use common\models\Type;
    use backend\models\TypeForm;
    use common\models\Lift;
   
    class TypeController extends Controller
    {
        public function behaviors()
        {
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => [],
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['admin','owner','manager'],
                        ]
                    ],
                ],
            ];
        }
        
        public function actionIndex()
        {
            return $this->render('index',[
                'types' =>Type::find()->asArray()->all()
            ]);
        }

        public function actionCreate()
        {
            $model = new TypeForm;
           
            if($model->load(Yii::$app->request->post()))
            {
                $model->imageFile = UploadedFile::getInstances($model,'imageFile');
                if($imagePath=$model->upload())
                {
                    $type = new Type;
                    $type->name = $model->name;
                    $type->description = $model->description;
                    $type->url_image = json_encode($imagePath);
                    if($type->save())
                    {
                    // Yii::$app->session->setFlash('success', 'Type saved into DB');
                    }
                    else { 
                        Yii::$app->session->setFlash('error', 'Error! Type NOT saved into DB ');
                    }
                    return  $this->redirect(['index']);
                }else{
                    $model->imageFile='';
                    return $this->render('create', [
                        'model' => $model,    
                        'initialPreview' => [],
                        'initialConfig' => [],
                        'type_id'=> '',
                        'msg'=>'обов\'язкове поле',
                        'dangerStyle' =>'border: 1px solid red; border-radius: 10px;',
                    ]);
                }
               
               
            
            }
        
            return $this->render('create', [
                'model' => $model, 
                'msg'=>'',   
                'initialPreview' => [],
                'initialConfig' => [],
                'type_id'=> '',
                'dangerStyle' =>'',
            ]);
        }

        public function actionUpdate($id){
            $model = new TypeForm;

            $type = Type::findOne(['id' => $id]);

            if($model->load(Yii::$app->request->post()))
            {
                $model->imageFile = UploadedFile::getInstances($model,'imageFile');
                $imagePath=$model->upload();
                if($imagePath !== false)
                {
                        $type->name = $model->name;
                        $type->description = $model->description;
                        if($imagePath)
                        {
                            $image = json_decode($type->url_image,true);
                            unlink($image);
                            $type->url_image = json_encode($imagePath);
                        }
                       
                        if($type->save())
                        {
                            //Yii::$app->session->setFlash('success', 'Товар збережено в БД ');
                        }
                        else{
                            Yii::$app->session->setFlash('error', 'Помилка НЕ збережено в БД ');
                        }
                }
                return  $this->redirect(['index']);
            
            }

            $model->name = $type->name;
            $model->description = $type->description;  
            $initialPreview = [];
            $initialConfig = [];
            $image= json_decode($type->url_image,true);
           
                $initialPreview[]='../../' . $image;
              
                $initialConfig []=[
                    'key' => $image,
                ];
            
            return $this->render('create', [
                'model' => $model,        
                'msg'=>'',
                'dangerStyle' =>'',
                'initialPreview' => $initialPreview,
                'type_id'=> $type->id,
                'initialConfig' =>  $initialConfig,
            ]);
        }

        public function actionDelete($id)
        {
            $model = new Type;
            $type = Type::findOne(['id' => $id]);
            $lifts = Lift::find()->where(['type_id' => $id])->all();
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
            $image = json_decode($type->url_image,true);
            unlink($image);
            if($type -> delete())
            {
            // Yii::$app->session->setFlash('success', ' видалено з БД ');
            }
            else{
                Yii::$app->session->setFlash('error', 'Помилка НЕ видалено з БД ');
            }
           
            return $this->redirect(['type/index']);
        }
        public function actionFileDeleteType($id){
        
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            // if(isset($_POST['key'])){
            //     $image = $_POST['key'];
               
            //     unlink($_POST['key']);
            //     $type = Type::findOne(['id' => $id]);
            //     $images = json_decode($type->url_image,true);
            //     $result = [];
            //     foreach ($images as $value) {
            //         if($image != $value){
            //             $result[] = $value;
            //         }
            //     }
            //     $type->url_image = json_encode($result);
            //     $type->save();
            // }
            return true;
        }
    }