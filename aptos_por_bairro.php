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
      <form action="rel_aptos_por_bairro.php" method="GET">
        <div class="title_right">
          <div class="col-md-8 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" name="bairro" placeholder="Digite aqui...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit">Localizar!</button>
              </span>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- /page content -->
<?php
include_once 'footer.php';
?>