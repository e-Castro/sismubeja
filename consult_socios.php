<?php
include_once 'header.php';
include_once 'menu.php';
include_once 'funcoes.php';

$id = isset($_GET['id']) ? $_GET['id']: '';

$dados = '';

if($id == ''){
  $consulta = exeBD("SELECT * FROM `sociosb` WHERE SOC_COD = 1");
  $dados = mysqli_fetch_array($consulta);
}else{
  $consulta = exeBD("SELECT * FROM `sociosb` WHERE SOC_COD = $id");
  $dados = mysqli_fetch_array($consulta);
}

?>
<!-- page content -->
<form action="backend/soc_salvar_cadastro.php" method="POST" enctype="multipart/form-data">
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h2>Cadastros Novo Sócio</h2>
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
        <h2>Dados pessoais</h2>
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
            <input type="file" name="foto">
            <div class="col-md-2 col-sm-12 col-xs-12 form-group">
              <label>Foto:</label>
              <img src="<?php echo 'images/'.$dados['SOC_FOTO']; ?>" width="100%" height="100%" alt="Foto de exibição">
            </div>

            <div class="col-md-1 col-sm-12 col-xs-12 form-group">
              <label>Código:</label>
              <input type="text" name="cod" value="<?php echo $dados['SOC_COD']; ?>" readonly="readonly" class="form-control">
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
              <label>Nome:</label>
              <input type="text" name="nome" value="<?php echo $dados['SOC_NOME']; ?>" class="form-control">
            </div>

            <div class="col-md-2 col-sm-12 col-xs-12 form-group">
              <label>Data Nascimento:</label>
              <input type="date" name="dtnasc" value="<?php echo $dados['SOC_DTNASC']; ?>" class="form-control">
            </div>

            <div class="col-md-1 col-sm-12 col-xs-12 form-group">
              <label for="heard">Sexo:</label>
              <select class="form-control" name="sex">
                <option value="<?php echo $dados['SOC_SEXO'];?>"><?php echo $dados['SOC_SEXO'];?></option>
                <option value="M">M</option>
                <option value="F">F</option>
              </select>
            </div>

            <div class="col-md-3 col-sm-12 col-xs-12 form-group">
              <label>Nacionalidade:</label>
              <input type="text" name="nacionalid" value="<?php echo $dados['SOC_NACION']; ?>" class="form-control">
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
              <label>Naturalidade:</label>
              <input type="text" name="naturalid" value="<?php echo $dados['SOC_NATURALID']; ?>"class="form-control">
            </div>

            <div class="col-md-1 col-sm-12 col-xs-12 form-group">
              <label for="heard">UF:</label>
              <select class="form-control" name="ufnatural">
                <option value="">...</option>
                <option value="PE">PE</option>
                <option value="PB">PB</option>
                <option value="AL">AL</option>
                <option value="CE">CE</option>
                <option value="RN">RN</option>
              </select>
            </div>

            <div class="col-md-3 col-sm-12 col-xs-12 form-group">
              <label>Estado Civil:</label>
              <input type="text" name="estcivil" value="<?php echo $dados['SOC_EST_ESTCIV']; ?>" class="form-control">
            </div>

            <div class="col-md-7 col-sm-12 col-xs-12 form-group">
              <label>Apelido:</label>
              <input type="text" name="apelido" value="<?php echo $dados['SOC_APELIDO']; ?>" class="form-control">
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
              <label>Pai:</label>
              <input type="text" name="pai" value="<?php echo $dados['SOC_PAI']; ?>" class="form-control">
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
              <label>Mãe:</label>
              <input type="text" name="mae" value="<?php echo $dados['SOC_MAE']; ?>" class="form-control">
            </div>
          </div>
      </div>
    </div>

    <div class="x_panel">
      <div class="x_title">
        <h2>Endereço</h2>
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

          <div class="col-md-7 col-sm-12 col-xs-12 form-group">
            <label>Logradouro:</label>
            <input type="text" name="end" value="<?php echo $dados['SOC_END']; ?>" class="form-control">
          </div>

          <div class="col-md-1 col-sm-12 col-xs-12 form-group">
            <label>Número:</label>
            <input type="text" name="num" value="<?php echo $dados['SOC_NUM']; ?>" class="form-control">
          </div>

          <div class="col-md-4 col-sm-12 col-xs-12 form-group">
            <label>Bairro:</label>
            <input type="text" name="bairro" value="<?php echo $dados['SOC_BAIRRO']; ?>" class="form-control">
          </div>

          <div class="col-md-4 col-sm-12 col-xs-12 form-group">
            <label for="heard">Distrito:</label>
            <select class="form-control" name="distrito">
              <option value="">...</option>
              <option value="PE">Serra dos Ventos</option>
              <option value="PB">Divisão</option>
              <option value="AL">Vila do Socorro</option>
              <option value="CE">Cavalo Morto</option>
              <option value="RN">Xucuru</option>
            </select>
          </div>

          <div class="col-md-4 col-sm-12 col-xs-12 form-group">
            <label>Cidade:</label>
            <input type="text" name="cidade" value="<?php echo $dados['SOC_CIDADE']; ?>" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>CEP:</label>
            <input type="text" name="cep" placeholder="00000-00" class="form-control">
          </div>

          <div class="col-md-1 col-sm-12 col-xs-12 form-group">
            <label for="heard">UF:</label>
            <select class="form-control" name="uf">
              <option value="">...</option>
              <option value="PE">PE</option>
              <option value="PB">PB</option>
              <option value="AL">AL</option>
              <option value="CE">CE</option>
              <option value="RN">RN</option>
            </select>
          </div>

          <div class="col-md-1 col-sm-12 col-xs-12 form-group">
            <label>Gaveta:</label>
            <input type="text" name="gaveta" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>Telefone:</label>
            <input type="text" name="tel" placeholder="(00) 0000-0000" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>Celular/Whatsapp:</label>
            <input type="text" name="cel" placeholder="(00) 0000-0000" class="form-control">
          </div>

          <div class="col-md-8 col-sm-12 col-xs-12 form-group">
            <label>e-mail:</label>
            <input type="text" name="email" class="form-control">
          </div>
        </div>
      </div>
    </div>
    <div class="x_panel">
      <div class="x_title">
        <h2>Documentação:</h2>
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

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>Matricula:</label>
            <input type="text" name="mat" class="form-control">
          </div>

          <div class="col-md-3 col-sm-12 col-xs-12 form-group">
            <label>Profissão:</label>
            <input type="text" name="profissao" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>PIS:</label>
            <input type="text" name="pis" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>CPF:</label>
            <input type="text" name="cpf" placeholder="000.000.000-00" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>RG/ORG:</label>
            <input type="text" name="rg" class="form-control">
          </div>

          <div class="col-md-1 col-sm-12 col-xs-12 form-group">
            <label for="heard">RG/UF:</label>
            <select class="form-control" name="ufrg">
              <option value="">...</option>
              <option value="PE">PE</option>
              <option value="PB">PB</option>
              <option value="AL">AL</option>
              <option value="CE">CE</option>
              <option value="RN">RN</option>
            </select>
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>RG/DataExped:</label>
            <input type="date" name="rgexp" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>CTPS:</label>
            <input type="text" name="ctps" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>CTPS/Serie:</label>
            <input type="text" name="ctpsserie" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>CTPS/Expedição:</label>
            <input type="date" name="ctpsexp" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>Titulo:</label>
            <input type="text" name="titulo" class="form-control">
          </div>

          <div class="col-md-1 col-sm-12 col-xs-12 form-group">
            <label>Zona:</label>
            <input type="text" name="titzona" class="form-control">
          </div>

          <div class="col-md-1 col-sm-12 col-xs-12 form-group">
            <label>Seção:</label>
            <input type="text" name="titsecao" class="form-control">
          </div>

          <div class="col-md-4 col-sm-12 col-xs-12 form-group">
            <label for="heard">Nível/Formação:</label>
            <select class="form-control" name="nivelform">
              <option value="">...</option>
              <option value="PE">Especialização</option>
              <option value="PB">Superior completo</option>
              <option value="AL">Superior incompleto</option>
              <option value="CE">Nível Médio</option>
            </select>
          </div>

          <div class="col-md-4 col-sm-12 col-xs-12 form-group">
            <label for="heard">Instituição:</label>
            <select class="form-control" name="instit">
              <option value="">...</option>
              <option value="PE">Especialização</option>
              <option value="PB">Superior completo</option>
              <option value="AL">Superior incompleto</option>
              <option value="CE">Nível Médio</option>
            </select>
          </div>

          <div class="col-md-4 col-sm-12 col-xs-12 form-group">
            <label for="heard">Cargo:</label>
            <select class="form-control" name="cargo">
              <option value="">...</option>
              <option value="PE">TECNICO EM INFORMATICA</option>
            </select>
          </div>

          <div class="col-md-6 col-sm-12 col-xs-12 form-group">
            <label for="heard">Lotação:</label>
            <select class="form-control" name="lotacao">
              <option value="">...</option>
              <option value="PE">Especialização</option>
              <option value="PB">Superior completo</option>
              <option value="AL">Superior incompleto</option>
              <option value="CE">Nível Médio</option>
            </select>
          </div>

          <div class="col-md-6 col-sm-12 col-xs-12 form-group">
            <label for="heard">Cargo de Lotaçao:</label>
            <select class="form-control" name="cargolotac">
              <option value="">...</option>
              <option value="PE">TECNICO EM INFORMATICA</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="x_panel">
      <div class="x_title">
        <h2>SITUAÇAO DO ASSOCIADO:</h2>
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

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label for="heard">Situaçao:</label>
            <select class="form-control" name="sit">
              <option value="">...</option>
              <option value="PE">Ativo</option>
              <option value="PE">Inativo</option>
            </select>
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>N. Port. Adimissão:</label>
            <input type="text" name="portadmis" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>Data Adimissão:</label>
            <input type="date" name="dtadmissao" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>N. Port. Aposetadoria:</label>
            <input type="text" name="portaposent" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>Data Aposetadoria:</label>
            <input type="date" name="dtaposent" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>N. Beneficio:</label>
            <input type="text" name="numbenef" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>Data Beneficio:</label>
            <input type="date" name="dtbenef" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>Data Falecimento:</label>
            <input type="date" name="dtfalec" class="form-control">
          </div>

          <div class="col-md-8 col-sm-12 col-xs-12 form-group">
            <label for="message">Obs.:(maximo 100 caraquiteres) :</label>
            <textarea id="message" class="form-control" name="mensagem" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10"></textarea>

            <br />
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-9">
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