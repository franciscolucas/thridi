<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<? $this->load->view('inc/head.php') ?>
</head>

<body>
<div id="container">

  <div id="header">
      <div id="logo"><a href="<?= base_url() ?>home"><img src="<?= base_url() ?>assets/site/images/logo.png" width="100" height="50" alt="home"/></a></div>
      <? $this->load->view('inc/menu.php') ?>
  </div>

<div id="linha"></div>
  
  <div id="content">
   <div id="wrapper">
     <? foreach($adminblogs as $row){ ?>
      <!--<div class="titulo"><?php //echo $row->entry_name;?> </div> -->
      <div class="corpo"><?php echo $row->entry_body;?></div>
     <? } ?>
   </div>
 </div>
<div id="linha"></div>
</div>
</body>
</html>