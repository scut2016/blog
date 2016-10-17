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
       public $primaryKey='art_id';
        public static function tableName()
        {
            return '{{%article}}';
        }
}