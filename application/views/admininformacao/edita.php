edita.php<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
<? $this->load->view('inc/head.php') ?>
<?php include(config_item("caminho_fisico") . "assets/site/ckeditor/ckeditor_php5.php"); ?>
<?
if (!function_exists('ckeditor()')) {
 
    function ckeditor($campo, $value=false) {
        
        $CKEditor = new CKEditor();
        $CKEditor->basePath = base_url() . 'assets/site/ckeditor/';
        $CKEditor->config['width'] = '50%';
        $CKEditor->config['height'] = 500;
        $CKEditor->config['toolbar'] = array(
                 array( 'Source', '-', 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript','Superscript', 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo', 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ),
                 array( 'Image', 'Link', 'Unlink', 'Anchor', 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl', 'Styles','Format','Font','FontSize', 'TextColor','BGColor', 'Maximize', 'ShowBlocks','-','About' )
            );
        $CKEditor->editor($campo, $value);
    }
 
}
?>
</head>
<body>

<div id="container">

<div id="header">
  <div id="menuadmin">
    <ul>
    <li><a href="<?= base_url() ?>adminquemsomos" class="quemsomos">Quem Somos</a></li>
    <li><a href="<?= base_url() ?>adminrelease" class="release">Quem Somos</a></li>
    <li><a href="<?= base_url() ?>admincuidado" class="cuidado">Cuidados</a></li>
    <li><a href="<?= base_url() ?>adminonde" class="onde">Onde Encontrar</a></li>
    <li><a href="<?= base_url() ?>admincontato" class="onde">Contato</a></li>
    </ul>
  </div>

  <div id="clear"></div>

</div>

<div id="contentadmin">
      
<h1>Cuidados - Editar</h1>

<p align="right"><a href="<?= base_url() ?>admincuidado" title="Voltar" class="criarnovo">Voltar</a></p>

<form method="post" action="<?= base_url() ?>admincuidado/atualizar/" id="inserir-admincuidado" enctype="multipart/form-data">
<input type="hidden" name="entry_id" value="<?=$adminblog->entry_id?>" />

<table id="cadastroform">
<tr>
<td><input type="text" name="entry_name" id="entry_name" maxlength="100" value="<?=$adminblog->entry_name?>" /></td>
</tr>

<tr>
<td><?= ckeditor('entry_body', $adminblog->entry_body) ?></td>
</tr>

<tr>
<td><input type="submit" value="Salvar" class="botao" /></td>
</tr>
</table> 
</form>
</div>
</body>
</html>