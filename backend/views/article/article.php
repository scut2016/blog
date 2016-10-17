<?php
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
echo Breadcrumbs::widget([
    'homeLink'=>['label'=>'文章首页','url'=>Url::to('index')],
    'links'=>[
        [
            'label'=>$article['cate_id'],
            'url'=>'',
            'template' => "<li><b>{link}</b></li>\n", // template for this link only
        ],
        [
            'label' => $article['art_title'] ,
            'url'=>'',
        ],

      ],
    'options'=>[
        'class'=>'breadcrumb',
    ]
]);
?>
<h3><?=$article['art_title']?></h3>
<p><?=$article['art_content']?></p>