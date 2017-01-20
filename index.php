<!-- UŻYWAĆ DUŻO PANELI, WELLS -->
<?php
    session_start();
    require  $_SERVER['DOCUMENT_ROOT']."/php/dbClass.php";
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
        <script type="text/javascript" src="/js/textCheck.js"></script>
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
                        <li class="active"><a href="index.html">Strona główna</a></li>
                        <li><a style="display: inline-block; width: calc(100% - 30px);" href="/kategorie.php?">Produkty</a><a style="display: inline-block; width: 30px;" href="#product-categories" data-toggle="collapse"><span style="margin-top: 10px; margin-bottom: 10px;"class="caret"></span></a></li>
                        <div id="product-categories" class="panel-collapse collapse">
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
                        <li><a href="#contact">Kontakt</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-9">
                <!-- CONTACT -->
                <div class="jumbotron" id="about">
                    <h1>O nas</h1>
                    <p>

                    </p>
                </div>
                <!-- CONTACT -->
                <div class="jumbotron" id="contact">
                    <h1>Napisz do nas!</h1>
                    <form class="form-horizontal" method="post" action="/php/mailProcess.php" onsubmit="return checkMessage(this);">
                        <div class="form-group" id="personalDetails">
                            <label class="col-sm-2 control-label" for="personalDetails">Twoje imie i nazwisko: </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="personalDetails">
                                <span id="personalDetailsGlyph"></span>
                            </div>
                        </div>
                        <div class="form-group" id="email">
                            <label class="col-sm-2 control-label" for="email">Email: </label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email">
                                <span  id="emailGlyph"></span>
                            </div>
                        </div>
                        <div class="form-group" id="message">
                            <label class="col-sm-2 control-label" for="message">Twoja wiadomość: </label>
                            <div class="col-sm-10">
                                <textarea style="height: 100px; max-width: 100%;" class="form-control" name="message"></textarea>
                            </div>
                        </div>
                        <?php
                        if(isset($_SESSION['messageInfo']) && isset($_SESSION['messageSent'])){
                            echo "<p class='alert alert-success col-sm-10 col-sm-offset-2'>Wiadomość wysłana</p>";
                            $_SESSION['messageInfo'] = null;
                        }
                    ?>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input class="btn btn-danger" type="submit" name="submit" value="Wyślij">
                                </div>
                            </div>
                    </form>
                    <script type="text/javascript">
                    function checkMessage(form) {
                        if (form.personalDetails.value == "") {
                            $("#personalDetails").removeClass("has-success has-feedback");
                            $("#personalDetails").addClass("has-error has-feedback");
                            $("#personalDetailsGlyph").removeClass();
                            $("#personalDetailsGlyph").addClass("glyphicon glyphicon-remove form-control-feedback");
                        }else{
                            $("#personalDetails").removeClass("has-error has-feedback");
                            $("#personalDetails").addClass("has-success has-feedback");
                            $("#personalDetailsGlyph").removeClass();
                            $("#personalDetailsGlyph").addClass("glyphicon glyphicon-ok form-control-feedback");
                        }
                        if (form.email.value == "") {
                            $("#email").removeClass("has-success has-feedback");
                            $("#email").addClass("has-error has-feedback");
                            $("#emailGlyph").removeClass();
                            $("#emailGlyph").addClass("glyphicon glyphicon-remove form-control-feedback");
                        }else{
                            $("#email").removeClass("has-error has-feedback");
                            $("#email").addClass("has-success has-feedback");
                            $("#emailGlyph").removeClass();
                            $("#emailGlyph").addClass("glyphicon glyphicon-ok form-control-feedback");
                        }
                        if (form.message.value == "") {
                            $("#message").removeClass("has-success has-feedback");
                            $("#message").addClass("has-error has-feedback");
                        }else{
                            $("#message").removeClass("has-error has-feedback");
                            $("#message").addClass("has-success has-feedback");
                        }
                        console.log(form.email.value+form.message.value+form.personalDetails.value);
                        if(!form.email.value || !form.message.value || !form.personalDetails.value)
                            return false;
                        else return true;
                    }
                    </script>
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
