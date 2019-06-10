<?php
include_once 'header.php';
include_once 'menu.php';
include_once 'backend/funcoes.php';
?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Cadastro</h3>
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
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Novo Sócio <small>cadastro</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                  <form action="soc_salvar_cadastro.php" method="POST" enctype="multipart/form-data">
   <p align="center">
    <TABLE ALIGN="CENTER" BORDER="0">
      <TR>
          <TD colspan="6" size="150" bgcolor="blue2"><B>DADOS PESSOAIS:</B></TD>
      </TR>
      <TR >
          <TD>C&oacute;digo:</TD><TD>Nome:</TD><TD></TD><TD></TD><TD></TD>
          <TD rowspan="11">
              <TABLE>
                     <TR>
                         <TD>
                         <TABLE BORDER="1" ALIGN="CENTER">
                                <TR>
                                    <TD>
                                        <img src="images/usu.png" width="180" height="200" alt="" />
                                    </TD>
                                </TR>
                         </TABLE>
                         </TD>
                     </TR>
                     <TR>
                         <TD colspan=2><input type="file" name="foto" /></td>
                     </TR>
              </TABLE>
          </TD>
      </TR>
      <TR>
              <?php 
              $select = exeBD("SELECT * FROM sociosb ORDER BY SOC_COD DESC LIMIT 1"); 
			  $array = mysqli_fetch_array($select);
              $cod = $array['SOC_COD'] + 1;
              ?>
          <TD><input type="text" size="16" name="cod" readonly="readonly" value="<?php echo $cod;?>"></TD>
          <TD COLSPAN="3"><input type="text" size="43" name="nome"></TD>
      </TR>
      <TR>
          <TD>Data Nascimento:</TD><TD></font>Sexo:</TD><TD>Nacionalidade:</TD><TD>Naturalidade:</TD>
      </TR>
      <TR>
          <TD><input type="date" size="16" name="dtnasc"></TD>
          <TD>
              <SELECT name="sex">
                 <?php
                 $result = exeBD("select * from sexo");
                 if(mysqli_num_rows($result) < 1) {
	                exit;
                 }
                 while($sex = mysqli_fetch_array($result)) { ?>
                 <option value="<?php echo $sex['SEX_NOME'] ?>"><?php echo $sex['SEX_NOME'] ?></option>
                  <?php } ?>
              </SELECT>
          </TD>
          <TD colspan=1><input type="text" size="10" name="nacionalid"></TD>
          <TD colspan=1><input type="text" size="10" name="naturalid"></TD>
      </TR>
      <TR>
          <TD>UF Naturalidade:</TD><TD>Estado Civil:</TD><TD>Apelido:</TD>
      </TR>
      <TR>
          <TD>
              <SELECT name="ufnatural">
                 <option value="0">---------</option>
                 <?php
                 $resultado = exeBD("select * from uf");
                 if(mysqli_num_rows($resultado) < 1) {
	                exit;
                 }
                 while($uf = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $uf['UF_UF'] ?>"><?php echo $uf['UF_NOME'] ?></option>
                  <?php } ?>
              </SELECT>
          </TD>
          <TD>
              <SELECT name="estcivil">
                 <option value="0">-----------</option>
                 <?php
                 $resultado = exeBD("select * from estcivil");
                 if(mysqli_num_rows($resultado) < 1) {
                    exit;
                 }
                 while($estc = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $estc['EST_NOME'] ?>"><?php echo $estc['EST_NOME'] ?></option>
                 <?php } ?>
              </SELECT>
           </TD>
           <TD colspan=2><input type="text" size="26" name="apelido"></TD>
      </TR>
      <TR>
          <TD>Pai:</TD><TD></TD></TD><TD></TD><TD></TD>
      </TR>
      <TR>
          <TD colspan="5"><input type="text" size="65" name="pai"></TD>
      </TR>
      <TR>
          <TD>M&atilde;e</TD><TD></TD><TD></TD><TD></TD>
      </TR>
      <TR>
          <TD colspan="5"><input type="text" size="65" name="mae"></TD>
      </TR>
      <TR>
          <TD></TD><TD></TD>
          <TD><BR></TD>
      </TR>
      </TABLE>
      <TABLE ALIGN="CENTER" BORDER="0">
      <TR>
          <TD colspan="6" bgcolor="#FF7F00"><B>ENDERE&Ccedil;O:</B></TD>
      </TR>
      <TR>
          <TD>Logradouro:</TD><TD></TD><TD></TD><TD>N&uacute;mero:</TD>
      </TR>
      <TR>
          <TD colspan=3><input type="text" size="91" name="end"></TD>
          <TD colspan=1><input type="text" size="12" name="num"></TD>

      </TR>
      <TR>
          <TD>Bairro:</TD><TD>Distrito:</TD><TD>Cidade:</TD><TD></TD>
      </TR>
      <TR>
          <TD colspan=1><input type="text" size="35" name="bairro"></TD>
          <TD colspan=1>
             <SELECT name="distrito">
                 <option value="0">--------</option>
                 <?php
                 $resultado = exeBD("select * from distrito");
                 if(mysqli_num_rows($resultado) < 1) {
                    exit;
                 }
                 while($dist = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $dist['DIS_COD'] ?>"><?php echo $dist['DIS_NOME'] ?></option>
                 <?php } ?>
              </SELECT>
          </TD>
          <TD colspan=2><input type="text" size="33" name="cidade"></TD>
      </TR>
      <TR>
          <TD>e-Mail:</TD><TD>CEP:</TD><TD>UF:</TD><TD>Telefone:</TD>
      </TR>
      <TR>
          <TD><input type="text" size="35" name="email"></TD>
          <TD><input type="text" size="28" name="cep"></TD>
          <TD>
              <SELECT name="uf">
                 <option value="0">--------</option>
                 <?php
                 $resultado = exeBD("select * from uf");
                 if(mysqli_num_rows($resultado) < 1) {
	                exit;
                 }
                 while($uf = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $uf['UF_UF'] ?>"><?php echo $uf['UF_NOME'] ?></option>
                  <?php } ?>
              </SELECT>
          </TD>
          <TD><input type="text" size="12" name="tel"></TD>
      </TR>
      <TR>
          <TD>Celular ou Whatsapp:</TD><TD>GAVETA:</TD>
      </TR>
      <TR>
          <TD><input type="text" size="35" name="cel"></TD>
          <TD><input type="text" size="28" name="gaveta"></TD>
      </TR>
      <TR>
          <TD><BR></TD>
      </TR>
      <TR>
          <TD colspan="6" bgcolor="#FF7F00"><B>DOCUMENTA&Ccedil;&Atilde;O:</B></TD>
      </TR>
   </TABLE>
   <TABLE ALIGN="CENTER" BORDER="0">
      <TR>
          <TD>RG/ORG.:</TD><TD>RG/Exprdi&ccedil;&atilde;o:</TD><TD>RG/UF:</TD><TD>CPF:</TD> 
      </TR>
      <TR>
          <TD><input type="text" size="30" name="rg"></TD>
          <TD><input type="date" size="25" maxlength="14" name="rgexp"></TD>
          <TD>
             <SELECT name="ufrg">
                 <option value="0">------</option>
                 <?php
                 $resultado = exeBD("select * from uf");
                 if(mysqli_num_rows($resultado) < 1) {
	                exit;
                 }
                 while($uf = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $uf['UF_UF'] ?>"><?php echo $uf['UF_NOME'] ?></option>
                  <?php } ?>
              </SELECT>
          </TD>
          <TD><input type="text" size="30" maxlength="14" name="cpf" placeholder="000.000.000-00"></TD>
          </TR>
      <TR>
          <TD>CTPS:</TD><TD>Serie:</TD><TD>Expedi&ccedil;&atilde;o:</TD><TD>Profiss&atilde;o:</TD>
      </TR>
      <TR>
          <TD><input type="text" size="30" name="ctps"></TD>
          <TD><input type="text" size="16" name="ctpsserie"></TD>
          <TD><input type="date" size="25" maxlength="14" name="ctpsexp"></TD>
          <TD><input type="text" size="16" name="profissao"></TD>
          </TR>
      <TR>
          <TD>Titulo:</TD><TD>Zona:</TD><TD>Se&ccedil;&atilde;o:</TD><TD>Matricula:</TD>
      </TR>
      <TR>
          <TD><input type="text" size="30" name="titulo"></TD>
          <TD><input type="text" size="16" name="titzona"></TD>
          <TD><input type="text" size="16" name="titsecao"></TD>
          <TD><input type="text" size="30" name="mat"></TD>
      </TR>
      <TR>
          <TD colspan="2">N&iacute;vel/Forma&ccedil;&atilde;o:</TD><TD>PIS:</TD>
      </TR>
      <TR> 
          <TD colspan=2>
              <SELECT name="nivelform">
                 <option value="0">-------</option>
                 <?php
                 $resultado = exeBD("select * from formacao");
                 if(mysqli_num_rows($resultado) < 1) {
	                exit;
                 }
                 while($form = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $form['FOR_COD'] ?>"><?php echo $form['FOR_NOME'] ?></option>
                 <?php } ?>
              </SELECT>
          </TD>
          <TD><input type="text" size="16" name="pis"</TD>
      </TR>
      <TR>
          <TD COLSPAN="2">Institui&ccedil;&atilde;o:</TD><TD>Cargo:</TD>
      </TR>
      <TR>
          <TD COLSPAN=2>
              <SELECT name="instit">
                 <option value="0">-------</option>
                 <?php
                 $resultado = exeBD("select * from instituicao");
                 if(mysqli_num_rows($resultado) < 1) {
	                exit;
                 }
                 while($inst = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $inst['INS_COD'] ?>"><?php echo $inst['INS_NOME'] ?></option>
                  <?php } ?>
              </SELECT>
          </TD>
          <TD COLSPAN=2>
              <SELECT name="cargo">
                 <OPTION VALUE="0">-------</OPTION>
                  <?php
                 $resultados = exeBD("select * from cargos");
                 if(mysqli_num_rows($resultados) < 1) {
	                exit;
                 }
                 while($carg = mysqli_fetch_array($resultados)) { ?>
                 <option value="<?php echo $carg['CAR_COD'] ?>"><?php echo $carg['CAR_NOME'] ?></option>
                 <?php } ?>
              </SELECT>
          </TD>
      <TR>
          <TD>LOTA&Ccedil;&Atilde;O:</TD><TD></TD><TD>CARGO LOTA&Ccedil;&Atilde;O:</TD>
      </TR>
      <TR>
      </TR>
          <TD COLSPAN=2>
              <SELECT name="lotacao">
                 <option value="0">--------</option>
                 <?php
                 $resultado = exeBD("select * from lotacao");
                 if(mysqli_num_rows($resultado) < 1) {
	                exit;
                 }
                 while($instit = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $instit['LOT_COD'] ?>"><?php echo $instit['LOT_NOME'] ?></option>
                  <?php } ?>
              </SELECT>
          </TD>
          <TD COLSPAN=2>
              <SELECT name="cargolotac">
                 <OPTION VALUE="0">-------</OPTION>
                  <?php
                 $resultado = exeBD("select * from cargos");
                 if(mysqli_num_rows($resultado) < 1) {
	                exit;
                 }
                 while($cargo = mysqli_fetch_array($resultado)) { ?>
                 <option value="<?php echo $cargo['CAR_COD'] ?>"><?php echo $cargo['CAR_NOME'] ?></option>
                 <?php } ?>
              </SELECT>
          </TD>
      </TR>
       <TR>
          <TD><BR></TD>
      </TR>
      <TR>
          <TD colspan="6" bgcolor="#FF7F00"><B>SITUA&Ccedil;&Atilde;O DO ASSOCIADO:</B></TD>
      </TR>
      </TABLE>
      <TABLE ALIGN="CENTER" BORDER="0">
      <TR>
          <TD>Situa&ccedil;&atilde;o:</TD><TD>N. Port. Admiss&atilde;o:</TD><TD>Data Admiss&atilde;o:</TD><TD>N. Port. Aposetadoria:</TD><TD>Data Aposentadoria:</TD>
      </TR>
      <TR>
          <TD>
              <SELECT name="sit">
                 <?php
                 $resultad = exeBD("select * from situacao");
                 if(mysqli_num_rows($resultad) < 1) {
	                exit;
                 }
                 while($sit = mysqli_fetch_array($resultad)) { ?>
                 <option value="<?php echo $sit['SIT_COD'] ?>"><?php echo $sit['SIT_NOME'] ?></option>
                  <?php } ?>
              </SELECT>
          </TD>
          <TD><input type="text" size="20" name="portadmis"></TD>
          <TD><input type="date" size="10" name="dtadmissao"></TD>
          <TD><input type="text" size="20" name="portaposent"></TD>
          <TD><input type="date" size="10" name="dtaposent"></TD>
      </TR>
      <TR>
          <TD>N. Beneficio:<TD>Data Beneficio:</TD><TD>Data Falecimento:</TD>
      </TR>
      <TR>
          <TD><input type="text" size="10" name="numbenef"></TD>
          <TD><input type="date" size="10" name="dtbenef"></TD>
          <TD><input type="date" size="10" name="dtfalec"></TD>
      </TR>
      <TR>
          <TD>Obs:</TD>
      </TR>
      <TR>
           <TD COLSPAN="6">
               <textarea name="mensagem" id="mensagem" cols="111" rows="3"></textarea>
           </TD>
      </TR>
   </TABLE>
   <P align="center">
        <input type="checkbox" name="enviar"> Confirmar Cadastro!
        <br>
        <input type="submit" name="BTEnvia" value="Cadastrar">
        <input type="reset" name="BTApaga" value="Limpar">
   </P>      

                    <form class="form-horizontal form-label-left" novalidate>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Confirm Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email2" name="confirm_email" data-validate-linked="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Number <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="number" name="number" required="required" data-validate-minmax="10,100" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Website URL <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="url" id="website" name="website" required="required" placeholder="www.website.com" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Occupation <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="occupation" type="text" name="occupation" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password" class="control-label col-md-3">Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="telephone">Telephone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="tel" id="telephone" name="phone" required="required" data-validate-length-range="8,20" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Textarea <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea id="textarea" required="required" name="textarea" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button type="submit" class="btn btn-primary">Cancel</button>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<?php
include_once 'footer.php';
?>