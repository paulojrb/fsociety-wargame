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
                <div class='uk-card uk-card-default uk-card-body'><img data-src='img/medalhas/error.svg' width='100' height='100' uk-img></div>
            </li>
            ";
        } else {
            $ret = $ret."
            <li>
                <div class='uk-card uk-card-default uk-card-body'><img data-src='img/medalhas/$img' width='100' height='100' uk-img></div>
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
    echo "
    <div id='info-user' class='uk-modal-container' uk-modal>
        <div class='uk-modal-dialog uk-modal-body ' style='height: 700px;'>
            <button class='uk-modal-close-default' type='button' uk-close style='color: #666'></button>
            <aside id='left-col' class='uk-light uk-visible@m'>
                <div class='uk-flex uk-flex-middle'>
                    <img class='custom-logo' src='img/profile/".$lRows["img"]."' style='height: 100px; width: 100px; margin-left: 65px; margin-top: 20px; margin-bottom: 5px;'>
                </div>
                <div class='left-nav-wrap' style='padding-bottom: 0px;'>
                    <ul class='uk-nav uk-nav-default uk-nav-parent-icon ' data-uk-nav>
                        <li class='uk-nav-header'><span style='color: black'>".$name."</span></li>
                        <li><a href='#'><span data-uk-icon='icon: comments' class='uk-margin-small-right painel-left-color'></span><span class='painel-left-color'>Mensagens</span></a></li>
                        <li><a href='#'><span data-uk-icon='icon: users' class='uk-margin-small-right painel-left-color'></span><span class='painel-left-color'>Amigos</span></a></li>
                        <li class='uk-parent'><a href='#'><span data-uk-icon='icon: thumbnails' class='uk-margin-small-right painel-left-color'></span><span class='painel-left-color'>Desafios</span></a>
                            <ul class='uk-nav-sub'>
                                <li><a title='Article' target='_blank' href='kick-off/article.html'>Article</a></li>
                            </ul>
                        </li>
                        <li><a href='#'><span data-uk-icon='icon: lifesaver' class='uk-margin-small-right painel-left-color'></span><span class='painel-left-color'>Tipos</span></a></li>
                        <li class='uk-parent'>
                            <a href='#'><span data-uk-icon='icon: warning' class='uk-margin-small-right painel-left-color'></span><span class='painel-left-color'>Reports</span></a>
                            <ul class='uk-nav-sub'>
                                <li><a href='#'>E-Mail</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class='left-content-box'>
                        <h5><span style='color: white'><b>Progresso</b></span></h5>
                        <div>
                            <span class='uk-text-small'><span class='painel-left-color'>Desafios</span> <small>(5)</small></span>
                            <progress class='uk-progress success' value='5' max='10'></progress>
                        </div>
                        <div>
                            <span class='uk-text-small'><span class='painel-left-color'>Flags</span> <small>(+3)</small></span>
                            <progress class='uk-progress success' value='3' max='10'></progress>
                        </div>
                        <div>
                            <span class='uk-text-small'><span class='painel-left-color'>Fãs</span> <small>(+15)</small></span>
                            <progress class='uk-progress warning' value='15' max='100'></progress>
                        </div>
                    </div>
                </div>
                <div class='bar-bottom' >
                    <ul class='uk-subnav uk-flex uk-flex-center uk-child-width-1-5' data-uk-grid>
                        <li>
                            <a href='#' class='uk-icon-link' data-uk-icon='icon: home' title='Home' data-uk-tooltip></a>
                        </li>
                        <li>
                            <a href='#' class='uk-icon-link' data-uk-icon='icon: settings' title='Settings' data-uk-tooltip></a>
                        </li>
                        <li>
                            <a href='#' class='uk-icon-link' data-uk-icon='icon: social'  title='Social' data-uk-tooltip></a>
                        </li>
                        
                        <li>
                            <a href='#' class='uk-icon-link' data-uk-tooltip='Sign out' data-uk-icon='icon: sign-out'></a>
                        </li>
                    </ul>
                </div>
            </aside>

            <div id='content'>
            
                <ul uk-tab>
                    <li>
                        <button href='#' class='uk-button my-button' >
                            <span class='my-button-name'>Label 1</span>
                        </button>
                    </li>
                    <li>
                        <button href='#' class='uk-button my-button' >
                            <span class='my-button-name'>Label 2</span>
                        </button>
                    </li>
                    <li>
                        <button href='#' class='uk-button my-button' >
                            <span class='my-button-name'>Label 3</span>
                        </button>
                    </li>
                    <li>
                        <button href='#' class='uk-button my-button' >
                            <span class='my-button-name'>Label 4</span>
                        </button>
                    </li>
                </ul>

                <ul class='uk-switcher uk-margin'>
                    <li style='color: red'>
                        <div class='js-wrapper'>
                            <div class='uk-overflow-auto uk-height-max-large'>
                                <div class='uk-grid-small' uk-grid>
                                    <ul class='uk-child-width-1-2 uk-child-width-1-4@s' uk-sortable='handle: .uk-card' uk-grid uk-scrollspy='cls: uk-animation-fade; target: .uk-card; delay: 200; repeat: false'>
                                        
                                    ".ConsultFlag($pUser)."
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li style='color: red'>
                        <div>
                            <div uk-grid>
                                <div class='uk-width-auto@m'>
                                    <ul class='uk-tab-left' uk-tab='connect: #component-tab-left; animation: uk-animation-fade'>
                                        <li><a href='#' style='margin: 10px;'><span class='bt-letra-escura'>Label 1</span></a></li>
                                        <li><a href='#' style='margin: 10px;'><span class='bt-letra-escura'>Label 2</span></a></li>
                                        <li><a href='#' style='margin: 10px;'><span class='bt-letra-escura'>Label 3</span></a></li>
                                    </ul>
                                </div>
                                <div class='uk-width-expand@m'>
                                    <ul id='component-tab-left' class='uk-switcher'>
                                        <li>
                                            <dl class='uk-description-list uk-description-list-divider'>
                                                <dt>Description term</dt>
                                                <dd>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</dd>
                                            </dl>
                                        </li>
                                        <li>
                                            <dl class='uk-description-list uk-description-list-divider'>
                                                <dt>Description term</dt>
                                                <dd>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</dd>
                                            </dl>
                                        </li>
                                        <li>
                                            <dl class='uk-description-list uk-description-list-divider'>
                                                <dt>Description term</dt>
                                                <dd>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</dd>
                                            </dl>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li style='color: red'>
                        <div class='uk-child-width-1-2@s' uk-grid>
                            <div>
                                <div class='uk-light uk-background-secondary uk-padding'>
                                    <h3>Light</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <button class='uk-button uk-button-default'>Button</button>
                                </div>
                            </div>
                            <div>
                                <div class='uk-light uk-background-secondary uk-padding'>
                                    <h3>Light</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    <button class='uk-button uk-button-default'>Button</button>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <table class='uk-table uk-table-responsive uk-table-divider'>
                            <thead>
                                <tr>
                                    <th style='color: #1C1C1C'>Table Heading</th>
                                    <th style='color: #1C1C1C'>Table Heading</th>
                                    <th style='color: #1C1C1C'>Table Heading</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style='color: #1C1C1C'>Table Data</td>
                                    <td style='color: #1C1C1C'>Table Data</td>
                                    <td style='color: #1C1C1C'>Table Data</td>
                                </tr>
                                <tr>
                                    <td style='color: #1C1C1C'>Table Data</td>
                                    <td style='color: #1C1C1C'>Table Data</td>
                                    <td style='color: #1C1C1C'>Table Data</td>
                                </tr>
                                <tr>
                                    <td style='color: #1C1C1C'>Table Data</td>
                                    <td style='color: #1C1C1C'>Table Data</td>
                                    <td style='color: #1C1C1C'>Table Data</td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                </ul>
                
            </div>
        </div>
    </div>
    ";
}


?>