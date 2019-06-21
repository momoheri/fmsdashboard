<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>
        <?php include 'proses.php'; ?>
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    API Key
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li>Configuration</li>
                    <li class="active">API Key</li>
                </ol>
            </section>
            
            <section class="content">
                <?php
                    if(isset($_SESSION['error'])){
                        echo " <div class='alert alert-danger alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-warning'></i> Error!</h4>
                            ".$_SESSION['error']."
                                </div>
                        ";
                        unset($_SESSION['error']);
                    }
                    if(isset($_SESSION['success'])){
                        echo "
                            <div class='alert alert-success alert-dismissible'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa-check'></i> Success</h4>
                            ".$_SESSION['success']."
                                </div>
                        ";
                        unset($_SESSION['success']);
                    }
                    
                    $list_data = load_apikey();
                    $data_master = $list_data['data'];
                ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                    <th>API Reference</th>
                                    <th>API Secret</th>
                                    <th>Tools</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($data_master as $key => $data) {
                                        ?>
                                        <tr>
                                            <td><?= $data->apiKey ?></td>
                                            <td><?= $data->secretKey ?></td>
                                            <td>
                                                <button class="btn btn-success btn-sm edit btn-flat" data-id="<?= $data->idKey ?>"><i class="fa fa-edit"></i>Edit</button>
                                                <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?= $data->idKey ?>"><i class="fa fa-trash"></i> Delete</button>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <?php include 'includes/footer.php'; ?>
        <?php include 'includes/apikey_modal.php'; ?>
    </div>
    <?php include 'includes/scripts.php'; ?>
    <script>
        $(function() {
            $('.edit').click(function(e){
                e.preventDefault();
                $('.edit').modal('show');
                var id = $(this).data('id');
                getRow(id);
            });
            
            $('.delete').click(function(e){
                e.preventDefault();
                $('#delete').modal('show');
                var id = $(this).data('id');
                getRow(id);
              });
        });
        
        function getRow(id){
            $.ajax({
                type:'POST',
                url:'apikey_row.php',
                data: {id:id},
                dataType: 'json',
                success: function(response){
                    $('.idKey').val(response.idKey);
                    $('.apiKey').val(response.apiKey);
                }
            });
        }
    </script>
</body>
