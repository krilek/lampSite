<?php
    session_start();
    require $_SERVER['DOCUMENT_ROOT']."/php/dbClass.php";
    require $_SERVER['DOCUMENT_ROOT']."/php/pageCalc.php";

?>
    <!DOCTYPE html>
    <html lang="pl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script>
        var currentPage;
        var currentCategory;
        var currentSearch;
        /*function choosePage(page) {
            var pageNr = page.innerHTML;
            var searchVal = $("#search").val();
            if(searchVal != "")
                var destination = '/php/searchProduct.php';
            else
                var destination = '/php/listOfProducts.php';
            if(pageNr != currentPage){
                $.ajax({
                    type: "GET",
                    url: destination,
                    data: {
                        p: pageNr,
                        search: searchVal
                    },
                    success: function(html) {
                        var end = html.indexOf("$$");
                        //console.log(html);
                             currentPage = pageNr;
                            $("#products").fadeOut(null, function() {
                                $("#products").html(html.slice(end+2));
                            });
                            $("#products").fadeIn(100);
                            $('html, body').animate({
                                scrollTop: 0,
                                scrollLeft: 0,
                            }, 500);
                        }

                });
            }else{
                console.log("TEST");
            }
        }*/
        function listCategory(){
            var link = window.location.href;
            if(link.indexOf("cat=") > 0){
                var location = link.indexOf("cat=") + 4;
                var categoryNr = "";
                for(i=location; i<link.length; i++){
                    if(isNaN(parseInt(link.charAt(i))))
                        break;
                    else
                        categoryNr += link.charAt(i);
                }
            }
            $.ajax({
                type: "GET",
                url: '/php/listOfProducts.php',
                data: {
                    cat: categoryNr 
                },
                success: function(html) {
                    //GET AMOUNT OF PRODUCTS
                            // var end = html.indexOf("$$");
                            // window.amountOfProducts = html.slice(0,end);
                            console.log(html);
                            var test = JSON.parse(html);
                            console.log(test);
                            /*$.ajax({
                                type: "GET",
                                url: '/php/pageCalc.php',
                                data: {
                                    productsAmount: parseInt(window.amountOfProducts)
                                },
                                success: function(pages) {
                                    console.log(pages);
                                    //var test = JSON.parse(pages);
                                    //console.log(pages);
                                    //$(".pagination").html(pages);
                                }
                            });*/
                        //END
                    /*$("#products").fadeOut(null, function() {
                        $("#products").html(html.slice(end+2));
                    });
                    $("#products").fadeIn(100);
                    $('html, body').animate({
                        scrollTop: 0,
                        scrollLeft: 0,
                    }, 500);*/
                }

            });
        }
        /*function search() {
            var searchVal = $("#search").val();
            var amountOfProducts = 0;
            if(searchVal != "" && searchVal != currentSearch){
                $.ajax({
                    type: "GET",
                    url: '/php/searchProduct.php',
                    data: {
                        search: searchVal
                    },
                    success: function(html) {
                        currentSearch = searchVal;
                        //GET AMOUNT OF PRODUCTS
                            var end = html.indexOf("$$");
                            window.amountOfProducts = html.slice(0,end);
                            $.ajax({
                                type: "GET",
                                url: '/php/pageCalc.php',
                                data: {
                                    productsAmount: parseInt(window.amountOfProducts)
                                },
                                success: function(pages) {
                                    console.log(pages);
                                    $(".pagination").html(pages);
                                }
                            });
                        //END

                        $("#title").fadeOut(100);
                        $("#products").fadeOut(null, function() {
                            
                            if(html.slice(end+2) != ""){
                                $("#products").html(html.slice(end+2));
                            }else{
                                $("#products").html("<h3>Brak wyniku</h3>");
                            }
                        });
                        $("#products").fadeIn(100);
                        $('html, body').animate({
                            scrollTop: 0,
                            scrollLeft: 0,
                        }, 500);
                    }
                });
            }
        }*/

        /*function addToCart(id, title) {
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
        }*/
        </script>
        <style type="text/css">
        button.btn-secondary {
            background-color: transparent;
            border-radius: 0;
        }
        
        button.btn-secondary:hover {
            background-color: #ccc;
        }
        /* 
        .myButton,
        .myButton:focus,
        .myButton:active {
            border: none;
            background-color: transparent;
            outline: none;
        }
        
        .myButton:hover {
            color: #888;
        } */
        </style>
    </head>

    <body onload="listCategory()">
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
                        <!-- <li class="active"><a href="#">Strona główna</a></li>
                        <li><a href="#">Produkty</a></li>
                        <li><a href="#">O firmie</a></li> -->
                        <li><a href="/">Strona główna</a></li>
                        <li class="active"><a style="display: inline-block; width: calc(100% - 30px);" href="/kategorie.php?">Produkty</a><a style="display: inline-block; width: 30px;" href="#product-categoriesTOP" data-toggle="collapse"><span style="margin-top: 10px; margin-bottom: 10px;"class="caret"></span></a></li>
                        <div id="product-categoriesTOP" class="panel-collapse collapse">
                            <ul class="nav nav-pills nav-stacked">
                            <?php
                                $categories = $db->getCategoryList();
                                while ($li = $categories->fetch_assoc()) {
                                    echo "<li><a href=\"/kategorie.php?cat=".$li['id']."\">".$li['category']."</a></li>";
                                }
                            ?>
                            </ul>
                        </div>
                        <li><a href="/">O firmie</a></li>
                        <li><a href="/">Kontakt</a></li>
                        <li><a href="/">Newsletter</a></li>
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
                        <li><a href="/">Strona główna</a></li>
                        <li class="active">
                        <a style="display: inline-block; width: calc(100% - 30px);" href="/kategorie.php?">Produkty</a><a style="display: inline-block; width: 30px;" href="#product-categories" data-toggle="collapse">
                        <span style="margin-top: 10px; margin-bottom: 10px;"class="caret"></span></a>
                        </li>
                        <div id="product-categories" class="panel-collapse collapse">
                            <ul class="nav nav-pills nav-stacked">
                            <?php
                                $cat2 = $db->getCategoryList();
                                while ($li = $cat2->fetch_assoc()) {
                                    echo "<li><a href=\"/kategorie.php?cat=".$li['id']."\">".$li['category']."</a></li>";
                                }
                            ?>
                            </ul>
                        </div>
                        <li><a href="/">O firmie</a></li>
                        <li><a href="/">Kontakt</a></li>
                        <li><a href="/">Newsletter</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-9">
                <!-- 
            HEADER
             -->
                <div class="row page-header">
                    <div class="col-xs-6 wrap-text">
                        <div class="row">
                            <h2 id="title">
                            <?php
                                if(isset($_GET['cat'])){
                                    $catId = $_GET['cat'];
                                    $result = $db->getCategoryName($catId);
                                    echo $result->fetch_assoc()['category'];
                                }
                            ?>
                            </h2>
                        </div>
                        <!-- <div class="text-left">
                        
                    </div> -->
                    </div>
                    <div class="col-xs-6">
                        <div class="row">
                            <div class="col-xs-6 hidden-xs hidden-sm hidden-md"></div>
                            <div class="col-xs-6 hidden-xs hidden-sm hidden-md">
                                <h2>
                                <div class="input-group input-group-md">
                                    <input id="search" type="text" class="form-control" placeholder="Szukaj..." style="border-radius: 0;">
                                    <div class="input-group-btn">
                                    <button class="btn btn-secondary" type="button" onclick="search()">
                                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                    </button>
                                    <button class="btn btn-secondary">
                                        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                                    </button>
                                    </div>
                                    
                                </div>
                            </h2>
                            </div>
                            <div class="col-xs-12 visible-xs visible-sm visible-md">
                                <h2>
                                <div class="input-group input-group-md">
                                    <input id="search" type="text" class="form-control" placeholder="Szukaj..." style="border-radius: 0;">
                                    <div class="input-group-btn">
                                    <button class="btn btn-secondary" type="button" onclick="search()">
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
                    </div>
                </div>
                <!-- 
            CONTENT
             -->
                <div id='products'>
                    <?php
                        //require $_SERVER['DOCUMENT_ROOT']."/php/listOfProducts.php";
                    ?>
                </div>
                <!-- 
            PAGER
             -->
                <div class="row page-header">
                    <div class="col-sm-12 text-center">
                        <ul class="pagination pagination-lg">
                            <?php
                                //calcPager();
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
