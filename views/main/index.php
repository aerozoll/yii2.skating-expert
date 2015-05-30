<?php
/* @var $this yii\web\View
 * @var $hello string
 */
use\app\components\FirstWidget;
use\app\components\SecondWidget;
use yii\bootstrap\Modal;
//use yii\bootstrap\Alert;
?>
<h1>main/index</h1>

<p>
    <?= $hello ?>
</p>
<?= FirstWidget::widget(
    [
        'a'=>33,
        'b'=>40
    ]
)?>

<? SecondWidget::begin() ?>
    Этот текст сделаем красным.
<? SecondWidget::end() ?>

<?
Modal::begin([
'header' => '<h2>Превед Мир!!!</h2>',
'toggleButton' => ['label' => 'click me'],
]);

echo 'Контент модального окна';

Modal::end();
?>

