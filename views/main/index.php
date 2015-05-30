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

<?php SecondWidget::begin() ?>
    Этот текст сделаем красным.
<?php SecondWidget::end() ?>

<?php
    Modal::begin([
        'header' => '<h2>Превед Мир!!!</h2>',
        'toggleButton' => ['label' => 'нажми'],
        ]);

        echo 'Контент модального окна';

    Modal::end();
?>

