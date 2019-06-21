<!-- ADD -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="modal-title"><b>Add API Code</b></h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal" method="POST" action="apikey_add.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="apireference" class="col-sm-3 control-label">API reference</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="apireference" name="apireference" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="apisecret" class="col-sm-3 control-label">API Secret</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="apisecret" name="apisecret" required>
                    </div>
                </div>
            </form>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
        </div>
            </div>
    </div>
</div>
