<?php
    session_start();
?>
    <!DOCTYPE html>
    <!-- DAFUQ IS WRONG WITH CSS :/ -->
    <html lang="pl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
        $(document).ready(function() {
            $('[data-toggle="popover"]').popover();
        });

        function expandSearch() {
            var search = $("#search");
            search.css("display") = "block";
            search.animate({
                width: "100px"
            }, "slow");
        }

        function choosePage(page) {
            var pageNr = page.innerHTML;
            $.ajax({
                type: "GET",
                url: '/php/listOfProducts.php',
                data: {
                    p: pageNr
                },
                success: function(html) {
                    //console.log(html);
                    $("#products").fadeOut(null, function() {
                        $("#products").html(html);
                    });
                    $("#products").fadeIn(100);
                    $('html, body').animate({
                        scrollTop: 0,
                        scrollLeft: 0,
                    }, 500);
                }

            });
        }

        function addToCart(id, title) {
            $.ajax({
                type: "POST",
                url: '/php/shoppingCart.php',
                data: {
                    product: id
                },
                success: function(ret) {
                    console.log(title);
                }
            });
        }
        </script>
        <style type="text/css">
        .myButton,
        .myButton:focus,
        .myButton:active {
            border: none;
            background-color: transparent;
            outline: none;
        }
        
        .myButton:hover {
            color: #888;
        }
        
        /* .vcenter {
            display: inline-block;
            vertical-align: middle;
            float: none;
        } */
        </style>
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
                        <li><a style="display: inline-block; width: calc(100% - 30px);" href="/kategorie.php?">Produkty</a><a style="display: inline-block; width: 30px;" href="#product-categories" data-toggle="collapse"><span style="margin-top: 10px; margin-bottom: 10px;"class="caret"></span></a></li>
                        <div id="product-categories" class="panel-collapse collapse">
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="/kategorie.php?cat=1">Kategoria 1</a></li>
                                <li><a href="/kategorie.php?cat=2">Kategoria 2</a></li>
                                <li><a href="/kategorie.php?cat=3">Kategoria 3</a></li>
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
                    <div class="col-xs-6">
                        <div class="row">
                            <h2>Nazwa kategorii</h2>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-6"></div>
                            <div class="col-xs-6">
                            <h2>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Szukaj..." style="border-radius: 0;">
                                    <div class="input-group-btn">
                                    <button class="btn btn-secondary" type="button">
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    </button>
                                    <button class="btn btn-secondary">
                                        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                                    </button>
                                    </div>
                                    
                                </div>
                            </h2>
                            </div>
                        </div>
                        <!-- <div class="row text-right">
                        <div class="btn-group">
                            <button type="button" class="myButton dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <h2><span class="glyphicon glyphicon-search" aria-hidden="true"></span></h2>
                            </button>
                            <button class="myButton">
                                    <h2><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span></h2>
                            </button>
                        </div>
                    </div> -->
                    </div>
                </div>
                <!-- 
            CONTENT
             -->
                <div id='products'>
                    <?php
                    require_once $_SERVER['DOCUMENT_ROOT']."/php/listOfProducts.php";
                ?>
                </div>
                <!-- 
            PAGER
             -->
                <div class="row page-header">
                    <div class="col-sm-12 text-center">
                        <ul class="pagination pagination-lg">
                            <?php
                            calcPager();
                        ?>
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
