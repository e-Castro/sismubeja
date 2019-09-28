<HTML>
<HEAD>
 <TITLE>.:: INTRANET - SISMUBEJA ::.</TITLE>
</HEAD>
<BODY>
<?php
include_once 'funcoes.php';
$cod = $_GET['cod'];
?>
<form action="backend/soc_altera_foto.php" method="POST" enctype="multipart/form-data">
<TABLE BORDER="1" ALIGN="CENTER">
       <TR>
          <TD ALIGN="CENTER">
              <?php $sql = exeBD("SELECT * FROM sociosb WHERE SOC_COD LIKE $cod ORDER BY SOC_NOME");
              // Exibe as informações de cada usuário
              while ($usuario = mysqli_fetch_object($sql)) {
              // Exibimos a foto
              echo "<img src='fotos/".$usuario->SOC_FOTO."' width='180' height='200' alt='Foto de exibição'/><br>";
              }?>
          </TD>
      </TR>
      <TR>
          <TD><input type="file" name="foto" /></td>
      </TR>
      <TR>
          <TD ALIGN="CENTER"><input type="text" name="cod2" value="<?PHP echo $cod;?>"/></td>
      </TR>
      <TR>
          <TD align="center">
          <input type="submit" name="BTEnvia" value="Alterar foto">
           </TD>
       </TR>
</TABLE>
</form>
</BODY>
</HTML>
