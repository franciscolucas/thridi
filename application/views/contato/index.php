<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<? $this->load->view('inc/head.php') ?>
</head>

<body>
<div id="container">

  <div id="header">
      <div id="logo"><a href="<?= base_url() ?>home"><img src="<?= base_url() ?>assets/site/images/logo.png" width="100" height="50" alt=		      "home"/></a></div>
      <? $this->load->view('inc/menu.php') ?>
  </div>

<div id="linha"></div>
  
  <div id="content">
  <div id="wrapper">
      <p>Se você deseja obter informações sobre produtos ou gostaria de compartilhar alguma percepção conosco, por favor, complete os campos abaixo e envie sua mensagem.</p>
      
      <div class="done">
      <b>Obrigado!</b> Nós recebemos sua mensagem. 
      </div>
      
      <div id="contact_form" align="center">
        <form name="contact" method="post" action="" >
        <table id="todoform">     
        <tr><td><input name="nome" type="text" size="33" maxlength="1000" class="text-input" id="nome" value="seu nome..."></td></tr>    
        <tr><td><input name="email" type="text" size="33" maxlength="1000" class="text-input" id="email" value="seu e-mail..."></td></tr>        <tr><td><input name="assunto" type="text" size="33" maxlength="1000" class="text-input" id="assunto" value="o assunto..."></td></tr>    
        <tr><td><textarea name="mensagem" cols="25" rows="13" class="textarea" id="mensagem">sua mensagem...</textarea></td></tr>    
        <tr><td align="center"><input name="submit" type="submit" value="ENVIAR" class="button" id="submit_btn"></td></tr> 
        </table>
        </form>
     </div>
  </div>
  </div>
<div id="linha"></div>





</div>

</body>
</html>