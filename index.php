<?php
session_start();
?>
<html ng-app="mboutiqueApp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" >
    <title ng-bind="title">Title</title>
    <!-- Roboto  Font -->
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css' rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <?php
    function holiday_date_check() {
        $current_date = date("m/d");
        $holidays = [
            '01/01' => 'css/newyear.css',
            '07/04' => 'css/july4th.css',
            '12/25' => 'css/christmas.css'
        ];
        $current_css = null;
        if(!empty($holidays[$current_date])){
            $extra_css_link = "<link href ='{$holidays[$current_date]}' rel='stylesheet' type='text/css'>";
        } else{
            $extra_css_link = '';
        }
        print($extra_css_link);
    }
    holiday_date_check();
    ?>
</head>
<body>
    <!--Begin Navigation Bar-->
    <nav id = 'navbar' class = "navbar navbar-default" ng-controller="mainController">
    <div class = 'container-fluid'>
        <div class = 'navbar-header'>
            <button class = "navbar-toggle collapsed mdl-badge mdl-badge--overlap" data-toggle = "collapse" data-badge="{{ cart }}" data-target = "#navbar-collapse" ng-init="asisCollapsed = true" ng-click="isCollapsed = !isCollapsed">
                <span class = "icon-bar"></span>
                <span class = "icon-bar"></span>
                <span class = "icon-bar"></span>
            </button>
            <a class = 'navbar-brand' id = 'brand'> <img id = "logo-image" src = "./assets/images/logo.png"></a>
        </div>
        <div class="navbar-collapse" ng-class="{collapse: isCollapsed}" id="navbar-collapse">
            <ul class = 'nav navbar-nav navbar-right'>
              <li><a class="n_link" href="#welcome" ng-click="collapse()">WELCOME</a></li>
              <li><a class="n_link" href="#macarons" ng-click="collapse()">OUR MACARONS</a></li>
              <li><a class="n_link" href="#gifts" ng-click="collapse()">GIFTS &amp; PARTIES</a></li>
              <li><a class="n_link" href="#contact" ng-click="collapse()">CONTACT</a></li>
              <li><a class="n_link mdl-badge mdl-badge--overlap nav-badge" data-badge=" {{ cart }}" href="#cart" ng-click="collapse()">CART</a></li>
            </ul>
      </div>
    </nav>

    <!--ng-view -->
    <div id="content">
        <div ng-view autoscroll="true"></div>
    </div>

    <footer class = "col-sm-12 col-xs-12">
      <div class="col-sm-4 col-xs-12">
        <ul>
          <li><i class="fa fa-phone" aria-hidden="true"></i></li>
          <li><i class="fa fa-envelope" aria-hidden="true"></i></li>
          <li><i class="fa fa-map" aria-hidden="true"></i></li>
        </ul>
      </div>
      <div class="col-sm-4 col-xs-12">
        <p class="copyright">Copyright &copy; 2015 MBoutique. All rights reserved</p>
      </div>
      <div class="col-sm-4 col-xs-12">
        <ul>
          <li><i class="fa fa-facebook" aria-hidden="true"></i></li>
          <li><i class="fa fa-instagram" aria-hidden="true"></i></li>
          <li><i class="fa fa-twitter" aria-hidden="true"></i></li>
          <li><i class="fa fa-pinterest" aria-hidden="true"></i></li>
          <li><i class="fa fa-google" aria-hidden="true"></i></li>
        </ul>
      </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- Angular -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.9/angular.min.js"></script>
    <!-- Angular Routing -->
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-route.min.js"></script>
    <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <!-- Google Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnKuuYMhqpQ5xxbiRhj4YXOzti691JSt4&"></script>
    <!-- Modules -->
    <script src="js/app.js"></script>
    <!-- Services -->
    <script src="js/services/macaronRetrieve.js"></script>
    <!-- Controllers -->
    <script src="js/controllers/dateController.js"></script>
    <script src="js/controllers/cartController.js"></script>
    <script src="js/controllers/contactController.js"></script>
    <script src="js/controllers/partyController.js"></script>
    <script src="js/controllers/shopController.js"></script>
    <!-- Directives -->
    <script src="js/directives/imageBackground.js"></script>
</body>
</html>
