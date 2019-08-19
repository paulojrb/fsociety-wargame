<?php

require_once (__ROOT__.'/classes/handler-mysql.php');
require_once (__ROOT__.'/includes/database-config.php');

function OffcancasLeft() {
    echo "
    <div id='offcanvas-nav' data-uk-offcanvas='flip: true; overlay: false'>
        <div class='uk-offcanvas-bar uk-offcanvas-bar-animation uk-offcanvas-slide'>
            <button class='uk-offcanvas-close uk-close uk-icon' type='button' data-uk-close></button>
            <br>
            <ul uk-accordion='collapsible: false'>
                <li>
                    <a class='uk-accordion-title' href='#'><span uk-icon='unlock'></span></a>
                    <div class='uk-accordion-content'>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                    </div>
                </li>
                <li>
                    <a class='uk-accordion-title' href='#'><span uk-icon='lock' id='span-ico-01'></span></a>
                    <div class='uk-accordion-content' id='challenge-01'>
                        
                    </div>
                </li>
                <li>
                    <a class='uk-accordion-title' href='#'><span uk-icon='lock' id='span-ico-02'></span></a>
                    <div class='uk-accordion-content' id='challenge-02'>
                        
                    </div>
                </li>
                <li>
                    <a class='uk-accordion-title' href='#'><span uk-icon='lock' id='span-ico-03'></span></a>
                    <div class='uk-accordion-content' id='challenge-03'>
                        
                    </div>
                </li>
                <li>
                    <a class='uk-accordion-title' href='#'><span uk-icon='lock' id='span-ico-04'></span></a>
                    <div class='uk-accordion-content' id='challenge-04'>
                        
                    </div>
                </li>

            </ul>
            <div id='ResgatarFlag'>
                <hr>
                <h3>Resgatar flag</h3>
                <form action='php/get-flag.php' method='POST'>
                    <div class='uk-margin'>
                        <div class='uk-inline'>
                            <a class='uk-form-icon' href='#' uk-icon='icon: tag'></a>
                            <input class='uk-input' type='text' name='FLAG' autocomplete='off'>
                        </div>
                    </div>
                    <button type='submit' class='uk-button uk-button-default'>Submit</button>
                </form>
            </div>
        </div>
    </div>

    ";
}

function InsertProfileMenu() {
    echo "
    <li>
        <a href='#' data-uk-icon='icon:user' style='color: #228B22'></a>
        <div class='uk-navbar-dropdown uk-navbar-dropdown-bottom-left'>
            <ul class='uk-nav uk-navbar-dropdown-nav'>
                <li class='uk-nav-header uk-text-small uk-text-primary'><span style='color: #0174DF;'>ACCOUNT</span> </li>
                <li><a href='#info-user' uk-toggle><span data-uk-icon='icon: info'></span> Sumário</a></li>
                <li><a href='#' uk-toggle><span data-uk-icon='icon: refresh'></span> Editar</a></li>
                <li><a href='#'><span data-uk-icon='icon: settings'></span> Configurações</a></li>
                <li class='uk-nav-divider'></li>
                <li><a href='#modal-edit-pictures' uk-toggle><span data-uk-icon='icon: image'></span> Sua foto</a></li>
                <li class='uk-nav-divider'></li>
                <li><a href='php/logoff.php'><span data-uk-icon='icon: sign-out'></span> Sair</a></li>
            </ul>
        </div>
    </li>";
}

function ConsultFlag($pUser) {
    $handler  = new HandlerMysql("fsociety");
    $pQueryString  = "select flags.name_flag, flags.img, user_flag.user from flags left outer join user_flag  on flags.cod = user_flag.cod_flag where user_flag.user ='$pUser' or user_flag.USER is NULL; ";
    $lResult = $handler->ExecQuery($pQueryString);
    $ret = "";
    while ($lRows = $lResult->fetch_assoc()) {
        $img = $lRows["img"];
        if ( strlen($lRows["user"]) < 5 ) {
            $ret = $ret."
            <li>
                <div class='uk-card uk-card-default uk-card-body'><img data-src='../img/medalhas/error.svg' width='100' height='100' uk-img></div>
            </li>
            ";
        } else {
            $ret = $ret."
            <li>
                <div class='uk-card uk-card-default uk-card-body'><img data-src='../img/medalhas/$img' width='100' height='100' uk-img></div>
            </li>
            ";
        }
    }
    $handler->conMysqlClose();
    return $ret;
}

function InnerUserInfo($pUser) {    
    $handler  = new HandlerMysql("fsociety");
    $pQueryString  = "select * from users where username='$pUser' ";
    $lResult = $handler->ExecQuery($pQueryString);
    $lRows = $lResult->fetch_assoc();
    $name = $lRows["username"];
    if (strlen($name) > 3) {
        $name = $lRows["nome"];
    }
    echo ConsultFlag($pUser);
}


?>