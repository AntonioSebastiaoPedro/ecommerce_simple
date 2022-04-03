<?php
namespace Src\Classes;

class Upload{
    //diretório para salvar as imagens
    //public static $diretorio;

    public static function UpOthersImgs($diretorio, $campo){
        //Verificar a existência do diretório para salvar as imagens e informa se o caminho é um diretório
        if(!is_dir($diretorio)){ 
            mkdir($diretorio);
        }else{
            $arquivo = isset($campo) ? $campo : FALSE;
            //loop para ler as imagens
            for ($i = 0; $i < count($arquivo['name']); $i++){ 
                $destino = $diretorio.$arquivo['name'][$i];
                //realizar o upload da imagem em php
                //move_uploaded_file — Move um arquivo enviado para uma nova localização
                if(move_uploaded_file($arquivo['tmp_name'][$i], $destino)){

                }else{
                    return false;
                }        
            }

        }
    }

    public static function UpImg($caminho, $campo){
        if(!is_dir($caminho)){ 
            mkdir($caminho);
        }else{
            $arquivo = $caminho . basename($campo['name']);
            $extensao = strtolower(pathinfo($arquivo, PATHINFO_EXTENSION));
            
            $check = getimagesize($campo["tmp_name"]);
            if($check !== false) {
                if(move_uploaded_file($campo["tmp_name"], $arquivo)) {
                    return true;
                } 
            } else {
                return false;
            }
        }
    }
}