<html>
    <head>
        <title>TruckersMP Status</title>

        <!-- Main CSS Files -->
        <link href="css/main.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/4.0.2/bootstrap-material-design.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">

        <!-- Favicons Shortcut Icons -->
        <link rel="icon" type="image/png" href="img/truckersmp-icon.png"/>
        <link rel="shortcut icon" href="img/truckersmp-icon.png" type="image/png">
        <link rel="apple-touch-icon" href="img/TruckersMP-Square.png">
        <link rel="apple-touch-icon-precomposed" href="img/TruckersMP-Square.png">
        
        <!-- Meta Tags -->
        <meta name="viewport" content="initial-scale=1">
        <meta property="og:title" content="TruckersMP Status"/>
        <meta property="og:type" content="website"/>
        <meta property="og:site_name" content="TruckersMP Status"/>
        <meta property="og:image" content="https://api.sgtbreadstick.uk/img/TruckersMP-Square.png">
        <meta property="og:description" content="TruckersMP Status v2.1"/>
        <meta name="author" content="SgtBreadStick">
        <meta name="description" content="TruckersMP Status v2.1">
        
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
                curl_setopt($curl, CURLOPT_URL, "https://api.sgtbreadstick.uk/");
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
                            $police = '<hr><i class="fas fa-taxi fa-fw" aria-hidden="true"></i><p class="text">Police For Players: <strong><font color="blue">Enabled</font></strong></p>';
                        } else {
                            $police = '';
                        }
                        
                        
                        echo '
                                <div class="col-xl-4">
                                    <div class="card">
                                        <div class="card-header primary-color white-text">
                                            '. $serv['name'] . ' - ' . $serv['game'] .'
                                        </div>
                                        <div class="card-body">
                                        
                                            <i class="fas fa-users fa-fw" aria-hidden="true"></i><p class="text">Players: <strong>'. $serv['players'] .'</strong></big><small> / '. $serv['maxplayers'] .'</strong></small></p><hr>
                                            <i class="fas fa-user fa-fw" aria-hidden="true"></i><p class="text">Queue: <strong>'. $serv['queue'] .'</strong></p><hr>
                                            <i class="fas fa-server fa-fw" aria-hidden="true"></i><p class="text">Server Status: <strong>'. $status .'</strong></p><hr>
                                            <i class="fas fa-times-circle fa-fw" aria-hidden="true"></i><p class="text">Collisions: <strong>'. $collisions .'</strong></p><hr>
                                            <i class="fas fa-tachometer-alt fa-fw" aria-hidden="true"></i><p class="text">Speedlimiter: <strong>'. $speedlimiter .'</strong></p>
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
        <br><center><a href="https://github.com/SgtBreadStick" class="author" target="_blank">Developed By SgtBreadStick</a></center>
        <center><p style="font-size: 0.75em;">Ver v2.1</p></center>
        <br><br>
        
        <!-- Javascript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.9.4/holder.js"></script>
    </body>
</html>
