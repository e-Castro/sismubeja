<?php
while ($l = mysqli_fetch_array($resultado)) {
  ?>
<form action="backend/gravar.php?tb=presenca" method="POST">
  <div class="row">

    <div class="col-md-1 col-sm-12 col-xs-12 form-group">
      <input type="text" name="cod" value="<?php echo $l['SOC_COD']; ?>" class="form-control" readonly="readonly">
    </div>

    <div class="col-md-5 col-sm-12 col-xs-12 form-group">
      <input type="text" value="<?php echo $l['SOC_NOME']; ?>" class="form-control" readonly="readonly">
    </div>

    <div class="col-md-2 col-sm-12 col-xs-12 form-group">
      <input type="text"value="<?php echo $l['SOC_MAT']; ?>" class="form-control" readonly="readonly">
    </div>

    <div class="col-md-2 col-sm-12 col-xs-12 form-group">
    <?php 
        $s = $l['SOC_SITUAC'];
        $situac = "-";
        $resultSituac = exeBD("SELECT * FROM situacao WHERE SIT_COD LIKE '$s'");

        $situac = mysqli_fetch_array($resultSituac)
    ?>
                
      <input type="text" value="<?php echo $situac['SIT_NOME']; ?>" class="form-control" readonly="readonly">
    </div>

    <div class="col-md-1 col-sm-12 col-xs-12 form-group">
        <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Confirmar Presença</button>
    </div>
  </div>
</form>
<?php } ?>