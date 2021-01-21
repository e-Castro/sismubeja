<?php
include_once 'header.php';
include_once 'menu.php';
?>
<!-- page content -->
<form action="backend/emp_salvar_cadastro.php" method="POST" enctype="multipart/form-data">
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h2>Cadastro Nova Empresa</h2>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          
        </div>
      </div>
    </div>

    <div class="x_panel">
      <div class="x_title">
        <h2>Dados da Empresa</h2>
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


            <div class="col-md-3 col-sm-12 col-xs-12 form-group">
              <label>Nome Fantasia:</label>
              <input type="text" name="fantasia" class="form-control">
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
              <label>Razão social:</label>
              <input type="text" name="rsocial" class="form-control">
            </div>

            <div class="col-md-3 col-sm-12 col-xs-12 form-group">
              <label>CNPJ:</label>
              <input type="text" name="cnpj" class="form-control">
            </div>

            <div class="col-md-2 col-sm-12 col-xs-12 form-group">
              <label>INS. Estadual:</label>
              <input type="text" name="insestadual" class="form-control">
            </div>

            <div class="col-md-3 col-sm-12 col-xs-12 form-group">
              <label>*Cidade:</label>
              <input type="text" name="cidade" class="form-control">
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
              <label>Endereço:</label>
              <input type="text" name="endereco" class="form-control">
            </div>

            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
              <label>Bairro:</label>
              <input type="text" name="bairro" class="form-control">
            </div>

            <div class="col-md-1 col-sm-12 col-xs-12 form-group">
              <label>UF:</label>
              <input type="text" name="uf" class="form-control">
            </div>

            <div class="col-md-3 col-sm-12 col-xs-12 form-group">
              <label>CEP:</label>
              <input type="text" name="cep" class="form-control">
            </div>

            
            <div class="col-md-3 col-sm-12 col-xs-12 form-group">
              <label>Cargo:</label>
              <input type="text" name="cargo" class="form-control">
            </div>

            <div class="col-md-3 col-sm-12 col-xs-12 form-group">
              <label>Contato:</label>
              <input type="text" name="contato" class="form-control">
            </div>

            <div class="col-md-3 col-sm-12 col-xs-12 form-group">
              <label>Telefone:</label>
              <input type="text" name="telefone" class="form-control">
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
              <label>Whatsapp:</label>
              <input type="text" name="whatsapp" class="form-control">
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
              <label>E-mail:</label>
              <input type="text" name="email" class="form-control">
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
              <label>Observações:</label>
              <input type="text" name="observacoes" class="form-control">
            </div>
          </div>
      </div>
    </div>
            
            <br />
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
          <div class="col-md-4 col-sm-12 col-xs-12">
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