<?php
use yii\helpers\Json;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\modules\admin\models\Category;
use app\modules\admin\models\Subcategory;
use app\modules\admin\models\Region;
use app\modules\admin\models\City;
use app\modules\admin\models\Advert;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Advert */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advert-form">

    <?php //$form = ActiveForm::begin(); ?>
	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
		
		<?= $form->field($model, 'file')->fileInput() ?>

		<?= $form->field($model, 'title')->textInput(['maxlength' => 150]) ?>
		
		<?php	
			$dataCategory=ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'title');
			echo $form->field($model, 'category_id')->dropDownList($dataCategory, 
				 ['prompt'=>'-Choose a Category-',
				  'onchange'=>'
					$.post( "'.Yii::$app->urlManager->createUrl('admin/advert/listcategory?id=').'"+$(this).val(),
					function( data ) {
					  $( "select#title" ).html( data );
					});
				']); 

			//$dataPost=ArrayHelper::map(Subcategory::find()->asArray()->all(), 'id', 'title');
			$dataPost = array(0=>'select');
			echo $form->field($model, 'title')
				->dropDownList(
					$dataPost,           
					['id'=>'title']
				);
		?>	

		<?//= $form->field($model, 'user_id')->textInput() ?>

		<?php	
			$dataRegion=ArrayHelper::map(Region::find()->asArray()->all(), 'id', 'name');
			echo $form->field($model, 'region_id')->dropDownList($dataRegion, 
				 ['prompt'=>'-Choose a Region-',
				  'onchange'=>'
					$.post( "'.Yii::$app->urlManager->createUrl('admin/advert/listcity?id=').'"+$(this).val(), 
					function( data ) {
					  $( "select#name" ).html( data );
					});
				']); 
			
			$dataPost = array(0=>'select');
			echo $form->field($model, 'city_id')
				->dropDownList(
					$dataPost,           
					['id'=>'name']
				);
		?>	
		<?//= $form->field($model, 'privat_business')->textInput() ?>
        <?= $form->field($model, 'privat_business')->dropDownList(ArrayHelper::map(Advert::find()->groupBy('privat_business')->all(),'id','privat_business'),
            ['promt'=>'Select privat business'])
        ?>
		<?//= $form->field($model, 'created')->textInput() ?>

		<?//= $form->field($model, 'expiration')->textInput() ?>

		<?= $form->field($model, 'status')->textInput() ?>

		<?= $form->field($model, 'buy_selling')->textInput() ?>


    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

    <?php ActiveForm::end(); ?>

</div>