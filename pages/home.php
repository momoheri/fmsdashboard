<?php include '../includes/session.php'; ?>
<?php include '../includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php
            include '../includes/navbar.php';
            include '../includes/menubar.php';
            include '../class/masterdata.php';
        ?>

        <div class="content-wrapper">
            <section class="content-header">
                <h1>Dashboard</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <section class="content">
                <?php
                    if(isset($_SESSION['error'])){
                      echo "
                        <div class='alert alert-danger alert-dismissible'>
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
                          <h4><i class='icon fa fa-check'></i> Success!</h4>
                          ".$_SESSION['success']."
                        </div>
                      ";
                      unset($_SESSION['success']);
                    }


                  ?>
                  
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Tank Level</h3>
                                <div class="box-tools pull-right">
                                    <form class="form-inline">

                                    </form>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="chart">
                                    <br>
                                    <div id="legend" class="text-center"></div>
                                    <canvas id="barChart" style="height:350px"></canvas>
                                </div>
                                <div class="FontSmaller">
                                    <p class="font-light Italic">#Last Update 2018-06-06 14:28:20</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <?php include '../includes/footer.php'; ?>
    </div>
    <?php
        $sql = "SELECT * FROM ms_tanks ORDER BY tankID ASC";
        $query = mysql_query($sql);
        $sql2 = mysql_query("SELECT Volume FROM ms_tanks ORDER BY tankID ASC");

    ?>

    <?php include '../includes/scripts.php'; ?>
    <script>
    var ctx = document.getElementById("barChart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            //labels: [<?php while ($row = mysql_fetch_array($query)) {echo '"' . $row['TankNumber'] . '",';} ?>],
            labels: ['Tank 1','Tank 2','Tank 3','Tank 4','Tank 5','Tank 6','Tank 7','Tank 8','Tank 9','Tank 10','Tank 11'],
            datasets: [{
                    //data: [<?php while ($b = mysql_fetch_array($sql2)) {echo '"' . $b['Volume'] . '",';} ?>],
                    data: ['4890','3675','5890','2467','7869','5679','2567','2567','4257','3789','9456'],
                    backgroundColor: [
                        'rgba(51,0,255,0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(204,0,255,0.2)',
                        'rgba(255,51,102,0.2)',
                        'rgba(0,204,102,0.2)'
                    ],
                    borderColor: [],
                    borderWidth: 1
            }]
        },
                options: {
                legend: false,
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                        }]
                    }
                }
    });
    </script>
</body>
</html>
