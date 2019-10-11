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
      <form action="consult_socios_cod.php" method="GET">
        <div class="title_right">
          <div class="col-md-8 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" name="nome" placeholder="Digite o Código aqui...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit">Localizar!</button>
              </span>
            </div>
          </div>
        </div>
      </form>
    </div>
    <?php
    //GET com numero da nova pagina
    $pagina = (isset($_GET['pagina'])) ? $_GET['pagina'] : 1;
    if ($pagina == 0) {
      $pagina = 1;
    }
    $nome = (isset($_GET['nome'])) ? $_GET['nome'] : '';
    ?>
    <div class="x_panel">
      <div class="x_title">
        <h2>Buscando por Código:
          <?php if ($nome == '') {
            echo 'GERAL';
          } else {
            echo $nome;
          }
          ?>
        </h2>
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
          <div class="col-md-1 col-sm-12 col-xs-12 form-group">
            <label>CÓD.</label>
          </div>

          <div class="col-md-4 col-sm-12 col-xs-12 form-group">
            <label>NOME</label>
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>MATRÍCULA</label>
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>CPF</label>
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>NASCIMENTO</label>
          </div>

          <div class="col-md-1 col-sm-12 col-xs-12 form-group">

          </div>
        </div>

        <?php

        //numero de intens por paginação
        $itens_por_pagina = 13;
        $inicio = (($itens_por_pagina * $pagina) - $itens_por_pagina);

        if ($nome == '') {
          $resultado = exeBD("SELECT * FROM sociosb order by SOC_COD asc limit $inicio, $itens_por_pagina ");
          /*$num = mysqli_num_rows($resultado);*/

          $resultado_p = exeBD("SELECT * FROM sociosb order by SOC_COD asc");
          $num_total = mysqli_num_rows($resultado_p);
        } else {
          $resultado = exeBD("SELECT * FROM sociosb WHERE SOC_COD LIKE $nome order by SOC_NOME asc limit $inicio, $itens_por_pagina ");
          /*$num = mysqli_num_rows($resultado);*/

          $resultado_p = exeBD("SELECT * FROM sociosb WHERE SOC_COD LIKE $nome order by SOC_NOME asc");
          $num_total = mysqli_num_rows($resultado_p);
        }

        $num_paginas = ceil($num_total / $itens_por_pagina);
        ?>
        <?php
        include 'pesquiza_socio.php'; 
        
        ?> 
      </div>
      <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
        <ul class="pagination">
          <li class="paginate_button previous" id="datatable_previous">
            <a href="consult_socios_cod.php?pagina=0&nome=<?php echo $nome; ?>" aria-controls="datatable">Primeira</a>
          </li>
          <?php for ($i = 1; $i < $num_paginas; $i++) {
            $estilo = "class=\"paginate_button\"";

            if ($pagina == $i) {
              $estilo = "class=\"paginate_button active\"";
            } else {
              $estilo = "class=\"paginate_button\"";
            }

            ?>
            <li <?php echo $estilo; ?>>
              <a href="consult_socios_cod.php?pagina=<?php echo $i; ?>&nome=<?php echo $nome; ?>" aria-controls="datatable"><?php echo $i; ?></a>
            </li>
          <?php } ?>
          <li class="paginate_button next" id="datatable_next">
            <a href="consult_socios_cod.php?pagina=<?php echo $num_paginas; ?>&nome=<?php echo $nome; ?>" aria-controls="datatable">Ultima</a>
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