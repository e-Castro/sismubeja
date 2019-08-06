<?php
include_once 'header.php';
include_once 'menu.php';
?>
<!-- page content -->
<form action="backend/gravar.php?tb=usuarios" method="POST" >
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

            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
              <label>Login:</label>
              <input type="text" name="login" class="form-control">
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
              <label>Senha:</label>
              <input type="text" name="senha" class="form-control">
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
              <label>Cód. Sócio:</label>
              <input type="text" name="codsocio" class="form-control">
            </div>

          </div>
          <div class="row"> 

            <div class="col-md-2 col-sm-12 col-xs-12 form-group">
              <label>Nível Acesso:</label>
              <select class="form-control" name="nivel">
                <option value="">...</option>
                <option value="0">Básico</option>
                <option value="1">Administrador</option>
              </select>
            </div>
                    
            <div class="col-md-10 col-sm-12 col-xs-12 form-group">
              <label>Obs:</label>
              <input type="text" name="obs" class="form-control">
            </div>
          </div>
        <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-4 col-sm-12 col-xs-12">
              <button type="button" class="btn btn-primary">Cancelar</button>
              <button type="reset" class="btn btn-primary">Limpar</button>
              <button type="submit" class="btn btn-success">Gravar</button>
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