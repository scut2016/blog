<?php
/**
 * 文件名：Article.php
 * 文件说明:
 * 时间: 2016/10/17.10:14
 */

namespace common\models;

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
//        $title=$this->art_title;
//        $this->art_title="<a href='".Url::toRoute($id)."'>".$title."</a>";
////        $this->url=$url;
    }
    //切换数据库
    public static function getDb()
    {
        return \Yii::$app->db;  // 使用名为 "db2" 的应用组件
    }
    public function rules(){
        return [
            [['art_title','art_description','art_content','art_tag','cate_id'] ,'safe']
        ];
    }
    public function getCategory()
    {
        return $this->hasOne(Category::className(),['cate_id'=>'cate_id'])->asArray();
    }
}
