<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<? //$this->load->view('inc/head.php') ?>
<style>
#todoforminha {	margin-top:40px; font-family:Helvetica; width:90% }
#todoforminha td {	padding-top:6px;font-size:13px;font-family:Helvetica, sans-serif;}
#todoforminha td.comentario {vertical-align: top;font-family:Helvetica, sans-serif;}
#contact_forminha {margin: auto auto}
input.button2 {background:#6F615E;color:#E9E0B9;border:1px solid #ffffff;font-size:13px;margin-right:20px;padding-top: 2px;padding-bottom:2px;padding-left:4px;padding-right:4px;font-family:Helvetica; font-weight:bold}
#arquivo           {background:#ffffff;width:98%;font-family:Arial, Helvetica, sans-serif;font-size:13px;}
#comentario           {background:#ffffff;width:98%;font-family:Arial, Helvetica, sans-serif;font-size:13px;}
.focusField2{  border:solid 2px #73A6FF;  background:#EFF5FF;  color:#000;  }  
.idleField2{  background:#EEE;  color: #6F6F6F;  border: solid 2px #DFDFDF;  }
.done2 {/*background:url(iconIdea.gif) no-repeat 2px; */padding-left:20px;font-family:arial;font-size:12px; width:70%; margin:20px auto; display:none}
</style>

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
      <p>Voc&ecirc; tem d&uacute;vidas de como usar sua Thridi?  Precisa de ajuda para montar um 
look especial com nossos produtos?  Nos envie uma foto, fale um pouco sobre seu estilo 
e sobre como gostaria que este look fosse.</p>
       <p align="right" style="margin-top:15px">Contate nossa equipe de estilo!</p>
      
      
      <div id="contact_forminha" align="center">
        <form method="post" action="<?= base_url() ?>minhathridi/cadastrar/" id="inserir-minha" enctype="multipart/form-data">
        <table id="todoforminha">     
        <tr><td><input name="nome" type="text" size="33" maxlength="1000" class="inputminha" id="nome" value="seu nome..."></td></tr>    
        <tr><td><input name="email" type="text" size="33" maxlength="1000" class="inputminha" id="email" value="seu e-mail..."></td></tr>        <tr><td>Clique para anexar sua foto<input type="file" name="arquivo" id="arquivo" class="file-padrao"/></td></tr>    
        <tr><td><textarea name="comentario" cols="25" rows="13" class="textareaminha" id="comentario">seu coment&aacute;rio...</textarea></td></tr>    
        <tr><td align="center"><input name="submit" type="submit" value="ENVIAR" class="button2" id="submit_btn2"></td></tr> 
        
        </table>
        </form>
     </div>
  </div>
  </div>
<div id="linha"></div>

<script type="text/javascript">
// JavaScript Document

  $(function() {
  $('.error').hide();
  $('input.inputminha').addClass("idleField2");
  $('input.inputminha').focus(function(){
     $(this).removeClass("idleField2").addClass("focusField2");  
        if (this.value == this.defaultValue){  
            this.value = '';  
        }  
        if(this.value != this.defaultValue){  
            this.select();  
        } 	
  });
  $('input.inputminha').blur(function() {  
        $(this).removeClass("focusField2").addClass("idleField2");  			
    });  
  
  $('.textareaminha').addClass("idleField2");
  $('.textareaminha').focus(function(){
    $(this).removeClass("idleField2").addClass("focusField2"); 
	        if (this.value == this.defaultValue){  
            this.value = '';  
        }  
        if(this.value != this.defaultValue){  
            this.select();  
        } 	
  });
  
  $('.textarea').blur(function() {  
        $(this).removeClass("focusField2").addClass("idleField2");  
    }); 
  
  $(".button2").click(function() {
		// validate and process form
		// first hide any error messages
    $('.error').hide();
		
	  var nome = $("input#nome").val();
		if (nome == "seu nome..."  || nome == '') {
      $("label#nome_error").show();
      $("input#nome").focus();
      return false;
    }
		var email = $("input#email").val();
		if (email == "seu e-mail..." || email == '') {
      $("label#email_error").show();
      $("input#email").focus();
      return false;
    }
		var logo = $("input#logo").val();
		if (logo == "o logo..." || assunto == '') {
      $("label#logo_error").show();
      $("input#logo").focus();
      return false;
    }
	
	var comentario = $("#comentario").val();
	   if (comentario == "seu coment&aacute;rio..." || mensagem == '') {
      $("label#comentario_error").show();
      $("textarea#comentario").focus();
      return false;
    }


	});
});
</script>



</div>

</body>
</html>