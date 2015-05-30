<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\modules\admin\models\Category;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Subcategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="subcategory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 150]) ?>

    <?//= $form->field($model, 'category_id')->textInput() ?>
	<?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map(Category::find()->all(),'id','title'),['promt'=>'Select Category']
	); 
	?>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>