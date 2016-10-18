<?php
/**
 * 文件名：CategoryController.php
 * 文件说明:
 * 时间: 2016/10/17.16:16
 */

namespace backend\controllers;
use common\models\Category;
use common\widgets\CateNav;
use yii\web\Controller;
use helpers\Tree;
class CategoryController extends Controller
{
    public $layout='admin';
    function actionIndex()
    {

       $cate= new Category();
       $data=$cate->find()->select('cate_id,cate_pid,cate_name')->asArray()->all();
        $tree=\Yii::$app->Tree;
//        $tree=\Yii::$app->Tree($data,'cate_id','cate_pid');
//        $tree=new Tree($data,'cate_id','cate_pid');
        $tree->first($data,'cate_id','cate_pid');

      $arr=$tree::ancestor(21);

        dd(CateNav::widget(['cates'=>$arr['cate_name']]));
//        dd($tree::parents(21));
//        dd($tree::sort(0,0));
//       $data=$cate->limitless($data);
//        dd($data);
    }

    function actionList()
    {
        return $this->render('list');
    }


}