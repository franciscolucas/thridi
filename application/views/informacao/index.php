<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <? $this->load->view('inc/head.php') ?>
        <? $this->load->library('image_lib'); ?>
        <style>
            #wrappercolecao { text-align:center; width:65%; margin:auto auto; max-height:380px; min-height:380px; /*border:solid 1px yellow*/}
            img.colecao:hover { outline: 3px solid #DCC08E; }
            a.imaior {margin:auto auto; text-align:center; vertical-align:middle}
            #im p img { max-height:390px; max-width:100%; }
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
                $("a#anima1").fancybox({
                'titleShow'     : false
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


            <div id="wrapperthumb">

                    <? 
                    foreach ($informacaos as $row) {
                        
                        $visu = $row->imagem;
                        $ex = $row->imagem;
                        $ex = substr($ex, -3);
                        $row->imagem = substr($row->imagem, 0, strlen($row->imagem) - 4);
                        ?>                                    

                            <a class="imaior" id="anima1" title="<?=$row->imagem?>" href="<? echo base_url() . 'uploads/informacao/' . $row->imagem . '.jpg'; ?>">
                           <div style="width:120px; height:105px; text-align:center; display:inline-block; margin:0 10px 10px 0;">
                            <img class="colecao" src="<? echo base_url() . 'uploads/informacao/thumb/' . $row->imagem . '_thumb.jpg'; ?>" alt="informacao"  /></a>
                           </div>
                    <? } ?>        
            </div>

        </div>
        </body>
</html>
    