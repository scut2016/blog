<?php
/**
 * 文件名：CategoryController.php
 * 文件说明:
 * 时间: 2016/10/17.16:16
 */

namespace backend\controllers;
use common\models\Category;
use yii\web\Controller;

class CategoryController extends Controller
{
    function actionIndex()
    {
       $cate= new Category();
       $data=$cate->find()->asArray()->all();
       $data=$cate->limitless($data);
        dd($data);

    }

}