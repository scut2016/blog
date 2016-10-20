<?php
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
echo Breadcrumbs::widget([
    'homeLink'=>['label'=>'文章首页','url'=>Url::to('index')],
    'links'=>$article,
    'options'=>[
        'class'=>'breadcrumb',
    ]
]);
?>
<h3><?=$data['art_title']?></h3>
<h3>查看次数：<?=$data['art_view']?></h3>
<p><?=$data['art_content']?></p>