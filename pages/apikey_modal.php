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
            <form class="form-horizontal" method="POST" action="../class/apikey_add.php" enctype="multipart/form-data">
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


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
            </form>
        </div>
            </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
  <div class="modal-dialog">
      <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b><span class="idKey"></span></b></h4>
    </div>
    <div class="modal-body">
        <form class="form-horizontal" method="POST" action="../class/apikey_edit.php">
            <input type="hidden" class="idKey"  name="id">
            <div class="form-group">
                <label for="edit_apikey" class="col-sm-3 control-label">API Reference</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="edit_apiKey" name="apikey">
                </div>
            </div>
            <div class="form-group">
                <label for="edit_secretapi" class="col-sm-3 control-label">API Secret</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="edit_secretKey" name="secretKey">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
        </form>
            </div>
    </div>
      </div>
  </div>
</div>
