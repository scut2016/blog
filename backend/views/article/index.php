<table class="table table-bordered">
    <? foreach($data as $v):?>
    <tr>
       <td><?=$v['art_id']?></td>
       <td><a href="<?=\yii\helpers\Url::toRoute(['article/article','id'=>$v['art_id']])?>"><?=$v['art_title']?></a></td>
<!--        <td class="active"><a href="index.php?r=article/article&id=--><?//=$v['art_id']?><!--">--><?//=$v['art_title']?><!--</a></td>-->
        <td class="active"><a href="<?=\yii\helpers\Url::toRoute(['category/category','id'=>$v['category']['cate_id']])?>"><?=$v['category']['cate_name']?></a></td>
    </tr>
    <? endforeach;?>
    
</table>
<?=\yii\widgets\LinkPager::widget(['pagination' => $pages]); ?>
