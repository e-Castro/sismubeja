<?php
include_once 'header.php';
include_once 'menu.php';
include_once 'funcoes.php';

$id = isset($_GET['id']) ? $_GET['id']: '';

$dados = '';
$foto = '';

if($id == ''){
  $consulta = exeBD("SELECT * FROM `sociosb` WHERE SOC_COD = 1");
  $dados = mysqli_fetch_array($consulta);
}else{
  $consulta = exeBD("SELECT * FROM `sociosb` WHERE SOC_COD = $id");
  $dados = mysqli_fetch_array($consulta);
//$foto = mysqli_fetch_object($consulta);
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
              
              <img src="fotos/<?php echo $dados['SOC_FOTO']; ?>" width="100%" height="100%" alt="Foto de exibição">
            </div>

            <div class="col-md-1 col-sm-12 col-xs-12 form-group">
              <label>Código:</label>
              <input type="text" name="cod" value="<?php echo $dados['SOC_COD']; ?>" readonly="readonly" class="form-control">
            </div>
            <div class="col-md-2 col-sm-12 col-xs-12 form-group">
              <label>Cód. Antigo:</label>
              <input type="text" name="cod_ant" value="<?php echo $dados['SOC_COD_ANT']; ?>" readonly="readonly" class="form-control">
            </div>

            <div class="col-md-5 col-sm-12 col-xs-12 form-group">
              <label>Nome:</label>
              <input type="text" name="nome" value="<?php echo $dados['SOC_NOME']; ?>" class="form-control">
            </div>

            <div class="col-md-2 col-sm-12 col-xs-12 form-group">
              <label>Data Nascimento:</label>
              <input type="date" name="dtnasc" value="<?php echo $dados['SOC_DTNASC']; ?>" class="form-control">
            </div>

            <div class="col-md-2 col-sm-12 col-xs-12 form-group">
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

            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
              <label>Naturalidade:</label>
              <input type="text" name="naturalid" value="<?php echo $dados['SOC_NATURALID']; ?>"class="form-control">
            </div>

            <div class="col-md-1 col-sm-12 col-xs-12 form-group">
              <label for="heard">UF:</label>
              <select class="form-control" name="uf">
                 <option value="<?php echo $dados["SOC_UF_NATURAL"];?>"><?php echo $dados["SOC_UF_NATIRAL"];?></option>
                 <?php
                 $resultado = exeBD("SELECT * FROM uf");
                 
                 while($uf = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $uf['UF_NOME'] ?>"><?php echo $uf['UF_NOME'] ?></option>
                  <?php } ?>
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

            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
              <label>Pai:</label>
              <input type="text" name="pai" value="<?php echo $dados['SOC_PAI']; ?>" class="form-control">
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
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
                 <?php
                 $f = $dados['SOC_DIS_DISTRIT'];
                 $dist = "-";
                 $resultDist = exeBD("SELECT * FROM distrito WHERE DIS_COD LIKE '$f'");
                 
                 $dist = mysqli_fetch_array($resultDist);?>

                 <option value="<?php echo $dist['DIS_COD'];?>"><?php echo $dist['DIS_NOME'];?></option>
                 
                 <?php
                 $resultado = exeBD("SELECT * FROM distrito");

                 while($dist = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $dist['DIS_COD'] ?>"><?php echo $dist['DIS_NOME'] ?></option>
                 <?php } ?>
              </SELECT>
          </div>

          <div class="col-md-4 col-sm-12 col-xs-12 form-group">
            <label>Cidade:</label>
            <input type="text" name="cidade" value="<?php echo $dados['SOC_CIDADE']; ?>" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>CEP:</label>
            <input type="text" name="cep"value="<?php echo $dados['SOC_CEP']; ?>"class="form-control">
          </div>

          <div class="col-md-1 col-sm-12 col-xs-12 form-group">
            <label for="heard">UF:</label>
            <select class="form-control" name="uf">
                 <option value="<?php echo $dados["SOC_UF"];?>"><?php echo $dados["SOC_UF"];?></option>
                 <?php
                 $resultado = exeBD("SELECT * FROM uf");
                 
                 while($uf = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $uf['UF_NOME'] ?>"><?php echo $uf['UF_NOME'] ?></option>
                  <?php } ?>
              </select>
          </div>

          <div class="col-md-1 col-sm-12 col-xs-12 form-group">
            <label>Gaveta:</label>
            <input type="text" name="gaveta" value="<?php echo $dados['SOC_GAVETA']; ?>" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>Telefone:</label>
            <input type="text" name="tel"  value="<?php echo $dados['SOC_TEL']; ?>" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>Celular/Whatsapp:</label>
            <input type="text" name="cel" value="<?php echo $dados['SOC_CEL']; ?>" class="form-control">
          </div>

          <div class="col-md-8 col-sm-12 col-xs-12 form-group">
            <label>e-mail:</label>
            <input type="text" name="email" value="<?php echo $dados['SOC_EMAIL']; ?>" class="form-control">
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
            <input type="text" name="mat" value="<?php echo $dados['SOC_MAT']; ?>" class="form-control">
          </div>

          <div class="col-md-3 col-sm-12 col-xs-12 form-group">
            <label>Profissão:</label>
            <input type="text" name="profissao" value="<?php echo $dados['SOC_PROFISSAO']; ?>" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>PIS:</label>
            <input type="text" name="pis" value="<?php echo $dados['SOC_PIS']; ?>" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>CPF:</label>
            <input type="text" name="cpf" value="<?php echo mascaraCPF($dados['SOC_CPF']); ?>" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>RG/ORG:</label>
            <input type="text" name="rg" value="<?php echo $dados['SOC_RG']; ?>" class="form-control">
          </div>

          <div class="col-md-1 col-sm-12 col-xs-12 form-group">
            <label for="heard">RG/UF:</label>
            <select class="form-control" name="uf">
                 <option value="<?php echo $dados["SOC_UFRG"];?>"><?php echo $dados["SOC_UFRG"];?></option>
                 <?php
                 $resultado = exeBD("SELECT * FROM uf");
                 
                 while($uf = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $uf['UF_NOME'] ?>"><?php echo $uf['UF_NOME'] ?></option>
                  <?php } ?>
              </select>
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>RG/DataExped:</label>
            <input type="date" name="rgexp" value="<?php echo $dados['SOC_DTEXP']; ?>" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>CTPS:</label>
            <input type="text" name="ctps" value="<?php echo $dados['SOC_CTPS']; ?>" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>CTPS/Serie:</label>
            <input type="text" name="ctpsserie" value="<?php echo $dados['SOC_CTPSSERIE']; ?>" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>CTPS/Expedição:</label>
            <input type="date" name="ctpsexp" value="<?php echo $dados['SOC_CTPSEXP']; ?>" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>Titulo:</label>
            <input type="text" name="titulo" value="<?php echo $dados['SOC_TITULO']; ?>" class="form-control">
          </div>

          <div class="col-md-1 col-sm-12 col-xs-12 form-group">
            <label>Zona:</label>
            <input type="text" name="titzona" value="<?php echo $dados['SOC_TITZONA']; ?>" class="form-control">
          </div>

          <div class="col-md-1 col-sm-12 col-xs-12 form-group">
            <label>Seção:</label>
            <input type="text" name="titsecao" value="<?php echo $dados['SOC_TITSE']; ?>" class="form-control">
          </div>

          <div class="col-md-4 col-sm-12 col-xs-12 form-group">
            <label for="heard">Nível/Formação:</label>
            <select class="form-control" name="nivelform">
            <?php
                 $f = $dados['SOC_NIVELFORM'];
                 $form="-";
                 $resultForm = exeBD("SELECT * FROM formacao WHERE FOR_COD LIKE '$f'");

                 while($form = mysqli_fetch_array($resultForm)) { ?>

                 <option value="<?php echo $form["FOR_COD"]; ?>"><?php echo $form["FOR_NOME"]; ?></option>

                 <?php }                 
                 $resultado = exeBD("SELECT * FROM formacao");
                 
                 while($form = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $form['FOR_COD'] ?>"><?php echo $form['FOR_NOME'] ?></option>
                 <?php } ?>
            </select>
          </div>

          <div class="col-md-4 col-sm-12 col-xs-12 form-group">
            <label for="heard">Instituição:</label>
            <select class="form-control" name="instit">
            <?php
                 $i = $dados['SOC_INSTIT'];
                 $inst="-";
                 $resultInst = exeBD("SELECT * FROM instituicao WHERE INS_COD LIKE '$i'");
                 if(mysqli_num_rows($resultInst) < 1) {
                  $inst; ?>
                  
                 <option value="<?php echo $inst; ?>"><?php echo $inst; ?></option>

                 <?php }else{

                 while($inst = mysqli_fetch_array($resultInst)) { ?>

                 <option value="<?php echo $inst["INS_COD"]; ?>"><?php echo $inst["INS_NOME"]; ?></option>

                 <?php }}                 
                 $resultado = exeBD("SELECT * FROM instituicao");
                 
                 while($inst = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $inst['INS_COD'] ?>"><?php echo $inst['INS_NOME'] ?></option>
                 <?php } ?>
            </select>
          </div>

          <div class="col-md-4 col-sm-12 col-xs-12 form-group">
            <label for="heard">Cargo:</label>
            <select class="form-control" name="cargo">
            <?php
                 $c = $dados['SOC_CARGO'];
                 $cargo="-";
                 $resultCargo = exeBD("SELECT * FROM cargos WHERE CAR_COD LIKE '$c'");
                 if(mysqli_num_rows($resultCargo) < 1) {
                  $cargo; ?>
                  
                 <option value="<?php echo $cargo; ?>"><?php echo $cargo; ?></option>

                 <?php }else{

                 while($cargo = mysqli_fetch_array($resultCargo)) { ?>

                 <option value="<?php echo $cargo["CAR_COD"]; ?>"><?php echo $cargo["CAR_NOME"]; ?></option>

                 <?php } }              
                 $resultado = exeBD("SELECT * FROM cargos");
                 
                 while($cargo = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $cargo['CAR_COD'] ?>"><?php echo $cargo['CAR_NOME'] ?></option>
                 <?php } ?>
            </select>
          </div>

          <div class="col-md-6 col-sm-12 col-xs-12 form-group">
            <label for="heard">Lotação:</label>
            <select class="form-control" name="lotacao">
            <?php
                 $l = $dados['SOC_LOTACAO'];
                 $lot="-";
                 $resultLot = exeBD("SELECT * FROM lotacao WHERE LOT_COD LIKE '$l'");
                 if(mysqli_num_rows($resultLot) < 1) {
                  $lot; ?>
                  
                 <option value="<?php echo $lot; ?>"><?php echo $lot; ?></option>

                 <?php }else{

                 while($lot = mysqli_fetch_array($resultLot)) { ?>

                 <option value="<?php echo $lot["LOT_COD"]; ?>"><?php echo $lot["LOT_NOME"]; ?></option>

                 <?php } }                
                 $resultado = exeBD("SELECT * FROM lotacao");
                 
                 while($lot = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $lot['LOT_COD'] ?>"><?php echo $lot['LOT_NOME'] ?></option>
                 <?php } ?>
            </select>
          </div>

          <div class="col-md-6 col-sm-12 col-xs-12 form-group">
            <label for="heard">Cargo de Lotaçao:</label>
            <select class="form-control" name="cargolotac">
            <?php
                 $c = $dados['SOC_CARG_LOTAC'];
                 $cargo="-";
                 $resultCargo = exeBD("SELECT * FROM cargos WHERE CAR_COD LIKE '$c'");
                 if(mysqli_num_rows($resultCargo) < 1) {
                  $cargo; ?>
                  
                 <option value="<?php echo $cargo; ?>"><?php echo $cargo; ?></option>

                 <?php }else{
                 while($cargo = mysqli_fetch_array($resultCargo)) { ?>

                 <option value="<?php echo $cargo["CAR_COD"]; ?>"><?php echo $cargo["CAR_NOME"]; ?></option>

                 <?php }}                 
                 $resultado = exeBD("SELECT * FROM cargos");
                 
                 while($cargo = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $cargo['CAR_COD'] ?>"><?php echo $cargo['CAR_NOME'] ?></option>
                 <?php } ?>
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
            <?php
                 $s = $dados['SOC_SITUAC'];
                 $situac="-";
                 $resultSituac = exeBD("SELECT * FROM situacao WHERE SIT_COD LIKE '$s'");

                 while($situac = mysqli_fetch_array($resultSituac)) { ?>

                 <option value="<?php echo $situac["SIT_COD"]; ?>"><?php echo $situac["SIT_NOME"]; ?></option>

                 <?php }                 
                 $resultado = exeBD("SELECT * FROM situacao");
                 
                 while($situac = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $situac['SIT_COD'] ?>"><?php echo $situac['SIT_NOME'] ?></option>
                 <?php } ?>
            </select>
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>N. Port. Adimissão:</label>
            <input type="text" name="portadmis" value="<?php echo $dados['SOC_PORT_ADMIS']; ?>" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>Data Adimissão:</label>
            <input type="date" name="dtadmissao" value="<?php echo $dados['SOC_DTADMISSAO']; ?>" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>N. Port. Aposetadoria:</label>
            <input type="text" name="portaposent" value="<?php echo $dados['SOC_PORT_APOS']; ?>" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>Data Aposetadoria:</label>
            <input type="date" name="dtaposent" value="<?php echo $dados['SOC_DTAPOSENT']; ?>" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>N. Beneficio:</label>
            <input type="text" name="numbenef" value="<?php echo $dados['SOC_NUM_BENEF']; ?>" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>Data Beneficio:</label>
            <input type="date" name="dtbenef" value="<?php echo $dados['SOC_DTBENEF']; ?>" class="form-control">
          </div>

          <div class="col-md-2 col-sm-12 col-xs-12 form-group">
            <label>Data Falecimento:</label>
            <input type="date" name="dtfalec" value="<?php echo $dados['SOC_DTFALEC']; ?>" class="form-control">
          </div>

          <div class="col-md-8 col-sm-12 col-xs-12 form-group">
            <label for="message">Obs.:(maximo 100 caraquiteres) :</label>
            <textarea id="message" class="form-control" name="mensagem"  value="<?php echo $dados['SOC_OBS']; ?>" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-validation-threshold="10"></textarea>

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