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
    <li><a href="<?= base_url() ?>admininformacao" class="cuidado">Informacao</a></li>
    <li><a href="<?= base_url() ?>admincatalogo" class="cuidado">Catalogo</a></li>
    <li><a href="<?= base_url() ?>admincloset" class="cuidado">Closet</a></li>
    <?php if($this->session->userdata('logged')) { ?> <li><a href="<?= base_url() ?>admin/logout" class="cuidado">sair</a></li> <?php } ?> 
    </ul>
  </div>

  <div id="clear"></div>

</div>

  <div id="clear"></div>

<div id="contentadmin">
      
<h1>Catalogo</h1>
                    
<p align="right"><a href="<?= base_url() ?>catalogo/" title="Ver catalogo" class="criarnovo" target="_blank">Visualizar catalogo</a></p>
<p align="right"><a href="<?= base_url() ?>admincatalogo/cadastro" title="Cadastrar imagem" class="criarnovo">Cadastrar Imagem</a></p>


<table>
    <thead>
        <tr>
            <th class="thumb">Imagem</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?  foreach($admincatalogos as $row){?>
            <?php 
              $config['image_library'] = 'gd2';
              $config['source_image'] = 'uploads/catalogo/'.$row->imagem;
              $config['new_image'] = 'uploads/catalogo/thumb/';
              $config['create_thumb'] = TRUE;
              $config['maintain_ratio'] = TRUE;
              $config['width']	 = 150;
              $config['height']	= 80;
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
                    <td class="thumb"><img src="<?= base_url().'uploads/catalogo/thumb/'.$row->imagem.'_thumb.png'; ?>"  /></td>
				<? }?>
                
				<? if ($ex == 'PNG'){?>
                    <td class="thumb"><img src="<?= base_url().'uploads/catalogo/thumb/'.$row->imagem.'_thumb.PNG'; ?>"  /></td>
				<? }?>
                
				<? if ($ex == 'gif'){?>
                    <td class="thumb"><img src="<?= base_url().'uploads/catalogo/thumb/'.$row->imagem.'_thumb.gif'; ?>"  /></td>
				<? }?>
                
				<? if ($ex == 'GIF'){?>
                    <td class="thumb"><img src="<?= base_url().'uploads/catalogo/thumb/'.$row->imagem.'_thumb.GIF'; ?>"  /></td>
				<? }?>
                
				<? if ($ex == 'jpg'){?>
                    <td class="thumb"><img src="<?= base_url().'uploads/catalogo/thumb/'.$row->imagem.'_thumb.jpg'; ?>"  /></td>
				<? }?> 
                
				<? if ($ex == 'JPG'){?>
                    <td class="thumb"><img src="<?= base_url().'uploads/catalogo/thumb/'.$row->imagem.'_thumb.JPG'; ?>"  /></td>
				<? }?>             
            
            <td class="colecao"><a href="javascript:;" title="Deseja excluir item selecionado?" class="acoes" onclick="modal_confirma_excluir($(this),'admincatalogo','excluir_catalogo',<?=$row->id?>)">Excluir</a></td>
        </tr>
        <? }?>
       
    </tbody>
</table>



</div>

</div>

</body>
</html>