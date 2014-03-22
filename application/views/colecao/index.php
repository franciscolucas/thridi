<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <? $this->load->view('inc/head.php') ?>
        <? $this->load->library('image_lib'); ?>
        <style>
            #wrappercolecao { text-align:center; width:65%; margin:auto auto; max-height:380px; min-height:380px; /*border:solid 1px yellow*/}
            img.colecao:hover { outline: 3px solid #DCC08E; }
            a.imaior {margin:auto auto; text-align:center; vertical-align:middle}
			a.imaior[title] {content: attr(title); background:#0F0}
            #im p img { max-height:58% !important; max-width:70%; /*border:solid 1px #00f;*/ float:left }
			#desc { font-size:10px; /*border:solid 1px #0F0;*/ float:right; width:30%; text-align:justify}
        </style>
        <script type="text/javascript">
            $(document).ready(function() {
                $('a.imaior').click(function () {
                    var url = $(this).attr('href'), 
                    image = new Image();
                    console.log(image.src = url);
                    image.onload = function () {
                        console.log($('#wrappercolecao p').addClass("img").empty().append(image));
                        
                    }
                    return false;
                }); 
                
			    $('a.imaior').click(function () {
                    var desc = $(this).attr('title');
                    $('#desc').empty();
                    console.log($('#wrappercolecao #desc').append(desc));
  					return false;
                }); 
				

          });

        </script>
    </head>

    <body>

        <div id="container">

            <div id="header">
                <div id="logo"><a href="<?= base_url() ?>home"><img src="<?= base_url() ?>assets/site/images/logo.png" width="100" height="50" alt="home"/></a></div>
                <? $this->load->view('inc/menu.php') ?>
            </div>

            <div id="linha"></div>

            <div id="content">
                <div id="wrappercolecao">
                    <div id="im"><p align="center"><img src="http://localhost/thridi/uploads/colecao/Picture1.jpg" alt="colecao" /></p></div>
                    <div align="center" id="desc">Referencia: AJ20<?="<br><br>"?>Descricao: Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.<?="<br><br>"?>Materiais Disponiveis: Camurca</div>
                </div>
                
            </div>

            <div id="linha"></div>

            <div id="wrapperthumb">
                <ul id="slider1">
                    <? 
                    foreach ($colecaos as $row) {
                        
                        $visu = $row->imagem;
                        $ex = $row->imagem;
                        $ex = substr($ex, -3);
                        $row->imagem = substr($row->imagem, 0, strlen($row->imagem) - 4);
                        ?>                                    
                        <li>
                            <a class="imaior" title="Referencia: <?=$row->referencia?><?="<br><br>"?>Descricao: <?=$row->descricao?><?="<br><br>"?>Materiais Disponiveis: <?=$row->material?>" href="<? echo base_url() . 'uploads/colecao/' . $row->imagem . '.jpg'; ?>"><img class="colecao" src="<? echo base_url() . 'uploads/colecao/thumb/' . $row->imagem . '_thumb.jpg'; ?>" alt="coleção"  /></a>
                        </li>  
                    <? } ?>
                </ul>
            </div>

        </div>
        </body>
</html>
    