<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<? $this->load->view('inc/head.php') ?>
</head>
<body>

<div id="page-container">

<div id="header">
  <div id="menuadmin">
    <ul>
    <li><a href="<?= base_url() ?>admininformacao" class="quemsomos">informacao</a></li>

    </ul>
  </div>

  <div id="clear"></div>

</div>

<div id="contentadmin">
      
<h1>informacao - Cadastrar</h1>

<p align="right"><a href="<?= base_url() ?>admininformacao" title="Voltar" class="criarnovo">Voltar</a></p>

<form method="post" action="<?= base_url() ?>admininformacao/cadastrar/" id="inserir-admininformacao" enctype="multipart/form-data">

<table id="cadastroform">
<tr>
<td class="label"><label for="logo">Imagem</label></td>
<td><input type="file" name="logo" id="logo" class="file-padrao" /></td>
</tr>

<tr>
<td><input type="submit" value="Cadastrar" class="botao" /></td>
</tr>
</table> 
</form>
</div>

</body>
</html>