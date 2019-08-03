<?php if(!empty($members)){ foreach($members as $row){ ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['first_name']; ?></td>
    <td><?php echo $row['last_name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['gender']; ?></td>
    <td><?php echo $row['country']; ?></td>
    <td>
        <a href="javascript:void(0);" class="btn btn-warning" rowID="<?php echo $row['id']; ?>" data-type="edit" data-toggle="modal" data-target="#modalUserAddEdit">edit</a>
        <a href="javascript:void(0);" class="btn btn-danger" onclick="return confirm('Are you sure to delete data?')?userAction('delete', '<?php echo $row['id']; ?>'):false;">delete</a>
    </td>
</tr>
<?php } }else{ ?>
<tr><td colspan="7">No member(s) found...</td></tr>
<?php } ?>
