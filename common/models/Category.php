<?php
/**
 * 文件名：Category.php
 * 文件说明:
 * 时间: 2016/10/17.16:18
 */

namespace common\models;


use vendor\base\Model;
use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%category}}';
    }

    function limitless($data,$pid=0,$level=0)
    {
        $arr=[];
        foreach ($data as $v)
        {
            if($v['cate_pid']==$pid)
            {
                $v['level']=$level;
                $v['html']=str_repeat('-',$level*9).$v['cate_name'];
                $arr[]=$v;
                $arr=array_merge($arr,$this->limitless($data,$v['cate_id'],$level+1));
            }
        }
        return $arr;
    }

    public function afterSave($insert, $changedAttributes)
    {
//        dd( $changedAttributes) ;
        parent::afterSave($insert, $changedAttributes); 
//        $this->refresh();
    }
    public function rules(){
        return [
           [['cate_name','cate_title','cate_description','cate_keywords','cate_pid'] ,'safe']
        ];
    }


}