<?php
/**
 * 文件名：Article.php
 * 文件说明:
 * 时间: 2016/10/17.10:14
 */

namespace common\models;

use common\components\Tree;
use yii\db\ActiveRecord;
use yii\helpers\Url;

class Article extends ActiveRecord
{
    public $url=null;
       public $primaryKey='art_id';
        public static function tableName()
        {
            return '{{%article}}';
        }
    //给文章加上时间戳
    public function beforeSave($bool)
    {
        if(parent::beforeSave($bool)){
            if($this->isNewRecord){
                $this->art_time = time();
            }else{
                $this->art_time = time();
            }
            return true;
        }else{
            return false;
        }
    }
    public function afterFind()
    {
        parent::afterFind();
//        $id=$this->art_id;
        $cate=Category::find()->asArray()->all();
        $tree=new Tree($cate,'cate_id','cate_pid');
//        dd($tree->parents($this->art_cate_id));
        $arr=[];
        foreach ($tree->parents($this->art_cate_id) as $v)
        {
            $arr[]=$v['cate_id'];
        }
        Category::updateAllCounters(['cate_view'=>1],['in','cate_id',$arr]);
        $this->art_view+=1;
        $this->save();
    }
    //切换数据库
    public static function getDb()
    {
        return \Yii::$app->db;  // 使用名为 "db2" 的应用组件
    }
    public function rules(){
        return [
            [['art_title','art_description','art_content','art_tag','art_cate_id'] ,'safe']
        ];
    }
    public function getCategory()
    {
        return $this->hasOne(Category::className(),['cate_id'=>'art_cate_id'])->asArray();
    }
}
