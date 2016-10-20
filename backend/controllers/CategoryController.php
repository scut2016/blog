<?php
/**
 * 文件名：CategoryController.php
 * 文件说明:
 * 时间: 2016/10/17.16:16
 */

namespace backend\controllers;
use common\components\PinYin;
use common\models\Article;
use common\models\Category;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\Controller;
use common\components\Tree;
class CategoryController extends Controller
{
//    public function init(){
//        $this->enableCsrfValidation = false;
//    }
//    public $enableCsrfValidation = true;
//    public $layout='admin';
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
        $category= ArrayHelper::toArray($cate);

       if($request->isPost)
        {
            $cate->cate_title=$request->post('cate_title');
            $cate->cate_pid=($request->post('cate_pid')==$category['cate_id'])?$category['cate_pid']:$request->post('cate_pid');
            $cate->cate_keywords=$request->post('cate_keywords');
            $cate->cate_description=$request->post('cate_description');
//            $c= ArrayHelper::toArray($cate);
//            dd($c);
//            die;
            $cate->save();
            $this->refresh();
        }

        return $this->render('update',['cate'=>$category,'data'=>$data]);
    }
    
    function actionDelete()
    {
        if(\Yii::$app->request->isGet)
        {
            $cate= new Category();
            $data=$cate->find()->select('cate_id,cate_pid,cate_name')->asArray()->all();
            $id=\Yii::$app->request->get('cate_id');
            $tree=new Tree($data,'cate_id','cate_pid');
            $deleteArr=$tree->sons($id);
            $arr=[];
            $arr[]=$id;
            foreach ($deleteArr as $key=>$value)
            {
                $arr[]=$value['cate_id'];
            }
            $cate->deleteAll(['in','cate_id',$arr]);
            $this->redirect('list');
//            dd($arr);
        }
      
//$t=\Yii::$app->Tree->($data,'cate_id','cate_pid');
//      $tt=  new $t($data,'cate_id','cate_pid');
//        dd($t);
//        dd($tree->parents(21));
//       dd($tree->ancestor(21));
    }

    function actionTest()
    {
        $p=new PinYin();
        $str='微微一笑很倾城';
        echo $p::encode($str);
    }

    function actionAdd()
    {
        $cate=new Category();
//        $arr=compact('cate','a','b','c');
        if($cate->load(\Yii::$app->request->post()) && $cate->save())
        {
            $this->redirect('list');
//            dd(\Yii::$app->request->post());
        }
        $data=$cate->find()->select('cate_id,cate_pid,cate_name')->asArray()->all();
        $data=$cate->limitless($data);
//        dd($data);
        $data=ArrayHelper::map($data,'cate_id','html');
        $data[0]='顶级分类';
//        dd($data);
        return $this->render('add',['model'=>$cate,'data'=>$data]);
    }

    function actionCategory()
    {
        $id=\Yii::$app->request->get('id');
        $allCategory=Category::find()->asArray()->all();
        $tree=new Tree($allCategory,'cate_id','cate_pid');
        $arr[]=$id;
        foreach ($tree->sons($id) as $k=>$v )
        {
            $arr[]=$v['cate_id'];
        }
//        dd($arr);

        $articles=Article::find()->andWhere(['art_cate_id'=>$arr]);
        $pages = new Pagination(['totalCount' =>$articles->count(), 'pageSize' => '5']);
        $data=$articles->with('category')->offset($pages->offset)->limit($pages->limit)->orderBy('art_id')->asArray()->all();


        
        //生成面包屑导航
        $allCategory=Category::find()->asArray()->all();
//        dd($allCategory);
        $tree=new Tree($allCategory,'cate_id','cate_pid');
        $url=$tree->parents($id);
//        dd($url);
        $arr=[];
        foreach ($url as $k=>$v)
        {
            $arr[$k]['label']=$v['cate_name'];
            $arr[$k]['url']=Url::toRoute(['category/category','id'=>$v['cate_id']]);
        }
        $arr=array_reverse($arr);

//        $articles=Article::find()->where(['in','art_cate_id',$arr])->all();
//        dd($articles);
        return $this->render('//article/index',['data'=>$data,'pages'=>$pages,'id'=>$id,'arr'=>$arr]);
    }


}