<table class="table table-bordered">
    <? foreach($data as $v):?>
    <tr>
       <td><?=$v->art_id?></td>
        <td class="active"><?=$v->url?></td>
    </tr>
    <? endforeach;?>
</table>