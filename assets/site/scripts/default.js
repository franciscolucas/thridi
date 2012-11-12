function modal_confirma_excluir(t,c,f,i){
     
        base = $('base').attr('href');
      /*  t.parents(".acoes").css("z-index","22");*/
        /* t.parents(".tarefas").css("z-index","22");*/
        $('.fade').attr('style', 'display:block;');
        $('.fade').animate({
            opacity:0.6
        });
        $('.fade').fadeIn();
        var texto = t.attr('title');
        $('.confirma_excluir').remove();
        $('<script type="text/javascript">\
					nao_confirma();\
				</script>\
				<div class="confirma_excluir"><p>'+texto+'</p><a href="'+base+c+'/'+f+'/'+i+'" class="sim">Sim</a><input type="button" value="Não" class="confirma-nao" /></div>').insertAfter(t);
       
       $('.confirma_excluir').fadeIn();
}

function nao_confirma(){
    $('.confirma-nao').click(function(){
        $('#header').removeAttr('style');
        $('.confirma_excluir').remove();
    });
}
