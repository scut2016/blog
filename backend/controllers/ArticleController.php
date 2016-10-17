<?php
/**
 * 文件名：ArticleController.php
 * 文件说明:
 * 时间: 2016/10/17.9:52
 */

namespace backend\controllers;

use common\models\Article;
use yii\web\Controller;
use yii;
class ArticleController extends Controller
{
    public $defaultAction='index';//默认的方法名

    function actionIndex()//home-admin-world
    {

       $articles=Article::find()->orderBy('art_id')->all();
//       $articles=new Article();
//       dd($articles->find()->where("art_tag like '%动画%'")->asArray()->one()) ;
//        die;
//       $table=Article::tableName();

//        $data=Article::find();
//        $data=$data->asArray()->orderBy('art_id')->all();
     return  $this->render('index',['data'=>$articles]);
    }
    function actionArticle()
    {
        $request=Yii::$app->request;
       $id=$request->get('id');
        $article=Article::find()->where(['art_id'=>$id])->asArray()->one();
        return $this->render('article',['article'=>$article]);
    }
  
}