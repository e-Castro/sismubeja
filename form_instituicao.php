<?php
include_once 'header.php';
include_once 'menu.php';
?>
<!-- page content -->
<form action="backend/gravar.php?tb=instituicao" method="POST" >
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h2>Cadastro Nova Instituição</h2>
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
        <h2>Instituição</h2>
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
              <label>Código:</label>
              <input type="text" name="cod" class="form-control">
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
              <label>Instituição:</label>
              <input type="text" name="nome" class="form-control">
            </div>

            <div class="col-md-5 col-sm-12 col-xs-12 form-group">
              <label>Endereço:</label>
              <input type="text" name="end" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12 form-group">
              <label>Bairro:</label>
              <input type="text" name="bairro" class="form-control">
            </div>

            <div class="col-md-2 col-sm-12 col-xs-12 form-group">
              <label>CEP:</label>
              <input type="text" name="cep" class="form-control">
            </div>

            <div class="col-md-5 col-sm-12 col-xs-12 form-group">
              <label>Cidade:</label>
              <input type="text" name="cidade" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
              <label>Distrito:</label>
              <input type="text" name="distrito" class="form-control">
            </div>

            <div class="col-md-1 col-sm-12 col-xs-12 form-group">
              <label>UF:</label>
              <input type="text" name="uf" class="form-control">
            </div>

            <div class="col-md-3 col-sm-12 col-xs-12 form-group">
              <label>Telefone:</label>
              <input type="text" name="tel" class="form-control">
            </div>

            <div class="col-md-2 col-sm-12 col-xs-12 form-group">
              <label>Data Fundação:</label>
              <input type="date" name="dfund" class="form-control">
            </div>
          </div>
          <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12 form-group">
              <label>Diretor:</label>
              <input type="text" name="diretor" class="form-control">
            </div>
          
            <div class="col-md-7 col-sm-12 col-xs-12 form-group">
              <label>Obs:</label>
              <input type="text" name="obs" class="form-control">
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-12 col-xs-12">
              <button type="button" class="btn btn-danger"><i class="fa fa-close"></i> Cancelar</button>
              <button type="reset" class="btn btn-success"><i class="fa fa-eraser"></i> Limpar</button>
              <button type="submit" class="btn btn-primary"><i class="fa fa-clipboard"></i> Gravar</button>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
</form>
  <!-- /page content -->
  <?php
  include_once 'footer.php';
  ?>