<?php if(!empty($voucher)){ foreach($voucher as $row){ ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['voucher']; ?></td>
    <td>
        <a href="javascript:void(0);" class="btn btn-warning" rowID="<?php echo $row['id']; ?>" data-type="edit" data-toggle="modal" data-target="#modalUserAddEdit">edit</a>
        <a href="javascript:void(0);" class="btn btn-danger" onclick="return confirm('Are you sure to delete data?')?userAction('delete', '<?php echo $row['id']; ?>'):false;">delete</a>
    </td>
</tr>
<?php } }else{ ?>
<tr><td colspan="7">No voucher(s) found...</td></tr>
<?php } ?>
