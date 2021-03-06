<?php
    session_start();
    require("../php/dbManip.php");
    require("../php/getImage.php");
    require("../php/selectFromDB.php");
    selectDB("lampShop");
?>
<!DOCTYPE php>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- NAVBAR TOP for mobiles -->
    <nav class="navbar navbar visible-xs">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" id="mobile-menu-btn" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" id="site-logo">Logo</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Strona główna</a></li>
                    <li><a href="#">Produkty</a></li>
                    <li><a href="#">O firmie</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- MAIN SITE -->
    <div class="container">
        <div class="col-sm-3 sidenav hidden-xs">
            <div class="row">
                <img class="logo-margin img-responsive" src="http://placehold.it/400x200">
                <!-- <h2 class="logo-margin">Logo</h2> -->
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#section1">Strona główna</a></li>
                    <li><a href="#product-categories" data-toggle="collapse">Produkty</a></li>
                    <div id="product-categories" class="panel-collapse collapse">
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#section3">Kategoria 1</a></li>
                            <li><a href="#section4">Kategoria 2</a></li>
                            <li><a href="#section4">Kategoria 3</a></li>
                        </ul>
                    </div>
                    <li><a href="#section3">O firmie</a></li>
                    <li><a href="#section4">Kontakt</a></li>
                    <li><a href="#section5">Newsletter</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-9">
            <!-- 
            HEADER
             -->
            <div class="row page-header">
                <div class="col-xs-6 wrap-text">
                    <div class="text-left">
                        <h2>Nazwa kategorii</h2>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="text-right">
                        <h2>
                            <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                        </h2>
                    </div>
                </div>
            </div>
            <!-- 
            CONTENT
             -->
            <div class="row">
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img src="http://placehold.it/700x400" class="img-responsive">
                        <div class="caption text-center wrap-text">
                            <h4 id="product-title">Przykładowy tytuł!</h4>
                            <div class="btn-group btn-group-vertical btn-block">
                                <a href="#" class="btn btn-default" id="product-value">XXXXXX.00 PLN</a>
                                <a href="#" class="btn btn-danger">Dodaj do koszyka</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img src="http://placehold.it/700x400" class="img-responsive">
                        <div class="caption text-center wrap-text">
                            <h4 id="product-title">Przykładowy tytuł!</h4>
                            <div class="btn-group btn-group-vertical btn-block">
                                <a href="#" class="btn btn-default" id="product-value">XXXXXX.00 PLN</a>
                                <a href="#" class="btn btn-danger">Dodaj do koszyka</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img src="http://placehold.it/700x400" class="img-responsive">
                        <div class="caption text-center wrap-text">
                            <h4 id="product-title">Przykładowy tytuł!</h4>
                            <div class="btn-group btn-group-vertical btn-block">
                                <a href="#" class="btn btn-default" id="product-value">XXXXXX.00 PLN</a>
                                <a href="#" class="btn btn-danger">Dodaj do koszyka</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img src="http://placehold.it/700x400" class="img-responsive">
                        <div class="caption text-center wrap-text">
                            <h4 id="product-title">Przykładowy tytuł!</h4>
                            <div class="btn-group btn-group-vertical btn-block">
                                <a href="#" class="btn btn-default" id="product-value">XXXXXX.00 PLN</a>
                                <a href="#" class="btn btn-danger">Dodaj do koszyka</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img src="http://placehold.it/700x400" class="img-responsive">
                        <div class="caption text-center wrap-text">
                            <h4 id="product-title">Przykładowy tytuł!</h4>
                            <div class="btn-group btn-group-vertical btn-block">
                                <a href="#" class="btn btn-default" id="product-value">XXXXXX.00 PLN</a>
                                <a href="#" class="btn btn-danger">Dodaj do koszyka</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img src="http://placehold.it/700x400" class="img-responsive">
                        <div class="caption text-center wrap-text">
                            <h4 id="product-title">Przykładowy tytuł!</h4>
                            <div class="btn-group btn-group-vertical btn-block">
                                <a href="#" class="btn btn-default" id="product-value">XXXXXX.00 PLN</a>
                                <a href="#" class="btn btn-danger">Dodaj do koszyka</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img src="http://placehold.it/700x400" class="img-responsive">
                        <div class="caption text-center wrap-text">
                            <h4 id="product-title">Przykładowy tytuł!</h4>
                            <div class="btn-group btn-group-vertical btn-block">
                                <a href="#" class="btn btn-default" id="product-value">XXXXXX.00 PLN</a>
                                <a href="#" class="btn btn-danger">Dodaj do koszyka</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img src="http://placehold.it/700x400" class="img-responsive">
                        <div class="caption text-center wrap-text">
                            <h4 id="product-title">Przykładowy tytuł!</h4>
                            <div class="btn-group btn-group-vertical btn-block">
                                <a href="#" class="btn btn-default" id="product-value">XXXXXX.00 PLN</a>
                                <a href="#" class="btn btn-danger">Dodaj do koszyka</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img src="http://placehold.it/700x400" class="img-responsive">
                        <div class="caption text-center wrap-text">
                            <h4 id="product-title">Przykładowy tytuł!</h4>
                            <div class="btn-group btn-group-vertical btn-block">
                                <a href="#" class="btn btn-default" id="product-value">XXXXXX.00 PLN</a>
                                <a href="#" class="btn btn-danger">Dodaj do koszyka</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img src="http://placehold.it/700x400" class="img-responsive">
                        <div class="caption text-center wrap-text">
                            <h4 id="product-title">Przykładowy tytuł!</h4>
                            <div class="btn-group btn-group-vertical btn-block">
                                <a href="#" class="btn btn-default" id="product-value">XXXXXX.00 PLN</a>
                                <a href="#" class="btn btn-danger">Dodaj do koszyka</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img src="http://placehold.it/700x400" class="img-responsive">
                        <div class="caption text-center wrap-text">
                            <h4 id="product-title">Przykładowy tytuł!</h4>
                            <div class="btn-group btn-group-vertical btn-block">
                                <a href="#" class="btn btn-default" id="product-value">XXXXXX.00 PLN</a>
                                <a href="#" class="btn btn-danger">Dodaj do koszyka</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <img src="http://placehold.it/700x400" class="img-responsive">
                        <div class="caption text-center wrap-text">
                            <h4 id="product-title">Przykładowy tytuł!</h4>
                            <div class="btn-group btn-group-vertical btn-block">
                                <a href="#" class="btn btn-default" id="product-value">XXXXXX.00 PLN</a>
                                <a href="#" class="btn btn-danger">Dodaj do koszyka</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 
            PAGER
             -->
            <div class="row page-header">
                <div class="col-sm-12 text-center">
                    <ul class="pagination pagination-lg">
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                    </ul>
                </div>
            </div>
            <!-- ADDITIONAL INFO -->
            <div class="jumbotron" id="info">
                <h1>KOŃCOWE INFO</h1>
                <p><a class="btn btn-danger btn-lg" href="#" role="button">SPRAWDŹ</a></p>
            </div>
        </div>
        <!-- 
            FOOTER
        -->
        <div class="col-sm-12">
            <div id="footer" class="panel text-center">
                <h4>&copy; Karol Gzik <a href="mailto: krilek@gmail.com"><span class="glyphicon glyphicon-envelope"></span></a></h4>
            </div>
        </div>
    </div>
</body>

</html>
