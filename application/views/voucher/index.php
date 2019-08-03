<div class="container">
    <!-- Display status message -->
    <div class="statusMsg"></div>
    
    <div class="row">
        <div class="col-md-12 head">
            <h5><?php echo $title; ?></h5>
            <!-- Add link -->
            <div class="float-right">
                <a href="javascript:void(0);" class="btn btn-success" data-type="add" data-toggle="modal" data-target="#modalUserAddEdit"><i class="plus"></i> New Voucher</a><br>
                <form action="<?php echo base_url('/voucher/addVoucher')?>" method="post">
                Isi <input name="isi" type="number"> Voucher <input type="submit" class="btn btn-success" value="Isi Otomatis">
                </form>
            </div>
        </div>
    
        <!-- Data list table --> 
        <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>No Voucher</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="userData">
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
            <tr><td colspan="7">No Voucher found...</td></tr>
            <?php } ?>
        </tbody>
        </table>
    </div>
</div>


<!-- Modal Add and Edit Form -->
<div class="modal fade" id="modalUserAddEdit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><span id="hlabel">Add New</span> No Voucher</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="statusMsg"></div>
                <form role="form">
                    <div class="form-group">
                        <label>No Voucher</label>
                        <input type="text" class="form-control" name="voucher" id="voucher" placeholder="Masukan No Voucher" >
                    </div>
                    <input type="hidden" class="form-control" name="id" id="id"/>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="userSubmit">SUBMIT</button>
            </div>
        </div>
    </div>
</div>

<script>
// Update the voucher data list
function getUsers(){
    $.post( "<?php echo base_url('voucher/listView/'); ?>", function( data ){
        $('#userData').html(data);
    });
}

// Send CRUD requests to the server-side script
function userAction(type, id){
    id = (typeof id == "undefined")?'':id;
    var userData = '', frmElement = '';
    if(type == 'add'){
        frmElement = $("#modalUserAddEdit");
        userData = frmElement.find('form').serialize();
    }else if (type == 'edit'){
        frmElement = $("#modalUserAddEdit");
        userData = frmElement.find('form').serialize();
    }else{
        frmElement = $(".row");
        userData = 'id='+id;
    }
    frmElement.find('.statusMsg').html('');
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('voucher/'); ?>'+type,
        dataType: 'JSON',
        data: userData,
        beforeSend: function(){
            frmElement.find('form').css("opacity", "0.5");
        },
        success:function(resp){
            frmElement.find('.statusMsg').html(resp.msg);
            if(resp.status == 1){
                if(type == 'add'){
                    frmElement.find('form')[0].reset();
                }
                getUsers();
            }
            frmElement.find('form').css("opacity", "");
        }
    });
}

// Fill the user's data in the edit form
function editUser(id){
    $.post( "<?php echo base_url('voucher/memData/'); ?>", {id: id}, function( data ){
        $('#id').val(data.id);
        $('#voucher').val(data.voucher);
    }, "json");
}

// Actions on modal show and hidden events
$(function(){
    $('#modalUserAddEdit').on('show.bs.modal', function(e){
        var type = $(e.relatedTarget).attr('data-type');
        var userFunc = "userAction('add');";
        $('#hlabel').text('Add New');
        if(type == 'edit'){
            userFunc = "userAction('edit');";
            var rowId = $(e.relatedTarget).attr('rowID');
            editUser(rowId);
            $('#hlabel').text('Edit');
        }
        $('#userSubmit').attr("onclick", userFunc);
    });
    
    $('#modalUserAddEdit').on('hidden.bs.modal', function(){
        $('#userSubmit').attr("onclick", "");
        $(this).find('form')[0].reset();
        $(this).find('.statusMsg').html('');
    });
});
</script>
