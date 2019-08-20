<?php

/* session init */
session_start();
/* ------------------------------------------
* check if the user is logged in
* ------------------------------------------*/
if ( isset($_SESSION["name_user"]) ) {
    $lnameUser = $_SESSION["name_user"]; $lLoginAccount = true;
} else { header('Location: ../php/logoff.php'); }

/* ------------------------------------------
 * Constants used in application
 * ------------------------------------------ */
require_once ('../includes/constants.php');

/* ------------------------------------------------------
 * INCLUDE CLASS DEFINITION PRIOR TO INITIALIZING SESSION
 * ------------------------------------------------------ */
require_once (__ROOT__.'/php/insert-html.php');

/* ------------------------------------------
* timeout for logoff
* define time in php/constants.php
* ------------------------------------------*/
if ( isset($_SESSION["time_for_logoff"]) ) {
    if ( $_SESSION["time_for_logoff"] < time() ) {
        header('Location: ../php/logoff.php');
    } else {
        $_SESSION["time_for_logoff"] = time() + $TIME_SESSION;
    }
}

if ( isset($_SESSION["alter-img"]) ) {
    $msg = $_SESSION["alter-img"];
    echo "
    <script>
    window.onload = function(){
        UIkit.modal.dialog(\"<p class='uk-modal-body' style='color: #666'>$msg</p>\");
    }
    </script>
    ";
    unset($_SESSION["alter-img"]);
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="../img/svg/ghost.svg" />
	<link rel="stylesheet" type="text/css" href="../css/uikit.css">
    <link rel="stylesheet"  type="text/css" href="main.css"/>
    <link href="https://fonts.googleapis.com/css?family=Handlee&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
    <title>Dashboard - Fsociety</title>
    <style>
        .uk-tab > .uk-active > a {
            color: white;
            border-color: #1e87f0;
        }
        .uk-card-default {
            background: transparent;
        }
    </style>
</head>
<body style="background-color: #1b203d !important; font-family:Nunito ">

    <header id="top-head" class="uk-position-fixed" style="background-color: #1b203d;">
        <div class="nav" data-uk-sticky="cls-active: fs-color-blue-tree; top: 100vh; animation: uk-animation-slide-top">
			<div class="uk-container">
				<nav class="uk-navbar uk-navbar-container uk-navbar-transparent" data-uk-navbar style="margin-top: 20px;">
					<div class="uk-navbar-left">
						<div class="uk-navbar-item uk-padding-remove-horizontal" style="margin-top: 3px;">
							<a class="uk-logo" title="Logo" href=""><span class="" style="font-size: 33px; font-family: Handlee; color: white">Dashboard</span></a>
						</div>
					</div>
					<div class="uk-navbar-right">
						<ul class="uk-navbar-nav uk-visible@s">
							<li><a href="../" uk-tooltip="Voltar"><span class="fs-color-blue fs-navbar-text fs-link-hover" ><span uk-icon="reply"></span></a></li>
							<li><a href="../php/logoff.php"  uk-tooltip="Sair"><span class="fs-color-blue fs-navbar-text fs-link-hover"><span uk-icon="sign-in"></span></a></li>
							<li><a href=""><span class="fs-color-blue fs-navbar-text fs-link-hover"><span uk-icon="cog"></span></span></a></li>
							<li><a href="#modal-edit-pictures" data-uk-toggle><img src="../img/profile/<?php echo $_SESSION["img_profile"]; ?>" width="40" height="40" uk-svg></a></li>
						</ul>
						<a class="uk-navbar-toggle uk-navbar-item uk-hidden@s" data-uk-toggle data-uk-navbar-toggle-icon href="#menu-nav"></a>
					</div>
				</nav>
			</div>
		</div>
    </header>

    <aside id="left-col" class="uk-light uk-visible@m">
        <div class="left-logo uk-flex uk-flex-middle" style="padding-bottom: 100px; margin-top: 36px; margin-left: 30px;">
            <a class="uk-logo" title="Logo" href=""><span class="" style="font-size: 28px; font-family: Handlee; color: white; ">Fsociety</span></a>
        </div>
        <div class="left-content-box  ">
            
        </div>
        
        <div class="left-nav-wrap">
            <ul class="uk-nav uk-nav-default uk-nav-parent-icon" data-uk-nav>
                <li class="uk-nav-header" ><span style="font-family: Handlee">main</span></li>
                <li><a href="#"><span data-uk-icon="icon: comments" class="uk-margin-small-right"></span style="color: white;">Messages</a></li>
                <li><a href="#"><span data-uk-icon="icon: users" class="uk-margin-small-right"></span>Friends</a></li>
                <li><a href="#"><span data-uk-icon="icon: lifesaver" class="uk-margin-small-right"></span>Tips</a></li>
                <li class="uk-parent">
                    <a href="#"><span data-uk-icon="icon: comments" class="uk-margin-small-right"></span>Reports</a>
                    <ul class="uk-nav-sub">
                        <li><a href="#">Sub item</a></li>
                        <li><a href="#">Sub item</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="uk-nav uk-nav-default uk-nav-parent-icon" data-uk-nav>
                <li class="uk-nav-header"><span style="font-family: Handlee">challenges</span></li>
                <li class="uk-parent"><a href="#"><span data-uk-icon="icon: thumbnails" class="uk-margin-small-right"></span>Templates</a>
                    <ul class="uk-nav-sub">
                        <li><a title="Article" href="https://zzseba78.github.io/Kick-Off/article.html">Article</a></li>
                        <li><a title="Album" href="https://zzseba78.github.io/Kick-Off/album.html">Album</a></li>
                        <li><a title="Article" href="https://zzseba78.github.io/Kick-Off/article.html">Article</a></li>
                        <li><a title="Album" href="https://zzseba78.github.io/Kick-Off/album.html">Album</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>

    <div id="content" data-uk-height-viewport="expand: true">
        <div class="uk-container uk-container-expand" style="background-color: #1b203d;">
            <div  style="margin-top: 60px;">
                <ul uk-tab>
                    <li><a href="#" id="item1">Insígnias</a></li>
                    <li><a href="#">Item</a></li>
                    <li><a href="#">Item</a></li>
                </ul>

                <ul class="uk-switcher uk-margin">
                    <li>
                    <ul class='uk-child-width-1-2 uk-child-width-1-6@s' uk-sortable='handle: .uk-card' uk-grid uk-scrollspy='cls: uk-animation-fade; target: .uk-card; delay: 200; repeat: false'>
                        <?php echo ConsultFlag($_SESSION["name_user"]); ?>
                    </ul>
                    </li>
                    <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                    <li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur, sed do eiusmod.</li>
                </ul>
                            
            </div>
            <footer class="uk-section uk-section-small uk-text-center">
                
            </footer>
        </div>
    </div>

    <div id="menu-nav" data-uk-offcanvas="flip: true; overlay: false">
        <div class="uk-offcanvas-bar uk-offcanvas-bar-animation uk-offcanvas-slide">
            <button class="uk-offcanvas-close uk-close uk-icon" type="button" data-uk-close></button>
            <ul class="uk-nav uk-nav-default">
                <ul class="uk-nav uk-nav-default uk-nav-parent-icon" data-uk-nav>
                    <li class="uk-nav-header" ><span style="font-family: Handlee">main</span></li>
                    <li><a href="#"><span data-uk-icon="icon: comments" class="uk-margin-small-right"></span style="color: white;">Messages</a></li>
                    <li><a href="#"><span data-uk-icon="icon: users" class="uk-margin-small-right"></span>Friends</a></li>
                    <li><a href="#"><span data-uk-icon="icon: lifesaver" class="uk-margin-small-right"></span>Tips</a></li>
                    <li class="uk-parent">
                        <a href="#"><span data-uk-icon="icon: comments" class="uk-margin-small-right"></span>Reports</a>
                        <ul class="uk-nav-sub">
                            <li><a href="#">Sub item</a></li>
                            <li><a href="#">Sub item</a></li>
                        </ul>
                    </li>
                </ul>
                <li class="uk-nav-header">CHALLENGES</li>
                <ul class="uk-nav uk-nav-default uk-nav-parent-icon" data-uk-nav>
                    <li class="uk-parent"><a href="#"><span data-uk-icon="icon: thumbnails" class="uk-margin-small-right"></span>Templates</a>
                        <ul class="uk-nav-sub">
                            <li><a title="Article" href="https://zzseba78.github.io/Kick-Off/article.html">Article</a></li>
                            <li><a title="Album" href="https://zzseba78.github.io/Kick-Off/album.html">Album</a></li>
                            <li><a title="Article" href="https://zzseba78.github.io/Kick-Off/article.html">Article</a></li>
                            <li><a title="Album" href="https://zzseba78.github.io/Kick-Off/album.html">Album</a></li>
                        </ul>
                    </li>
                </ul>
            </ul>

        </div>
    </div>

    <div id="modal-edit-pictures" class="uk-flex-top" uk-modal>
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

            <button class="uk-modal-close-default" type="button" uk-close></button>
            <form action="../php/alter-picture.php" method="POST">
                <div class="uk-height-large">
                    <div class="js-wrapper">
                
                        <h3>Alterar imagem de perfil</h3>
                
                        <div uk-overflow-auto="selContainer: .uk-height-large; selContent: .js-wrapper">
                            <div class="uk-grid-small" uk-grid>
                                <div class="uk-width-1-3" ><label><img src="../img/profile/superhero.svg" width="200px" height="200px" alt=""><input class="uk-checkbox" type="radio" name="img"  value="superhero.svg" checked style="margin-top: 5px;"></label></div>
                                <div class="uk-width-1-3" ><label><img src="../img/profile/superhero(1).svg" width="200px" height="200px" alt=""><input class="uk-checkbox" type="radio" name="img" value="superhero(1).svg" style="margin-top: 5px;"></label></div>
                                <div class="uk-width-1-3" ><label><img src="../img/profile/superhero(2).svg" width="200px" height="200px" alt=""><input class="uk-checkbox" type="radio" name="img" value="superhero(2).svg" style="margin-top: 5px;"></label></div>
                                <div class="uk-width-1-3" ><label><img src="../img/profile/superhero(3).svg" width="200px" height="200px" alt=""><input class="uk-checkbox" type="radio" name="img" value="superhero(3).svg" style="margin-top: 5px;"></label></div>
                                <div class="uk-width-1-3" ><label><img src="../img/profile/superhero(4).svg" width="200px" height="200px" alt=""><input class="uk-checkbox" type="radio" name="img" value="superhero(4).svg" style="margin-top: 5px;"></label></div>
                                <div class="uk-width-1-3" ><label><img src="../img/profile/superhero(5).svg" width="200px" height="200px" alt=""><input class="uk-checkbox" type="radio" name="img" value="superhero(5).svg" style="margin-top: 5px;"></label></div>
                                <div class="uk-width-1-3" ><label><img src="../img/profile/superhero(6).svg" width="200px" height="200px" alt=""><input class="uk-checkbox" type="radio" name="img" value="superhero(6).svg" style="margin-top: 5px;"></label></div>
                                <div class="uk-width-1-3" ><label><img src="../img/profile/superhero(7).svg" width="200px" height="200px" alt=""><input class="uk-checkbox" type="radio" name="img" value="superhero(7).svg" style="margin-top: 5px;"></label></div>
                                <div class="uk-width-1-3" ><label><img src="../img/profile/superhero(8).svg" width="200px" height="200px" alt=""><input class="uk-checkbox" type="radio" name="img" value="superhero(8).svg" style="margin-top: 5px;"></label></div>
                                <div class="uk-width-1-3" ><label><img src="../img/profile/superhero(9).svg" width="200px" height="200px" alt=""><input class="uk-checkbox" type="radio" name="img" value="superhero(9).svg" style="margin-top: 5px;"></label></div>
                                <div class="uk-width-1-3" ><label><img src="../img/profile/superhero(10).svg" width="200px" height="200px" alt=""><input class="uk-checkbox" type="radio" name="img" value="superhero(10).svg" style="margin-top: 5px;"></label></div>
                                <div class="uk-width-1-3" ><label><img src="../img/profile/superhero(11).svg" width="200px" height="200px" alt=""><input class="uk-checkbox" type="radio" name="img" value="superhero(11).svg" style="margin-top: 5px;"></label></div>
                                <div class="uk-width-1-3" ><label><img src="../img/profile/superhero(12).svg" width="200px" height="200px" alt=""><input class="uk-checkbox" type="radio" name="img" value="superhero(12).svg" style="margin-top: 5px;"></label></div>
                                <div class="uk-width-1-3" ><label><img src="../img/profile/superhero(13).svg" width="200px" height="200px" alt=""><input class="uk-checkbox" type="radio" name="img" value="superhero(13).svg" style="margin-top: 5px;"></label></div>
                                <div class="uk-width-1-3" ><label><img src="../img/profile/superhero(14).svg" width="200px" height="200px" alt=""><input class="uk-checkbox" type="radio" name="img" value="superhero(14).svg" style="margin-top: 5px;"></label></div>
                                <div class="uk-width-1-3" ><label><img src="../img/profile/superhero(15).svg" width="200px" height="200px" alt=""><input class="uk-checkbox" type="radio" name="img" value="superhero(15).svg" style="margin-top: 5px;"></label></div>
                            </div>
                        </div>
                        <button type="submit" class="uk-button uk-button-primary" style="margin-top: 15px;">Alterar</button>
                
                    </div>
                </div>
            </form>
        </div>
	</div>

    <script src="../js/uikit.js"></script>
	<script src="../js/uikit-icons.js"></script>
</body>
</html>