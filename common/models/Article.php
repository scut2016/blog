<?php
/**
 * 文件名：Article.php
 * 文件说明:
 * 时间: 2016/10/17.10:14
 */

namespace common\models;

use yii\db\ActiveRecord;

class Article extends ActiveRecord
{
    public $url=null;
       public $primaryKey='art_id';
        public static function tableName()
        {
            return '{{%article}}';
        }
    public function beforeSave($bool)
    {
        parent::beforeSave($bool);
    }
    public function afterFind()
    {
        parent::afterFind();
        $id=$this->art_id;
        $title=$this->art_title;
        $url="<a href='index.php?r=article/article&id=$id'>".$title."</a>";
        $this->url=$url;
    }
    //切换数据库
    public static function getDb()
    {
        return \Yii::$app->db2;  // 使用名为 "db2" 的应用组件
    }
}
