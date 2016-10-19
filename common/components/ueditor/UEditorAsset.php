<?php
/**
 * 文件名：UEditorAsset.php
 * 文件说明:
 * 时间: 2016/10/19.13:22
 */

namespace common\components\ueditor;

use yii\web\AssetBundle;
use yii\web\View;

class UEditorAsset extends AssetBundle
{
    public $js = [
        'ueditor.config.js',
        'ueditor.all.js',
    ];
//    public $jsOptions=[
//        'position'=>View::POS_BEGIN,
//    ];

    public function init()
    {
        $this->sourcePath = '@common/components/ueditor/ue';
    }
}