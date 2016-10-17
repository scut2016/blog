<table class="table table-bordered">
    <? foreach($data as $v):?>
    <tr>
       <td><?=$v['art_id']?></td>
        <td class="active"><?=$v['art_title']?></td>
    </tr>
    <? endforeach;?>
</table>