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
    <li><a href="<?= base_url() ?>admincolecao" class="quemsomos">Colecao</a></li>

    </ul>
  </div>

  <div id="clear"></div>

</div>

<div id="contentadmin">
      
<h1>Colecao - Cadastrar</h1>

<p align="right"><a href="<?= base_url() ?>admincolecao" title="Voltar" class="criarnovo">Voltar</a></p>

<form method="post" action="<?= base_url() ?>admincolecao/cadastrar/" id="inserir-admincolecao" enctype="multipart/form-data">

<table id="cadastroform">
<tr>
<td class="label"><label for="referencia">Referencia</label></td>
<td><input type="text" name="referencia" id="referencia" maxlength="10" value="<?= set_value('referencia') ?>" /></td>
</tr>

<tr>
<td class="label"><label for="material">Material</label></td>
<td><input type="text" name="material" id="material" maxlength="250" value="<?= set_value('material') ?>" /></td>
</tr>

<tr>
<td class="label"><label for="Cor">Cor</label></td>
<td><input type="text" name="cor" id="cor" maxlength="250" value="<?= set_value('cor') ?>" /></td>
</tr>

<tr>
<td class="label"><label for="descricao">Descricao</label></td>
<td><textarea name="descricao" cols="25" rows="13" class="descricao" id="descricao"></textarea></td>
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