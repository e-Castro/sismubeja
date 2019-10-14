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
        <h2>Cadastro Novo Bairro</h2>
      </div>
        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              
            </div>
          </div>
        </div>
      </form>
    </div>
      <div class="x_panel">
        <div class="x_title">
          <h2>Bairros</h2>
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
        <?php
        $id = (isset($_GET['id'])) ? $_GET['id'] : 0;
        $resultc = exeBD("SELECT * FROM bairros WHERE BAI_ID='$id'");
        $c = mysqli_fetch_array($resultc);
        ?>
        <div class="x_content">
          <div class="row">
          <form action="backend/bai_altera.php" method="POST">
           
            <div class="col-md col-sm-12 col-xs-12 form-group">
              <input type="hidden" name="id" value="<?php echo $c['BAI_ID']; ?>">
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
              <label>Bairro:</label>
              <input type="text" name="nome" value="<?php echo $c['BAI_NOME']; ?>" class="form-control">
            </div>

            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
              <label>Obs:</label>
              <input type="text" name="obs" value="<?php echo $c['BAI_OBS']; ?>" class="form-control">
            </div>
            <br>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-12 col-xs-12">
              <button type="submit" class="btn btn-primary"><i class="fa fa-clipboard"></i> Gravar</button>
            </div>
          </div>
          </form>
        </div>
      </div>
    <div class="x_panel">
      <div class="x_title">
        <h2>Bairros Cadastrados</h2>
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
      <form action="consult_bairros.php" method="POST">
        <div class="x_content">
          <?php
          $result = exeBD("SELECT * FROM bairros ORDER BY BAI_ID ASC");
          while ($l = mysqli_fetch_array($result)) {
            ?>
            <div class="row">

              <div class="col-md-2 col-sm-12 col-xs-12 form-group">
                <input type="text" name="id" value="<?php echo $l['BAI_ID']; ?>" class="form-control" readonly="readonly">
              </div>

              <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                <input type="text" value="<?php echo $l['BAI_NOME']; ?>" class="form-control" readonly="readonly">
              </div>

              <div class="col-md-5 col-sm-12 col-xs-12 form-group">
                <input type="text" value="<?php echo $l['BAI_OBS']; ?>" class="form-control" readonly="readonly">
              </div>

              <div class="col-md-1 col-sm-12 col-xs-12 form-group">
              <a href="consult_bairros.php?id=<?php echo $l['BAI_ID']; ?>"><button type="button" class="btn btn-primary"><i class="fa fa-pencil"></i> Editar</button></a>
              </div>
            </div>
          <?php } ?>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- /page content -->
<?php
include_once 'footer.php';
?>