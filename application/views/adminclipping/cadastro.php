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
    <li><a href="<?= base_url() ?>adminclipping" class="quemsomos">Clipping</a></li>

    </ul>
  </div>

  <div id="clear"></div>

</div>

<div id="contentadmin">
      
<h1>Clipping - Cadastrar</h1>

<p align="right"><a href="<?= base_url() ?>adminclipping" title="Voltar" class="criarnovo">Voltar</a></p>

<form method="post" action="<?= base_url() ?>adminclipping/cadastrar/" id="inserir-adminclipping" enctype="multipart/form-data">

<table id="cadastroform">
<tr>
<td class="label"><label for="onde">Onde</label></td>
<td><input type="text" name="onde" id="onde" maxlength="10" value="<?= set_value('onde') ?>" /></td>
</tr>

<tr>
<td class="label"><label for="quando">Quando</label></td>
<td><input type="text" name="quando" id="quando" maxlength="250" value="<?= set_value('quando') ?>" /></td>
</tr>


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