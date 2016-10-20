<?php
/**
 * 文件名：ArticleController.php
 * 文件说明:
 * 时间: 2016/10/17.9:52
 */

namespace backend\controllers;

use common\components\Tree;
use common\models\Article;
use common\models\Category;
use yii\web\Controller;
use yii;
use yii\helpers\ArrayHelper;
class ArticleController extends Controller
{
    public $defaultAction='index';//默认的方法名

    function actionIndex()//home-admin-world
    {

//       $articles=Article::find()->where(['art_id'=>[2,3,5],'cate_id'=>1])->orderBy(['art_id'=>SORT_DESC] )->all();
      $articles=Article::find()->with('category')->orderBy('art_id')->asArray()->all();

//        $articles=ArrayHelper::toArray($articles);
//        dd($articles);
//        dd($articles);
//        dd($a);
//        $a=new Article();
//        dd($a->findAll(['<','art_id','10']));
//        die;
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
//        $article=Article::find()->where(['art_id'=>$id])->asArray()->one();

        $art=Article::findOne($id);
//     $cate=Category::findOne(['cate_id'=>$art->cate_id]);
        $cate=$art->category;
//      $cate=$art->getCategory();
        $allCategory=Category::find()->asArray()->all();
//        dd($allCategory);
        $tree=new Tree($allCategory,'cate_id','cate_pid');
        $url=$tree->parents($cate['cate_id']);
//        dd($url);
        $arr=[];
        foreach ($url as $k=>$v)
        {
            $arr[$k]['label']=$v['cate_name'];
            $arr[$k]['url']=yii\helpers\Url::toRoute(['category/category','id'=>$v['cate_id']]);
        }
        $arr=array_reverse($arr);
        $arr[]['label']=$art->art_title;

//        dd($arr);
        
        return $this->render('article',['article'=>$arr,'data'=>$art]);
    }
    
    function actionAdd()
    {
        $model=new Article();
        
        if($model->load(\Yii::$app->request->post()) &&$model->save())
        {

            dd(\Yii::$app->request->post());
        }
//        if($model->load(\Yii::$app->request->post()) && $model->save())
//        {
//            $this->redirect('index');
////            dd(\Yii::$app->request->post());
//        }
        return $this->render('add',['model'=>$model]);
    }
    public function actions()
    {
        return [
            'upload' => [
                'class' => 'common\components\ueditor\UEditorAction',
                'config' => [
                    "imageUrlPrefix"  => "",//图片访问路径前缀
                    "imagePathFormat" => "/upload/image/{yyyy}{mm}{dd}/{time}{rand:6}", //上传保存路径
                     "imageRoot" => Yii::getAlias("@webroot"),
            ],
        ]
    ];
}
  public function actionTest()
  {
     

  }
}