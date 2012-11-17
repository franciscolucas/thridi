// JavaScript Document

  $(function() {
  $('.error').hide();
  $('input.text-input').addClass("idleField");
  $('input.text-input').focus(function(){
     $(this).removeClass("idleField").addClass("focusField");  
        if (this.value == this.defaultValue){  
            this.value = '';  
        }  
        if(this.value != this.defaultValue){  
            this.select();  
        } 	
  });
  $('input.text-input').blur(function() {  
        $(this).removeClass("focusField").addClass("idleField");  			
    });  
  
  $('.textarea').addClass("idleField");
  $('.textarea').focus(function(){
    $(this).removeClass("idleField").addClass("focusField"); 
	        if (this.value == this.defaultValue){  
            this.value = '';  
        }  
        if(this.value != this.defaultValue){  
            this.select();  
        } 	
  });
  
  $('.textarea').blur(function() {  
        $(this).removeClass("focusField").addClass("idleField");  
    }); 
  


  $(".button").click(function() {
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
		var assunto = $("input#assunto").val();
		if (assunto == "o assunto..." || assunto == '') {
      $("label#assunto_error").show();
      $("input#assunto").focus();
      return false;
    }
	
	var mensagem = $("#mensagem").val();
	   if (mensagem == "sua mensagem..." || mensagem == '') {
      $("label#mensagem_error").show();
      $("textarea#mensagem").focus();
      return false;
    }
		
		var dataString = 'nome='+ nome + '&email=' + email + '&assunto=' + assunto + '&mensagem=' + mensagem;
		//alert (dataString);return false;
		
		$.ajax({
      type: "POST",
      url: "contato/cadastrar",
      data: dataString,
      success: function() {
		  /*alert ("mensagem enviada com sucesso");*/
          $('#contact_form').fadeOut('slow');  
		  $('.done').fadeIn('slow');

      }
     });
    return false;
	});
});
  
  
