<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * MÉTODO PARA PEGAR DEMAIS DADOS
 */
if (!function_exists('dadosGerais')) {

    function dadosGerais($data) {
        $CI = & get_instance();
        $data->prev_link = $CI->agent->referrer();
        return $data;
    }

}

function email_interacao($nome = false, $email = false, $assunto = false,$mensagem = false) {
		$ci = & get_instance();
        $ci->load->library('email');
        $config['mailtype'] = 'html';
        $ci->email->initialize($config);
        $ci->email->to('ana.schilling@thridi.com.br');
        $ci->email->from('franlucas.cisco@gmail.com');
        $ci->email->subject('Novo Contato');
		$data->nome = $nome;
		$data->email = $email;
		$data->assunto = $assunto;
        $data->mensagem = $mensagem;
        $email = $ci->load->view('email/email', $data, true);
        $ci->email->message($email);
        $ci->email->send();
    
}


/**
 * Função de DEBUG para os códigos exibindo o print_r de um objeto ou array
 *
 * @access	public
 * @param $string string
 * @return	string
 */
if (!function_exists('debug')) {

    function debug($var, $exit = true) {
        if (is_string($var)) {
            $var = htmlentities($var);
        }
        echo "<pre>";
        print_r($var);
        echo "</pre>";

        if ($exit) {
            exit();
        }
    }

}



/**
 * Gerdor de THUMB para imagens
 *
 * @access	public
 */
if (!function_exists('geraThumbImagem')) {

    function geraThumbImagem($dir, $dir_padrao, $largura, $altura, $nome_imagem) {

        $CI = & get_instance();

        $CI->load->library('image_lib');

        $size = getimagesize($dir . '/' . $nome_imagem);

        $config_img['image_library'] = 'GD2';
        $config_img['source_image'] = $dir . $nome_imagem;
        $config_img['create_thumb'] = FALSE;
        $config_img['maintain_ratio'] = TRUE;
        $config_img['encrypt_name'] = FALSE;
        $config_img['new_image'] = caminho_fisico() . $dir_padrao . $largura . 'x' . $altura . '/' . $nome_imagem;

        if ($size[0] > $size[1]) {
            $config_img['width'] = $largura;
            $config_img['height'] = $size[1];
        } else {
            $config_img['width'] = $size[0];
            $config_img['height'] = $altura;
        }

        $CI->image_lib->initialize($config_img);
        $CI->image_lib->resize();
    }

}


/**
 * Upload de uma imagem para o servidor
 *
 * @access	public
 */
if (!function_exists('uploadImagem')) {

    function uploadImagem($dir, $field, $largura=false, $altura=false) {

        $CI = & get_instance();

        $config['upload_path'] = $dir;
        $config['allowed_types'] = 'gif|jpg|png|swf|jpeg';
        $config['encrypt_name'] = FALSE;
        $config['max_size'] = '200000';
        $config['max_width'] = '10024';
        $config['max_height'] = '7068';

        $CI->load->library('upload', $config);
        $CI->upload->initialize($config);

        $field_name = $field;
        if ($_FILES[$field]['tmp_name'] != '') {
            if ($CI->upload->do_upload($field_name)) {
                $dados = $CI->upload->data();
                if ($largura && $altura) {
                    $CI->load->library('image_lib');

                    $size = getimagesize($dados['full_path']);

                    $config_img['image_library'] = 'GD2';
                    $config_img['source_image'] = $dados['full_path'];
                    $config_img['create_thumb'] = FALSE;
                    $config_img['maintain_ratio'] = TRUE;
                    $config_img['encrypt_name'] = TRUE;

                    if ($size[0] > $size[1]) {

                        if ($size[0] < $largura) {
                            $error = array('error' => 'A Largura da imagem deve ser no mínimo de ' . $largura . 'px');

                            return $error;
                        }

                        $config_img['width'] = $largura;
                        $config_img['height'] = $size[1];
                    } else {

                        if ($size[1] < $altura) {
                            $error = array('error' => 'A Altura da imagem deve ser no mínimo de ' . $altura . 'px');

                            return $error;
                        }

                        $config_img['width'] = $size[0];
                        $config_img['height'] = $altura;
                    }

                    $CI->image_lib->initialize($config_img);
                    $CI->image_lib->resize();
                }
                // Returns the photo name
                return $dados['file_name'];
            } else {
                $error = array('error' => $CI->upload->display_errors());

                return $error;
            }
        } else {
            return FALSE;
        }
    }

}


/**
 * Função para pegar os dados postados e deixamos em formato de URL
 *
 * @access	public
 */
if (!function_exists('arrayToUrlSearch')) {

    function arrayToUrlSearch($array) {
        $url = array();

        foreach ($array as $key => $value) {
            if ($value != '') {
                $value = str_replace('/', '-', $value);
                $url[] = "$key/$value";
            }
        }

        return implode('/', $url);
    }

}
