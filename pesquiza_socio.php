<?php
while ($l = mysqli_fetch_array($resultado)) {
  ?>

  <div class="row">

    <div class="col-md-1 col-sm-12 col-xs-12 form-group">
      <input type="text" name="cbo" value="<?php echo $l['SOC_COD']; ?>" class="form-control" readonly="readonly">
    </div>

    <div class="col-md-4 col-sm-12 col-xs-12 form-group">
      <input type="text" name="cargo" value="<?php echo $l['SOC_NOME']; ?>" class="form-control" readonly="readonly">
    </div>

    <div class="col-md-2 col-sm-12 col-xs-12 form-group">
      <input type="text" name="cargo" value="<?php echo $l['SOC_MAT']; ?>" class="form-control" readonly="readonly">
    </div>

    <div class="col-md-2 col-sm-12 col-xs-12 form-group">
      <input type="text" name="cargo" value="<?php echo $l['SOC_CPF']; ?>" class="form-control" readonly="readonly">
    </div>

    <div class="col-md-2 col-sm-12 col-xs-12 form-group">
      <input type="text" name="cargo" value="<?php echo ConverteData($l['SOC_DTNASC']); ?>" class="form-control" readonly="readonly">
    </div>

    <div class="col-md-1 col-sm-12 col-xs-12 form-group">
      <a href="consult_socios.php?id=<?php echo $l['SOC_COD']; ?>">
        <button type="button" class="btn btn-primary"><i class="fa fa-pencil"></i> Editar</button>
      </a>
    </div>
  </div>
<?php } ?>