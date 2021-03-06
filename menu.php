
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="home.php" class="site_title"><img src="images/log.png"><span> SISMUBEJA</span></a>
            </div>

            <div class="clearfix"></div>
            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>Sócios</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-laptop"></i> Cadastros <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_socios.php">Sócios</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Consultas/Alterações <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="consult_socios_cod.php">Por Código</a></li>
                      <li><a href="consult_socios_nome.php">Por Nome</a></li>
                      <li><a href="consult_socios_mat.php">Por Matricula</a></li>
                      <li><a href="consult_socios_cpf.php">Por CPF</a></li>
                      <li><a href="consult_socios_cod_ant.php">Por Código_Antigo</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
              <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-laptop"></i> Cadastros <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="form_usuarios.php">Usuários</a></li>
                      <li><a href="form_cargos.php">Cargos</a></li>
                      <li><a href="form_bairros.php">Bairros</a></li>
                      <li><a href="form_distritos.php">Distrito</a></li>
                      <li><a href="form_situacao.php">Situação</a></li>
                      <li><a href="form_instituicao.php">Instituição</a></li>
                      <li><a href="form_lotacao.php">Lotação</a></li>
                      <li><a>Eventos/Assembleias<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                          <li><a href="form_evento.php">Novo Evento</a></li>
                          <li><a href="form_presenca.php">Presença</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i> Consultas/Alterações <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="consult_usuarios.php">Usuários</a></li>
                      <li><a href="consult_cargos.php">Cargos</a></li>
                      <li><a href="consult_bairros.php">Bairros</a></li>
                      <li><a href="consult_distritos.php">Distritos</a></li>
                      <li><a href="consult_situacao.php">Situação</a></li>
                      <li><a href="consult_instituicao.php">Instituição</a></li>
                      <li><a href="consult_lotacao.php">Lotação</a></li>
                      <li><a href="consult_eventos.php">Eventos/Assembleias</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> Atendimentos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Jurídico</a></li>
                      <li><a href="#">Presidencia</a></li>
                      <li><a href="#">Financeiro</a></li>
                      <li><a href="#">Relatórios</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="menu_section">
                <h3>Financeiro</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bar-chart-o"></i> financeiro <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="#">Mensalidades</a></li>
                      <li><a href="#">Caixa</a></li>
                      <li><a href="#">Contas a Pagar</a></li>
                      <li><a href="#">Contas a Receber</a></li>
                      <li><a href="#">Relatórios</a></li>
                    </ul>
                  </li>
                </ul>  
              </div>
              <div class="menu_section">
                <h3>Administração</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-sitemap"></i>Diretoria <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#" target="blank">Presidente</a></li>
                      <li><a href="#" target="blank">Vice-Presidente</a></li>
                      <li><a href="#" target="blank">Tesoureiro</a></li>
                      <li><a href="#" target="blank">Secretário Geral</a></li>
                      <li><a href="#" target="blank">Diretoria</a></li>
                      <li><a href="#" target="blank">Suplentes</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-puzzle-piece"></i>Eleições <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Iniciar Pleito</a></li>
                      <li><a href="#">Inscrição de Cahapa</a></li>
                      <li><a href="rel_cad_votacao.php" target="blank">Caderno de Votação</a></li>
                      <li><a href="rel_cancel.php" target="blank">Relatório Não Votantes</a></li>
                      <li><a href="rel_aptos.php" target="blank">Relatório Aptos a Votar</a></li>
                      <li><a href="aptos_por_bairro.php" target="blank">Relatório Aptos por Bairro</a></li>
                    </ul>
                  </li>
                </ul>  
              </div>
              
              <div class="menu_section">
                <h3>Tombamento</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-laptop"></i>Cadastros <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Bens</a></li>
                      <li><a href="#">Setores</a></li>
                      <li><a href="#">Grupos</a></li>
                      <li><a href="#">Responsáveis</a></li>
                      <li><a href="#">Movimentações</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-edit"></i>Consultas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">Bens</a></li>
                      <li><a href="#">Setores</a></li>
                      <li><a href="#">Grupos</a></li>
                      <li><a href="#">Responsáveis</a></li>
                      <li><a href="#">Movimentações</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-graduation-cap"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="#">403 Error</a></li>
                      <li><a href="#">404 Error</a></li>
                      <li><a href="#">500 Error</a></li>
                      <li><a href="#">Plain Page</a></li>
                      <li><a href="#">Login Page</a></li>
                      <li><a href="#">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <!--<li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li> -->                 
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a id="goFS" data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="fotos/<?php echo foto($fotop);?>" alt=""><?php echo $usuario; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Perfil</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Configurações</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Ajuda</a></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Sair</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-red">1</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>José Alberto</span>
                          <span class="time"><?php echo date('d - M');?></span>
                        </span>
                        <span class="message">
                        TS.13:3 - Porque os magistrados não são motivo de temor para os que fazem o bem, mas para ...
                        </span>
                      </a>
                    </li>
                    <!--<li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/alberto.png" alt="Profile Image" /></span>
                        <span>
                          <span>Alberto</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>-->
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>Ver todas </strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
   