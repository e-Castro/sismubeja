<?php
include_once 'funcoes.php';
include_once 'header.php';
include_once 'menu.php';
?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h2>Cadastro Novo Usuário</h2>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="x_panel">
      <div class="x_title">
        <h2>Usuário</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
          </li>
          <li><a class="close-link"><i class="fa fa-close"></i></a>
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                <!---------------------------INICIO PHP---------------------------->
                <?php

                //GET com numero da nova pagina
                /*$pagina = (isset($_GET['agina'])) ? (int)$_GET['pagina'] : 1;*/
                $pagina = isset($_GET['pagina']) ? $_GET['pagina']: 1;

                //numero de intens por paginação
                $itens_por_pagina = 13;

                $inicio = (($itens_por_pagina * $pagina) - $itens_por_pagina);

                $resultado = exeBD("SELECT * FROM USUARIOS ORDER BY USU_LOGIN ASC LIMIT $inicio, $itens_por_pagina ");
 
                /*$num = mysqli_num_rows($resultado);*/

                $resultado_p = exeBD("SELECT * FROM USUARIOS");
                $num_total = mysqli_num_rows($resultado_p);

                $num_paginas = ceil($num_total/$itens_por_pagina);

                ?>
               
                    <div class="row">
                        <div class="col-md-2 col-sm-12 col-xs-12 form-group"><label>Login</label></div>
                        <div class="col-md-2 col-sm-12 col-xs-12 form-group"><label>Nível de Acesso</label></div>
                        <div class="col-md-2 col-sm-12 col-xs-12 form-group"><label>Obs.</label></div>
                    </div>
                    
                <?php
                    while($l = mysqli_fetch_array($resultado)) {

                        $id    = $l["USU_COD"];
                        $nome  = $l["USU_LOGIN"];
                        $tipo  = $l["nivelacesso"];
                        $login = $l["USU_SOC_COD"];
                        $senha = $l['USU_OBS'];
                ?>
                    <div class="row">
                      <div class="col-md-2 col-sm-12 col-xs-12 form-group" style="padding-right: 3px;">
                        <input type="text" class="form-control" name="nome" value="<?php echo $nome;?>" readonly="readonly">
                      </div>
                      <div class="col-md-2 col-sm-12 col-xs-12 form-group" style="padding-left: 3px; padding-right: 3px;">                  
                      <?php
                        if($tipo == 0)
                      {?>
                        <input type="text" class="form-control" name="nome" value="Básico" readonly="readonly">
                      <?php }else{?>
                        <input type="text" class="form-control" name="nome" value="Administrador" readonly="readonly">
                      <?php } ?>                                  
                      </div>
                      <div class="col-xs-4 form-group" style="padding-left: 3px; padding-right: 3px;">
                        <input type="text" class="form-control" name="login" value='<?php echo $login;?>' readonly="readonly">
                      </div>
                      
                      <div class="col-xs-2 form-group" style="padding-left: 3px;">
                        <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>Editar</a>
                        <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                      </div>
                    </div>  
                  <?php } ?>
            </div>
          </div>
          <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
            <ul class="pagination">
                <li class="paginate_button previous" id="example2_previous">
                    <a href="usu_novo.php?pagina=0" aria-controls="example2">Primeira</a>
                </li>
            <?php for($i=0;$i<$num_paginas;$i++){
                $estilo = "class=\"paginate_button\"";
                if(($pagina-1) == $i)
                $estilo = "class=\"paginate_button active\"";
            ?>
                <li <?php echo $estilo; ?>>
                    <a href="usu_novo.php?pagina=<?php echo $i; ?>" aria-controls="example2"><?php echo $i+1; ?></a>
                </li>
            <?php }?>
                <li class="paginate_button next" id="example2_next">
                    <a href="usu_novo.php?pagina=<?php echo $num_paginas=$num_paginas-1;?>" aria-controls="example2">Ultima</a>
                </li>
            </ul>
          </div>
        </div>
      </div>
    </div>   
  </div>
  <!-- /page content -->
  <?php
  include_once 'footer.php';
  ?>