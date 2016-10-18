<?php
/**
 * 文件名：AdminController.php
 * 文件说明:
 * 时间: 2016/10/18.9:17
 */

namespace backend\controllers;


use yii\web\Controller;

class AdminController extends Controller
{
    public $layout='admin';
    function actionIndex()
    {
        return $this->render('index');
    }
}