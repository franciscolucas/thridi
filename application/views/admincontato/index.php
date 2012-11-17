<!-- menu -->
<!--<input type="hidden" id="url" value="<?= base_url() ?>" />-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<? $this->load->library('image_lib');?>
<? $this->load->view('inc/head.php') ?>
</head>

<body>
<div id="container">
<div id="header">
  <div id="menuadmin">
    <ul>
    <li><a href="<?= base_url() ?>adminquemsomos" class="quemsomos">Quem Somos</a></li>
    <li><a href="<?= base_url() ?>adminrelease" class="release">Release</a></li>
    <li><a href="<?= base_url() ?>admincuidado" class="cuidado">Cuidados</a></li>
    <li><a href="<?= base_url() ?>adminonde" class="onde">Onde Encontrar</a></li>
    <li><a href="<?= base_url() ?>admincontato" class="cuidado">Contato</a></li>
    <li><a href="<?= base_url() ?>admincolecao" class="cuidado">Colecao</a></li>
    <li><a href="<?= base_url() ?>admincampanha" class="cuidado">Campanha</a></li>
    <li><a href="<?= base_url() ?>adminclipping" class="cuidado">Clipping</a></li>
    <li><a href="<?= base_url() ?>adminminha" class="cuidado">Minha</a></li>
    <?php if($this->session->userdata('logged')) { ?> <li><a href="<?= base_url() ?>admin/logout" class="cuidado">sair</a></li> <?php } ?> 
    </ul>
  </div>

  <div id="clear"></div>

</div>

  <div id="clear"></div>
<div id="contentadmin">
      
<h1>Meus Contatos</h1>

<table>
    <thead>
        <tr style="border:solid 1px #000">
            <th class="blog" style="border:solid 1px #000">Nome</th>
            <th style="border:solid 1px #000">E-mail</th>
            <th style="border:solid 1px #000">Assunto</th>
            <th style="border:solid 1px #000" class="thumb" width="600">Mensagem</th>
        </tr>
    </thead>
    <tbody>
         <?  foreach($admincontatos as $row){?>        
        <tr style="border:solid 1px #000">
            <td class="thumb" style="border:solid 1px #000"><?=$row->nome?></td>
            <td style="border:solid 1px #000"><?=$row->email?></td>
            <td style="border:solid 1px #000"><?=$row->assunto?></td>
            <td style="border:solid 1px #000" class="titulo" width="600"><?=$row->mensagem?></td>
            <td style="border:solid 1px #000" class="excluir"><a href="javascript:;" title="Deseja excluir item selecionado ?" onclick="modal_confirma_excluir($(this),'admincontato','excluir_contato',<?=$row->id?>)" class="acoes">Excluir</a></td>
        </tr>
  
         <? }?>    
    </tbody>
</table>

</div>

</div>

</body>
</html>