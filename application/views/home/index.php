<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<header>
<? $this->load->view('inc/head.php') ?>
</header>

<body>
<div id="container">
    
    <div id="header">
      <div id="logo"><a href="<?= base_url() ?>home"><img src="<?= base_url() ?>assets/site/images/logo.png" width="100" height="50" alt="home"/></a></div>
      <? $this->load->view('inc/menu.php') ?>
    </div>

    <div id="linha"></div>
        
    <div id="wrapper" class="die"><img class="fullwidthw" src="<?= base_url() ?>assets/site/images/thridi_006_HOME.jpg" alt="home"/></div>
    
    <div id="linha"></div>

</div>
<div id="footer"><a href="http://tzadi.com"><img src="<?= base_url() ?>assets/site/images/tzadioff.png" alt="tzadi"/></a></div>
<!-- <div id="footer"><a href="#"><img class="chrome" src="<?= base_url() ?>assets/site/images/chrome.jpeg" alt="chrome" title="works better"/></a></div>
 --></body>
</html>