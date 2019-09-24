<?php
include_once 'header.php';
include_once 'menu.php';
include_once 'funcoes.php';
?>
<!-- page content -->

<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h2>Cadastros</h2>
      </div>
      <form action="backend/gravar.php?tb=cargos" method="POST" >
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
      </form>
    </div>
   
    <div class="x_panel">
      <div class="x_title">
        <h2>Sócios Cadastrados</h2>
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

      <?php
                        
    //GET com numero da nova pagina
    /*$pagina = (isset($_GET['agina'])) ? (int)$_GET['pagina'] : 1;*/
    $pagina = $_GET['pagina'] + 1;

    //numero de intens por paginação
    $itens_por_pagina = 25;
    $inicio = (($itens_por_pagina * $pagina) - $itens_por_pagina);

    $resultado = exeBD("SELECT * FROM sociosb order by SOC_NOME asc limit $inicio, $itens_por_pagina ");
                        /*$num = mysqli_num_rows($resultado);*/

    $resultado_p = exeBD("SELECT * FROM sociosb order by SOC_NOME asc");
    $num_total = mysqli_num_rows($resultado_p);

    $num_paginas = ceil($num_total / $itens_por_pagina);
    
    $result = exeBD("SELECT * FROM sociosb ORDER BY SOC_NOME ASC");
          while($l = mysqli_fetch_array($result)){
          ?>
          <div class="row">

            <div class="col-md-1 col-sm-12 col-xs-12 form-group">
              <input type="text" name="cbo" value="<?php echo $l['SOC_COD']; ?>" class="form-control" readonly="readonly">
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
              <input type="text" name="cargo" value="<?php echo $l['SOC_NOME']; ?>"class="form-control" readonly="readonly">
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
              <input type="text" name="cargo" value="<?php echo $l['SOC_CPF']; ?>"class="form-control" readonly="readonly">
            </div>

            <div class="col-md-1 col-sm-12 col-xs-12 form-group">
                <button type="button" class="btn btn-primary"><i class="fa fa-pencil"></i> Editar</button>
            </div>
          </div>
          <?php } ?>
      </div>
      <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button previous" id="example2_previous">
                                                <a href="alunos.php?pagina=0" aria-controls="example2">Primeira</a>
                                            </li>
                                            <?php for($i=0;$i<$num_paginas;$i++){
                                                $estilo = "class=\"paginate_button\"";
                                                if(($pagina-1) == $i)
                                                    $estilo = "class=\"paginate_button active\"";
                                                ?>
                                                <li <?php echo $estilo; ?>>
                                                    <a href="alunos.php?pagina=<?php echo $i; ?>" aria-controls="example2"><?php echo $i+1; ?></a>
                                                </li>
                                            <?php }?>
                                            <li class="paginate_button next" id="example2_next">
                                                <a href="alunos.php?pagina=<?php echo $num_paginas=$num_paginas-1;?>" aria-controls="example2">Ultima</a>
                                            </li>
                                        </ul>
                                    </div>
    </div>
  </div>
</div>

  <!-- /page content -->
  <?php
  include_once 'footer.php';
  ?>