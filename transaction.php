<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'class/cTransactions.php'; ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function(){
     $('#apiurl').val("https://fmtdata.com/API/api.php");
    
    var reqTransaction =
            {
                jsonrpc: "2.0",
                method: "Transactions:Read",
                parameters: {
                    clientReference: $('#apikey').val(),
                    clientSecret: $('#apisecret').val(),
                    period: {
                        type: "recurring",
                        value: "Current Month"
                    },
                    columns: [
                        "Date","Time","Volume","Unit","Pump","Job","User Data","Type"
                    ]
                },
                id: "123"
            }
            jsonreq = JSON.stringify(reqTransaction,null,4);
            setInterval(getData,10000);
            
            function getData(){
                
            }
                try{
                    req = JSON.parse(jsonreq);
                }
                catch (ex){
                    alert("Error sync data"+ req);
                    return;
                }
                req.parameters.clientReference = $('#apikey').val();
                req.parameters.clientSecret = $('#apisecret').val();
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    data: JSON.stringify(req),
                    url: $('#apiurl').val(),
                    crossDomain: true
                })
                        .done(function(data) {
                            result = JSON.stringify(data, null, 4);
                            var response = {"result": result};
                            $.ajax({
                                type: 'POST',
                                dataType: 'json',
                                url: 'cTransactions.php',
                                data: response,
                                success: function (data){
                                    alert("Success get data"+ data);
                                }
                            });
                        })
            
});
</script>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        
        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>
        
        <div class="content-wrapper">
            <div class="form-group" style="display:none;">
            <label class="sr-only" for="apikey">API URL</label>
            <input id="apiurl" type="text" class="form-control col-sm-4" placeholder="enter API URL" value="https://fmtdata.com/API/api.php" />
        </div>
        <div class="form-group" style="display:none;">
            <label class="sr-only" for="apikey">API Reference</label>
            <input id="apikey" type="text" class="form-control col-sm-4" value="PTYerryP1567" />
        </div>
        <div class="form-group" style="display:none;">
            <label class="sr-only" for="apisecret">API Secret</label>
            <input id="apisecret" type="text" class="form-control col-sm-4" value="529163fb24688da3" />
        </div>
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
