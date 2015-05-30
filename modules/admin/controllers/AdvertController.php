<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\Advert;
use app\modules\admin\models\AdvertSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

use app\modules\admin\models\Subcategory;
use app\modules\admin\models\City;
/**
 * AdvertController implements the CRUD actions for Advert model.
 */
class AdvertController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Advert models.
     * @return mixed
     */
    public function actionIndex()
    {
       	$searchModel = new AdvertSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Advert model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Advert model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Advert();
				
		if ($model->load(Yii::$app->request->post()) ) {
			
			$model->file = UploadedFile::getInstance($model, 'file');
			
			if ($model->validate()) {                
				$model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
			}
			$model->photo = 'uploads/'.$model->file->baseName.'.'.$model->file->extension;
		
			$model->created = date('Y-m-d h:m:s');
			$model->save();
            
			return $this->redirect(['view', 'id' => $model->id]);
        } 
		else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Advert model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Advert model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Advert model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Advert the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Advert::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
	
	public function actionListcategory($id)
    {
       $countPosts ="";
	   
	   $countPosts = Subcategory::find()
                ->where(['category_id' => $id])
                ->count();
		//var_dump($countPosts);
        $posts = Subcategory::find()
                ->where(['category_id' => $id])
                ->orderBy('id ASC')
                ->all();
		
        if($countPosts>0){
            foreach($posts as $post){
                echo "<option value='".$post->id."'>".$post->title."</option>";
            }
        }
        else{
            echo "<option>not subcategory</option>";
        }
		
    }

    /**
     * @param $id
     */
    public function actionListcity($id)
    {
       $countPosts ="";
	   
	   $countPosts = City::find()
                ->where(['region_id' => $id])
                ->count();
		
        $posts = City::find()
                ->where(['region_id' => $id])
                ->orderBy('id ASC')
                ->all();
		
        if($countPosts>0){
            foreach($posts as $post){
                echo "<option value='".$post->id."'>".$post->name."</option>";
            }
        }
        else{
            echo "<option>not region</option>";
        }
		
    }
}
