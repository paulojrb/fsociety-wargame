<?php

/* Required for login */
session_start();

/* ------------------------------------------
 * Constants used in application
 * ------------------------------------------ */
require_once ('includes/constants.php');

/* ------------------------------------------------------
 * INCLUDE CLASS DEFINITION PRIOR TO INITIALIZING SESSION
 * ------------------------------------------------------ */
require_once (__ROOT__.'/php/insert-html.php');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="img/svg/ghost.svg" />
	<link rel="stylesheet" type="text/css" href="css/uikit.css">
	<link rel="stylesheet"  type="text/css" href="css/main.css"/>
	<link href="https://fonts.googleapis.com/css?family=Poiret+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Neucha&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Handlee&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
	<title>Wargames - Fsociety</title>
	<style>
		#content {
			background-image: url('./img/mr-robot-illustration.jpg');
		}
	</style>
</head>
<body>
	<div class="top-wrap uk-position-relative uk-light " style="height: 100vh; background-image: url('./img/mr-robot-minimalism.jpg')">
		<div class="nav" data-uk-sticky="cls-active: fs-color-blue-tree; top: 100vh; animation: uk-animation-slide-top">
			<div class="uk-container">
				<nav class="uk-navbar uk-navbar-container uk-navbar-transparent" data-uk-navbar style="border-bottom: 1px solid #01ffff">
					<div class="uk-navbar-left">
						<div class="uk-navbar-item uk-padding-remove-horizontal">
							<a class="uk-logo" title="Logo" href=""><span class="fs-color-blue" style="font-size: 28px; font-family: Handlee;">Fsociety</span></a>
						</div>
					</div>
					<div class="uk-navbar-right">
						<ul class="uk-navbar-nav uk-visible@s">
							<li><a href=""><span class="fs-color-blue fs-navbar-text fs-link-hover" >Home</span></a></li>
							<li><a href="dashboard/"><span class="fs-color-blue fs-navbar-text fs-link-hover">Dashboard</span></a></li>
							<li><a href=""><span class="fs-color-blue fs-navbar-text fs-link-hover">About Us</span></a></li>
							<?php
								
								if ( isset($_SESSION["name_user"]) ) {
									echo ' <li><a href="php/logoff.php" ><span class="fs-color-blue fs-navbar-text fs-link-hover">Sair</span></a></li> ';
								} else {
									echo '<li><a href="login/" target="_blank"><span class="fs-color-blue fs-navbar-text fs-link-hover">Login</span></a></li>';
								}
							?>
							
						</ul>
						<a class="uk-navbar-toggle uk-navbar-item uk-hidden@s" data-uk-toggle data-uk-navbar-toggle-icon href="#offcanvas-nav"></a>
					</div>
				</nav>
			</div>
		</div>
		<div class="uk-cover-container uk-light uk-flex uk-flex-middle top-wrap-height">
			<div class="uk-container uk-flex-auto top-container uk-position-relative uk-margin-medium-top" data-uk-parallax="y: 0,50; easing:0; opacity:0.2" >
				<div class="uk-width-1-2@s" data-uk-scrollspy="cls: uk-animation-slide-right-medium; target: > *; delay: 150">
					<h1 class="uk-margin-remove-top" style="font-family: 'Neucha'; font-weight: 400; font-size: 60px; ">CTF - Wargame fsociety</h1>
					<p class="subtitle-text uk-visible@s" style="color: #01ffff;">O que vou te dizer é segredo. 
						Uma conspiração que vai além de todos nós.
						Há um grupo de pessoas que manda no mundo secretamente... </p>
					<a href="#modal-mais" title="Learn More" class="uk-button uk-button-primary uk-border-pill fs-link-bg-hover" data-uk-scrollspy-class="uk-animation-fade" style="background-color: #03fcfe; color: #0e056e; font-weight: 800; font-family: Nunito" uk-toggle>Leia Mais</a>
					<div style="margin-top: 30px;">
						<ul class="uk-navbar-nav uk-visible@s">
							<li class=" uk-visible@m"><a href="" disabled><span class="fs-color-blue">Follow Us</span></a></li>
							<li class=" uk-visible@m"><a href="" data-uk-icon="github" style="color: #03fcfe; padding-right:0px" class="fs-link-hover"></a></li>
							<li class=" uk-visible@m"><a href="" data-uk-icon="youtube" style="color: #03fcfe; padding-right: 0px;" class="fs-link-hover"></a></li>
							<li class=" uk-visible@m"><a href="" data-uk-icon="linkedin" style="color: #03fcfe; padding-right: 0px;" class="fs-link-hover"></a></li>
							
						</ul>
					</div>
				</div>
			</div>
			<img src=""
			data-sizes="100vw"
			data-src="" alt="" data-uk-cover data-uk-img data-uk-parallax="opacity: 1,0.1; easing:0"
			>
		</div>
		<div class="uk-position-bottom-center uk-position-medium uk-position-z-index uk-text-center">
			<a href="#content" data-uk-scroll="duration: 500" data-uk-icon="icon: arrow-down; ratio: 2" ></a>
		</div>
	</div>
	
	<section id="content" class="uk-cover-container uk-section uk-section-large" style="height: 100vh; border-top: 1px solid #01ffff;border-bottom: 1px solid #01ffff;">
		<div class="uk-container">
			<div class="uk-grid uk-child-width-1-2@l uk-flex-middle"  data-uk-scrollspy="cls: uk-animation-scale-down; target: > *; delay: 200">
				<div>
					<h6 style="color: white;">SIMPLIFY THINGS</h6>
					<h2 class="uk-margin-small-top uk-h1" style="color: white;">Manage all your data from one place only.</h2>
					<p class="subtitle-text" style="color: white;">
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.
					</p>
					<a href="#" class="uk-button uk-button-primary uk-border-pill" data-uk-icon="arrow-right">LEARN MORE</a>
				</div>
				<div data-uk-scrollspy="cls: uk-animation-fade">
					
				</div>
			</div>
		</div>
	</section>
	<section class="uk-cover-container overlay-wrap" style="background-color: #0e056e;height: 100vh;border-bottom: 1px solid #01ffff;">
		<img src="img/mr-robot.jpg"
		data-sizes="100vw"
		data-src="" alt="" data-uk-cover data-uk-img>
		<div class="uk-container uk-position-z-index uk-position-relative uk-section uk-section-xlarge uk-light">
			<div class="uk-grid uk-flex-right">
				
				<div class="uk-width-2-5@m" data-uk-parallax="y: 50,-50; easing: 0; media:@l">
					<h3 style="font-family: 'Poiret One'">Outras áreas</h3>
					<div class="uk-position-relative uk-visible-toggle uk-light" data-uk-slider="easing: cubic-bezier(.16,.75,.47,1)">
						<ul class="uk-slider-items uk-child-width-1-1">
							<li>
								<div data-uk-slider-parallax="opacity: 0.2,1,0.2">
									<h2 class="uk-margin-small-top" style="font-family: 'Poiret One'">"Programação para o kernel Linux. Uma introdução teórica e prática para aqueles que desejam começar nessa área."</h2>
									<p class="uk-text-meta">Requer conhecimento médio na linguagem C</p>
								</div>
							</li>
							<li>
								<div data-uk-slider-parallax="opacity: 0.2,1,0.2">
									<h2 class="uk-margin-small-top" style="font-family: 'Poiret One'">"Engenharia reversa em binários do Windows. Técnicas de debugg e introdução ao formato PE de executáveis."</h2>
									<p class="uk-text-meta">Requer conhecimento em binário, hexadecimal windows</p>
								</div>
							</li>
							<li>
								<div data-uk-slider-parallax="opacity: 0.2,1,0.2">
									<h2 class="uk-margin-small-top" style="font-family: 'Poiret One'">"Criação de bots em PHP. Automatização em exploração de aplicações web com cURL."</h2>
									<p class="uk-text-meta">Requer conhecimento básico na linguagem PHP</p>
								</div>
							</li>
						</ul>
						<ul class="uk-slider-nav uk-dotnav uk-margin-top"><li></li></ul>
						
					</div>
				</div>
				
			</div>
		</div>
	</section>
	<section class="uk-section uk-section-default" style="background: linear-gradient(to bottom, #23538a 0%,#000000 100%); color:white !important;">
		<div class="uk-container uk-container-xsmall uk-text-center uk-section uk-padding-remove-top">
			<h2 class="uk-margin-remove uk-h1" style="font-family: 'Poiret One'; color: white">Resolva os desafios e colecione todas as insígnias.</h2>
		</div>
		<div class="uk-container">
			<div class="uk-grid uk-grid-large uk-child-width-1-3@m" data-uk-grid data-uk-scrollspy="target: > div; delay: 150; cls: uk-animation-slide-bottom-medium">
				<div class="uk-text-center">
					<img data-src="img/svg/planets_all.svg" style="width: 100px; height: 100px;" data-uk-img alt="Image">
					<h4 class="uk-margin-small-bottom uk-margin-top uk-margin-remove-adjacent" style="color: darkgoldenrod">insígnia "Amador no XSS"</h4>
					<p>Você entende como e porque acontece uma vulnerabilidade de Cross-Site Scripting.</p>
				</div>
				<div class="uk-text-center">
					<img  data-src="img/svg/satellite.svg" style="width: 100px; height: 100px;" data-uk-img alt="Image">
					<h4 class="uk-margin-small-bottom uk-margin-top uk-margin-remove-adjacent" style="color: darkgoldenrod">insígnia "Mediano no XSS"</h4>
					<p>Você já conhece todos os tipos de XSS e técnicas básicas para evitar essa vulnerabilidade.</p>
				</div>
				<div class="uk-text-center">
					<img  data-src="img/svg/solar-system.svg" style="width: 100px; height: 100px;" data-uk-img alt="Image">
					<h4 class="uk-margin-small-bottom uk-margin-top uk-margin-remove-adjacent" style="color: darkgoldenrod">insígnia "Avançado no XSS"</h4>
					<p>Você está preparado para identificar e defender aplicações da vulnerabilidade XSS.</p>
				</div>
				<div class="uk-text-center">
					<img data-src="img/svg/solar-system_2.svg" style="width: 100px; height: 100px;" data-uk-img alt="Image">
					<h4 class="uk-margin-small-bottom uk-margin-top uk-margin-remove-adjacent" style="color: darkgoldenrod">insígnia "Amador no SQLi"</h4>
					<p>Você entende como e porque uma vulnerabilidade de Injeção SQL ocorre.</p>
				</div>
				<div class="uk-text-center">
					<img data-src="img/svg/star.svg" style="width: 100px; height: 100px;" data-uk-img alt="Image">
					<h4 class="uk-margin-small-bottom uk-margin-top uk-margin-remove-adjacent" style="color: darkgoldenrod">insígnia "Mediano no SQLi"</h4>
					<p>Você já conhece os tipos de SQLi e técnicas básicas para evitar essa vulnerabilidade.</p>
				</div>
				<div class="uk-text-center">
					<img data-src="img/svg/astronaut.svg" style="width: 100px; height: 100px;" data-uk-img alt="Image">
					<h4 class="uk-margin-small-bottom uk-margin-top uk-margin-remove-adjacent" style="color: darkgoldenrod">insígnia "Avançado no SQLi"</h4>
					<p>Você está preparado para identificar e defender aplicações da vulnerabilidade de Injeção SQL em diversas variações da linguagem SQL.</p>
				</div>
			</div>
		</div>
	</section>

	<footer class="" style="background-color: black">
		<div class="uk-text-center uk-padding uk-padding-remove-horizontal">
			<span class="uk-text-small uk-text-muted">Created by <a href="#">Paulo Jr</a> | Built with <a href="http://getuikit.com" title="Visit UIkit 3 site" target="_blank" data-uk-tooltip><span data-uk-icon="uikit"></span></a></span>
		</div>
	</footer>

	<div id="offcanvas-nav" data-uk-offcanvas="flip: true; overlay: false">
		<div class="uk-offcanvas-bar uk-offcanvas-bar-animation uk-offcanvas-slide">
			<button class="uk-offcanvas-close uk-close uk-icon" type="button" data-uk-close></button>
			<ul class="uk-nav uk-nav-default">
				<li class="uk-active"><a href="#">Active</a></li>
				<li class="uk-parent">
					<a href="#">Parent</a>
					<ul class="uk-nav-sub">
						<li><a href="#">Sub item</a></li>
						<li><a href="#">Sub item</a></li>
					</ul>
				</li>
				<li class="uk-nav-header">Header</li>
				<li><a href="#js-options"><span class="uk-margin-small-right uk-icon" data-uk-icon="icon: table"></span> Item</a></li>
				<li><a href="#"><span class="uk-margin-small-right uk-icon" data-uk-icon="icon: thumbnails"></span> Item</a></li>
				<li class="uk-nav-divider"></li>
				<li><a href="#"><span class="uk-margin-small-right uk-icon" data-uk-icon="icon: trash"></span> Item</a></li>
			</ul>
			<h3>Title</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		</div>
	</div>

	<div id="modal-mais" class="uk-modal-full" uk-modal>
		<div class="uk-modal-dialog">
			<button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
			<div class="uk-grid-collapse uk-child-width-1-2@s uk-flex-middle" uk-grid>
				<div class="uk-background-cover" style="background-color: black;background-image: url(img/modal-full.jpg);" uk-height-viewport></div>
				<div class="uk-padding-large">
					<h1>Sobre</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				</div>
			</div>
		</div>
	</div>

  	<script src="js/uikit.js"></script>
	<script src="js/uikit-icons.js"></script>
</body>
</html>