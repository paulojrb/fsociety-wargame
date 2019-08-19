<?php

/* session init */
session_start();

if ( isset($_SESSION["name_user"]) ) {
	header('Location: ../');
}

if ( isset($_SESSION["error_login"]) ) {
	$msg_tmp = $_SESSION["error_login"];
	echo "
	<script>
	window.onload = function(){
		UIkit.modal.dialog(\"<p class='uk-modal-body' style='color: #666'>$msg_tmp</p>\");
	}
	</script>
	";
	unset( $_SESSION["error_login"] );
}

/* ------------------------------------------
* switch error message return
* for create user
* ------------------------------------------*/
if ( isset($_SESSION["create_user"]) ) {
    $msg = $_SESSION["create_user"]["msg"];

    switch ($_SESSION["create_user"]["error"]) {
        case 'A1':
            echo "
            <script>
            window.onload = function(){
                UIkit.modal.dialog(\"<p class='uk-modal-body' style='color: #666'>$msg</p>\");
            }
            </script>
            ";
            unset($_SESSION["create_user"]);
            break;
        case 'A2':
            echo "
            <script>
            window.onload = function(){
                UIkit.modal.dialog(\"<p class='uk-modal-body' style='color: #666'>$msg</p>\");
            }
            </script>
            ";
            unset($_SESSION["create_user"]);
            break;
        case 'A3':
            echo "
            <script>
            window.onload = function(){
                UIkit.modal.dialog(\"<p class='uk-modal-body' style='color: #666'>$msg</p>\");
            }
            </script>
            ";
            unset($_SESSION["create_user"]);
            break;
        default:
            echo "
            <script>
            window.onload = function(){
                UIkit.modal.dialog(\"<p class='uk-modal-body' style='color: #666'>$msg</p>\");
            }
            </script>
            ";
            unset($_SESSION["create_user"]);
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Login - Fsociety</title>
		<link rel="shortcut icon" href="../img/svg/ghost.svg" />
		<link rel="stylesheet" type="text/css" href="../css/uikit.css">
		<style>
			.uk-width-large {
				width: 350px;
			}
		</style>
	</head>
	<body class="login uk-cover-container  uk-flex uk-flex-center uk-flex-middle uk-height-viewport uk-overflow-hidden " data-uk-height-viewport style="background-color: #edecfa !important;">
		<div class="uk-position-cover "></div>
		<div id="login" class="uk-width-large uk-padding-small uk-position-z-index uk-border-rounded" uk-scrollspy="cls: uk-animation-fade" style="background-color: #ffffff; padding: 40px; border: 1px solid white;">
			<div class="uk-text-center uk-margin">
				<img src="../img/svg/user.svg" width="150" height="150" uk-svg>
			</div>
			<form class="toggle-class" action="../php/login-user.php" method="POST">
				<fieldset class="uk-fieldset">
					<div class="uk-margin-small">
						<div class="uk-inline uk-width-1-1">
							<span class="uk-form-icon uk-icon" data-uk-icon="icon: user"></span>
							<input id="id_username" autocomplete="off" name="username"  class="uk-input uk-border-pill" onblur="SpaceLeft(event)" required type="text" style="border-color: red;">
						</div>
					</div>
					<div class="uk-margin-small">
						<div class="uk-inline uk-width-1-1">
							<span class="uk-form-icon uk-form-icon-flip" data-uk-icon="icon: lock"></span>
							<input id="id_password" autocomplete="off" name="password" class="uk-input uk-border-pill" required type="password" style="border-color: red;" onkeypress="VerifyPass(event)">
						</div>
					</div>
					<div class="uk-margin-bottom uk-text-center">
						<button type="submit" class="uk-button uk-button-primary uk-border-pill" style="background-color: #e46d95">LOG IN</button>
					</div>
				</fieldset>
			</form>

			<form id="form_cadastro" class="toggle-class" action="../php/cadastro-user.php" method="POST" hidden>
				<fieldset class="uk-fieldset">
				
				<div class="uk-margin-small">
					<div class="uk-inline uk-width-1-1">
						<span class="uk-form-icon uk-icon" data-uk-icon="icon: user"></span>
						<input autocomplete="off" id="id_username_cadastro" name="username_cadastro" class="uk-input uk-border-pill" onkeypress="VerifyUserRegister(event)" required type="text" style="border-color: red;">
					</div>
				</div>
				<div class="uk-margin-small">
					<div class="uk-inline uk-width-1-1">
						<span class="uk-form-icon uk-icon" data-uk-icon="icon: pencil"></span>
						<input autocomplete="off" id="id_token_cadastro" name="token_cadastro" class="uk-input uk-border-pill" onblur="VerifyTokenRegister(event)" required type="text" style="border-color: red;">
					</div>
				</div>
				<input type="hidden" id="id_passwd_cadastro_hidden_one" name="passwd_cadastro_hidden_one" value="" type="password">
				<input type="hidden" id="id_passwd_cadastro_hidden_two" name="passwd_cadastro_hidden_two" value="" type="password">
				<div class="uk-margin-bottom uk-text-center">
					<button id="botton_cadastro" href="#confirm-cadastro" class="uk-button uk-button-primary uk-border-pill" disabled uk-toggle>Register</button>
				</div>
				<div id="confirm-cadastro" class="uk-flex-top" uk-modal>
					<div class="uk-modal-dialog  uk-margin-auto-vertical uk-border-rounded" style="width: 394px;">
						<div class="uk-modal-body">
							<h2 class="uk-modal-title uk-text-center" style="margin-bottom: 30px;">Criar senha</h2>
							<div class="uk-margin-small">
								<div class="uk-inline uk-width-1-1">
									<span class="uk-form-icon uk-icon" data-uk-icon="icon: lock"></span>
									<input autocomplete="off" id="id_password_one" name="password_one" class="uk-input uk-border-pill" required type="password">
								</div>
							</div>
							<div class="uk-margin-small" style="margin-bottom: 20px;">
								<div class="uk-inline uk-width-1-1">
									<span class="uk-form-icon uk-icon" data-uk-icon="icon: lock"></span>
									<input autocomplete="off" id="id_password_two" name="password_two" class="uk-input uk-border-pill" required type="password">
								</div>
							</div>
							<button class="uk-button uk-button-default uk-modal-close uk-border-rounded" type="button">Cancelar</button>
							<button class="uk-button uk-button-primary uk-border-rounded" onclick="RegisterUser(event)" style="background-color: #e46d95">Continuar</button>
						</div>
					</div>
				</div>
				</fieldset>
			</form>
			<div>
				<div class="uk-text-center">
					<a class="uk-link-reset uk-text-small toggle-class" data-uk-toggle="target: .toggle-class ;animation: uk-animation-fade">Não possui uma conta?</a>
					<a class="uk-link-reset uk-text-small toggle-class" data-uk-toggle="target: .toggle-class ;animation: uk-animation-fade" hidden><span data-uk-icon="arrow-left"></span>Back to Login</a>
				</div>
			</div>
		</div>
	
		<script src="check.js"></script>
		<script src="../js/uikit.js"></script>
		<script src="../js/uikit-icons.js"></script>
	</body>
</html>