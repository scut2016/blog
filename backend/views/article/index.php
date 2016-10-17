<table class="table table-bordered">
    <? foreach($data as $v):?>
    <tr>
       <td><?=$v['art_id']?></td>
       <td><?=$v['art_title']?></td>
<!--        <td class="active"><a href="index.php?r=article/article&id=--><?//=$v['art_id']?><!--">--><?//=$v['art_title']?><!--</a></td>-->
        <td class="active"><?=$v['cate_id']?></td>
    </tr>
    <? endforeach;?>
</table>