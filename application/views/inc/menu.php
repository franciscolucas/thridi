<!-- menu -->
<input type="hidden" id="url" value="<?= base_url() ?>" />

<head>
<? $this->load->view('inc/head.php') ?>
<script type="text/javascript">
$(document).ready(function($){
	$('#mega-menu-1').dcMegaMenu({
		rowItems: '5',
		speed: 'fast',
		effect: 'slide',
		/*event: 'click',*/
		/*fullWidth: true*/
	});
});
</script>
</head>

<div id="menu">

<div class="demo-container">
<ul id="navlist">
  <li id="face"><a href="http://www.facebook.com/ThridiOficial" target="_blank"></a></li>
  <li id="pin"><a href="http://pinterest.com/thridi/ " target="_blank"></a></li>
  <li id="insta"><a href="http://instagram.com/thridioficial/ " target="_blank"></a></li>
</ul>
<ul id="mega-menu-1" class="mega-menu">
	<li><a href="<?= base_url() ?>quemsomos">A Marca</a>
		<ul>
			<li><a href="<?= base_url() ?>quemsomos">Quem Somos</a>
				<ul>
				</ul>
			</li>
			
		</ul>
	</li> 

	<li><a href="<?= base_url() ?>cuidado">Couro</a>
		<ul>
			<li><a href="<?= base_url() ?>cuidado">Cuidados</a>
				<ul>
				</ul>
			</li>
			<li><a href="<?= base_url() ?>informacao">Informações</a>
			    <ul>
				</ul>
			</li>
			
		</ul>
	</li>  

	<li><a href="<?= base_url() ?>catalogo">Catálogo</a></li>
    
	<li><a href="<?= base_url() ?>campanha">Campanha</a>
		<ul>
			<li><a href="<?= base_url() ?>release">Release</a>
				<ul>
				</ul>
			</li>
			<li><a href="<?= base_url() ?>campanha">Fotos</a>
			    <ul>
				</ul>
			</li>
           
		</ul>
	</li>  
    
    
    <li><a href="<?= base_url() ?>closet">Closet</a></li>
    <!-- <li><a href="<?= base_url() ?>onde">Onde Encontrar</a></li> -->
    <li><a href="<?= base_url() ?>contato">Contato</a></li>  
</ul>



</div>



<div style="height: 1px;"></div>



</div>