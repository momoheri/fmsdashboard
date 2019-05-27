<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'class/cTransactions.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>
        
        <div class="content-wrapper">
            <section class="content-header">
                <h1>
                    Transactions
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
                    <li class="active">Transactions</li>
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
                    
                    $list_data= load_transaction();
                    $data_master=$list_data['data'];
                ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <a href="#refresh" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-circle-o"></i>Refresh</a>
                            </div>
                            <div class="box-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                    <th class="hidden"></th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Unit</th>
                                    <th>Pump</th>
                                    <th>Job</th>
                                    <th>User Data</th>
                                    <th>Type</th>
                                    <th>Unit Price</th>
                                    <th>Litres</th>
                                    <th>Total Price</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($data_master as $key => $data) {
                                        ?>
                                        <tr>
                                            <td class="hidden"></td>
                                            <td><?= $data->Date ?></td>
                                            <td><?= $data->Time ?></td>
                                            <td><?= $data->Unit ?></td>
                                            <td><?= $data->Pump ?></td>
                                            <td><?= $data->Job ?></td>
                                            <td><?= $data->UserData ?></td>
                                            <td><?= $data->Type ?></td>
                                            <td><?= $data->UnitPrice ?></td>
                                            <td><?= $data->Litres ?></td>
                                            <td><?= $data->TotalPrice ?></td>
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
    </div>
    <?php include 'includes/scripts.php'; ?>
</body>
</html>
