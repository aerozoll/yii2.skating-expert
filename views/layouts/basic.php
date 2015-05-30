<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 22.05.2015
 * Time: 23:04
 */
/*@var $content string */
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language?>">
<head>
    <meta charset="<?= Yii::$app->charset?>"
    <title><?= Yii::$app->name ?></title>
</head>
    <body>
        <p>Верхняя часть</p>

        <?= $content ?>

        <p>Нижняя часть</p>
    </body>
</html>