<?php

namespace app\controllers;

class MainController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $hello = 'Привет Мир!';
        return $this->render(
            'index',
            [
                'hello' => $hello
            ]);
    }

    function init()
    {
        $this->layout = 'basic';
    }

}
