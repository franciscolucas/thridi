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
      
<h1>Quem Somos</h1>
                    
<p align="right"><a href="<?= base_url() ?>quemsomos/" title="Ver quem somos" class="criarnovo" target="_blank">Visualizar Quem Somos</a></p>

<table>
    <thead>
        <tr>
            <th class="blog"><!--Título do post--></th>
            <th</th>
        </tr>
    </thead>
    <tbody>
          <?  foreach($adminblogs as $row){?>      
        <tr>
            <td class="titulo"><?=$row->entry_name?></td>
            <td><a href="<?= base_url() ?>adminquemsomos/editar/<?=$row->entry_id?>" class="acoes">Editar</a></td>
        </tr>
    
      <?  }?>     
    </tbody>
</table>


<br/><br/><br/>

<form method="post" action="<?= base_url() ?>adminquemsomos/cadastrarimagem/" id="inserir-blog" enctype="multipart/form-data">

<table id="cadastroform">
<tr>
<td class="label"><label for="logo"><h1>Imagens</h1></label></td>
</tr>
<tr>
<td><input type="file" name="logo" id="logo" class="file-padrao" /></td>
</tr>
<tr>
<td><input type="submit" value="Cadastrar" class="botao" /></td>
</tr>
</table>  
</form>




<table>
<thead>
<tr>
        <th class="blog"><!--Imagem--></th>
        <th></th>
</tr>
</thead>

<tbody style="vertical-align:middle" style="float:left">
                <?  foreach($allimagem as $row){?>
                   <?php 
                      $config['image_library'] = 'gd2';
                      $config['source_image'] = 'uploads/adminblog/'.$row->imagem;
                      $config['new_image'] = 'uploads/adminblog/thumb/';
                      $config['create_thumb'] = TRUE;
                      $config['maintain_ratio'] = TRUE;
                      $config['width']	 = 100;
                      $config['height']	= 70;
                      $this->image_lib->initialize($config);
                      $this->load->library('image_lib', $config); 
                      $this->image_lib->resize();  
					  $visu = $row->imagem;
					  $ex = $row->imagem;
					  $ex = substr($ex, -3);
                      $row->imagem = substr($row->imagem,0,strlen($row->imagem)-4);

  			      ?>  
<tr>
				<? if ($ex == 'png'){?>
                    <td class="thumb"><a href="<? base_url()?>uploads/adminblog/<?=$visu ?>" target="_blank">  <img src="<? echo base_url().'uploads/adminblog/thumb/'.$row->imagem.'_thumb.png'; ?>"  /></a></td>
				<? }?>
                
				<? if ($ex == 'PNG'){?>
                    <td class="thumb"><a href="<? base_url()?>uploads/adminblog/<?=$visu ?>" target="_blank">  <img src="<? echo base_url().'uploads/adminblog/thumb/'.$row->imagem.'_thumb.png'; ?>"  /></a></td>
				<? }?>
                
				<? if ($ex == 'gif'){?>
                    <td class="thumb"><a href="<? base_url()?>uploads/adminblog/<?=$visu ?>" target="_blank"><img src="<? echo base_url().'uploads/adminblog/thumb/'.$row->imagem.'_thumb.gif'; ?>"  /></a></td>
				<? }?>
                
				<? if ($ex == 'GIF'){?>
                    <td class="thumb"><a href="<? base_url()?>uploads/adminblog/<?=$visu ?>" target="_blank"><img src="<? echo base_url().'uploads/adminblog/thumb/'.$row->imagem.'_thumb.gif'; ?>"  /></a></td>
				<? }?>
                
				<? if ($ex == 'jpg'){?>
                    <td class="thumb"><a href="<? base_url()?>uploads/adminblog/<?=$visu ?>" target="_blank"><img src="<? echo base_url().'uploads/adminblog/thumb/'.$row->imagem.'_thumb.JPG'; ?>"  /></a></td>
				<? }?> 
				<? if ($ex == 'JPG'){?>
                    <td class="thumb"><a href="<? base_url()?>uploads/adminblog/<?=$visu ?>" target="_blank"><img src="<? echo base_url().'uploads/adminblog/thumb/'.$row->imagem.'_thumb.JPG'; ?>"  /></a></td>
				<? }?> 
                                           			
</tr>
                <? }?>
</tbody>

</table>







</div>

</div>

</body>
</html>