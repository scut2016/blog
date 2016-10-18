<?php
/**
 * 文件名：CategoryController.php
 * 文件说明:
 * 时间: 2016/10/17.16:16
 */

namespace backend\controllers;
use common\models\Category;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use helpers\Tree;
class CategoryController extends Controller
{
    public $layout='admin';
    function actionIndex()
    {




//        $tree=\Yii::$app->Tree;
////        $tree=\Yii::$app->Tree($data,'cate_id','cate_pid');
////        $tree=new Tree($data,'cate_id','cate_pid');
//        $tree->first($data,'cate_id','cate_pid');
//
//      $arr=$tree::ancestor(21);

//        dd($tree::parents(21));
//        dd($tree::sort(0,0));
//       $data=$cate->limitless($data);
//        dd($data);
    }

    function actionList()
    {
        $cate= new Category();
        $data=$cate->find()->select('cate_keywords,cate_view,cate_title,cate_order,cate_id,cate_pid,cate_name')->asArray()->all();
        $data=$cate->limitless($data);
//        dd($data);
        return $this->render('list',['data'=>$data]);
    }

    function actionUpdate()
    {
        $cate= new Category();
        $data=$cate->find()->select('cate_id,cate_pid,cate_name')->asArray()->all();
        $data=$cate->limitless($data);
       $request= \Yii::$app->request;
        $id=$request->get('cate_id',1);
//        $cate=Category::find()->where(['cate_id'=>$id])->asArray()->one();
        $cate=Category::findOne($id);
        $cate= ArrayHelper::toArray($cate);
        return $this->render('update',['cate'=>$cate,'data'=>$data]);
    }


}