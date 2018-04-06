<html>
    <head>
        <title>TruckersMP Status</title>

        <!-- Main CSS Files -->
        <link href="fontawesome/css/font-awesome.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/metro-bootstrap.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/jquery.dataTables.min.css" rel="stylesheet">
        
        <!-- Custom Style CSS -->
        <link href="css/customstyles.css" rel="stylesheet">
        
        <!-- Favicons Shortcut Icons -->
        <link rel="icon" type="image/png" href="truckersmp-icon.png"/>
        <link rel="shortcut icon" href="img/truckersmp-icon.png" type="image/png">
        <link rel="apple-touch-icon" href="img/TruckersMP-Square.png">
        <link rel="apple-touch-icon-precomposed" href="img/TruckersMP-Square.png">
        
        <!-- Meta Tags -->
        <meta name="viewport" content="initial-scale=1">
        <meta property="og:title" content="TruckersMP Status"/>
        <meta property="og:type" content="website"/>
        <meta property="og:site_name" content="TruckersMP Status"/>
        <meta property="og:image" content="https://api.sgtbreadstick.tk/img/TruckersMP-Square.png">
        <meta property="og:description" content="TruckersMP Status v2.0.1"/>
        <meta name="author" content="SgtBreadStick">
        <meta name="description" content="TruckersMP Status v2.0.1">
        
    </head>
    <body>
        <br>
        <div class="container-fluid">
            <strong>
                <h1>TruckersMP Status</h1>
            </strong><hr>
            <div class="row">
                <?php
            
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, "https://api.sgtbreadstick.tk/");
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_TIMEOUT, 1);
                curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 1);
                $servers = json_decode(curl_exec($curl), true);
                
                    foreach($servers['response'] as $serv){
                        if($serv['online']){
                            $status = '<strong><font color="green">Online</font></strong>';
                        } else {
                            $status = '<strong><font color="red">Offline</font></strong>';
                        }
                        
                        if($serv['speedlimiter']){
                            $speedlimiter = '<font color="green">110KM/H</font>';
                        } else {
                            $speedlimiter = '<font color="red">150KM/H</font>';
                        }
                        
                        if($serv['collisions']){
                            $collisions = '<font color="green">Enabled</font>';
                        } else {
                            $collisions = '<font color="red">Disabled</font>';
                        }
            
                        if($serv['policecarsforplayers']){
                            $police = '<hr><i class="fa fa-car fa-3x" aria-hidden="true"></i><p class="text">Police For Players: <strong><font color="blue">Enabled</font></strong></p>';
                        } else {
                            $police = '';
                        }
                        
                        
                        echo '
                                <div class="col-lg-4">
                                <div class="panel panel-default">
                                  <div class="panel-heading">
                                    <h3 class="panel-title">'. $serv['name'] . ' - ' . $serv['game'] .'</h3>
                                  </div>
                                  <div class="panel-body" style="box-sizing: border-box; border: 10px solid #f2f2f2;">
                                    <i class="fa fa-users fa-3x fa-fw" aria-hidden="true"></i><p class="text">Players: <strong>'. $serv['players'] .'</strong></big><small> / '. $serv['maxplayers'] .'</strong></small></p><hr>
                                    <i class="fa fa-user-o fa-3x fa-fw" aria-hidden="true"></i><p class="text">Queue: <strong>'. $serv['queue'] .'</strong></p><hr>
                                    <i class="fa fa-server fa-3x fa-fw" aria-hidden="true"></i><p class="text">Server Status: <strong>'. $status .'</strong></p><hr>
                                    <i class="fa fa-times fa-3x fa-fw" aria-hidden="true"></i><p class="text">Collisions: <strong>'. $collisions .'</strong></p><hr>
                                    <i class="fa fa-tachometer fa-3x fa-fw" aria-hidden="true"></i><p class="text">Speedlimiter: <strong>'. $speedlimiter .'</strong></p>
                                    '. $police .'
                                  </div>
                                </div>
                                </div>
                            ';
                    } 
                ?>
            </div>
        </div>
        
        <!--Author Section-->
        <br><center><a href="https://github.com/SgtBreadStick" class="w" target="_blank">Developed By SgtBreadStick</a></center>
        <center><p style="font-size: 0.75em;">Ver v2.0.1</p></center>
        <br><br>
        
        <!-- Javascript -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/holder.js"></script>
        <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="js/dataTables.min.js"></script>
        <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
    </body>
</html>