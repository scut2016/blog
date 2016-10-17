<?php
/**
 * 文件名：ArticleController.php
 * 文件说明:
 * 时间: 2016/10/17.9:52
 */

namespace backend\controllers;

use common\models\Article;
use yii\web\Controller;

class ArticleController extends Controller
{
    public $defaultAction='index';//默认的方法名

    function actionIndex()//home-admin-world
    {
//       $articles=new Article();
//       dd($articles->find()->where("art_tag like '%动画%'")->asArray()->one()) ;
//        die;
       $table=Article::tableName();

        $sql="select * from $table";
        $arr=Article::findBySql($sql);
        dd($arr->asArray()->all());
        die;
        $data=Article::find()->select('art_id,art_title')->where('art_id<10')->asArray()->orderBy('art_id')->all();
       return  $this->render('index',['data'=>$data]);
    }
}