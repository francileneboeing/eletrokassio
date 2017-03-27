<?php

class UploadImagem {

    private   $width; 
    private   $height; 
    private   $name;
    private   $directory;
    private   $extension;
    protected $tipos = array("jpeg", "png", "gif", "jpg"); // Nossos tipos de imagem disponíveis para este exemplo

// Função que irá redimensionar nossa imagem

    protected function redimensionar($caminho, $nomearquivo) {
// Determina as novas dimensões
        $width = $this->width;
        $height = $this->height;

// Pegamos a largura e altura originais, além do tipo de imagem
        list($width_orig, $height_orig, $tipo, $atributo) = getimagesize($caminho . $nomearquivo);
        echo $caminho . $nomearquivo;

// Se largura é maior que altura, dividimos a largura determinada pela original e multiplicamos a altura pelo resultado, para manter a proporção da imagem
//        if ($width_orig > $height_orig) {
//            //$height = ($width / $width_orig) * $height_orig;
//            $height = ($width / $width_orig) * $height_orig;
//// Se altura é maior que largura, dividimos a altura determinada pela original e multiplicamos a largura pelo resultado, para manter a proporção da imagem
//        } elseif ($width_orig < $height_orig) {
//            $width = ($height / $height_orig) * $width_orig;
//        } // -> fim if
        echo $width. '. altura: '.$height;
// Criando a imagem com o novo tamanho
        $novaimagem = imagecreatetruecolor($width, $height);
        switch ($tipo) {

// Se o tipo da imagem for gif
            case 1:
// Obtém a imagem gif original
                $origem = imagecreatefromgif($caminho . $nomearquivo);
// Copia a imagem original para a imagem com novo tamanho
                imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
// Envia a nova imagem gif para o lugar da antiga
                imagegif($novaimagem, $caminho . $nomearquivo);
                break;

// Se o tipo da imagem for jpg
            case 2:
// Obtém a imagem jpg original
                $origem = imagecreatefromjpeg($caminho . $nomearquivo);
// Copia a imagem original para a imagem com novo tamanho
                imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
// Envia a nova imagem jpg para o lugar da antiga
                imagejpeg($novaimagem, $caminho . $nomearquivo);
                break;

// Se o tipo da imagem for png
            case 3:
// Obtém a imagem png original
                $origem = imagecreatefrompng($caminho . $nomearquivo);
// Copia a imagem original para a imagem com novo tamanho
                imagecopyresampled($novaimagem, $origem, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
// Envia a nova imagem png para o lugar da antiga
                imagepng($novaimagem, $caminho . $nomearquivo);
                break;
        } // -> fim switch
// Destrói a imagem nova criada e já salva no lugar da original
        imagedestroy($novaimagem);
// Destrói a cópia de nossa imagem original
        imagedestroy($origem);
    }

// -> fim function redimensionar()

    protected function tirarAcento($texto) {
        // array com letras acentuadas
        $com_acento = array('à', 'á', 'â', 'ã', 'ä', 'å', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ù', 'ü', 'ú', 'ÿ', 'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ñ', 'Ò', 'Ó', 'Ô', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'O', 'Ù', 'Ü', 'Ú', 'Ÿ',);
        // array com letras correspondentes ao array anterior, porém sem acento
        $sem_acento = array('a', 'a', 'a', 'a', 'a', 'a', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'y', 'A', 'A', 'A', 'A', 'A', 'A', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'Y',);
        // procuramos no nosso texto qualquer caractere do primeiro array e substituímos pelo seu correspondente presente no 2º array
        $final = str_replace($com_acento, $sem_acento, $texto);
        // array com pontuação e acentos
        $com_pontuacao = array('´', '`', '¨', '^', '~', ' ', '-');
        // array com substitutos para o array anterior
        $sem_pontuacao = array('', '', '', '', '', '_', '_');
        // procuramos no nosso texto qualquer caractere do primeiro array e substituímos pelo seu correspondente presente no 2º array
        $final = str_replace($com_pontuacao, $sem_pontuacao, $final);
        // retornamos a variável com nosso texto sem pontuações, acentos e letras acentuadas
        return $final;
    }

// -> fim function tirarAcento()
// Função que irá fazer o upload da imagem
    public function salvar($file) {
        $caminho = $this->directory;
        if ($this->getExtension() !== null){
            $extensao = $this->getExtension();
        }else{
            $extensao_aux = explode('.', $file['name']);
            $extensao = end($extensao_aux);
        }
        
        if ($this->getNome() !== null){
            $file['name'] = $this->getNome().'.'.$extensao;
        }else{
            $file['name'] = "UPANDO.".$extensao;
        }        
        $uploadfile = $caminho . $file['name'];
        $tipo_arr = explode('/', $file['type']);
        $tipo = strtolower(end($tipo_arr));
        if (array_search($tipo, $this->tipos) === false) {
            $mensagem = "<font color='#F00'>Envie apenas imagens no formato jpeg, png ou gif!</font>";
            return $mensagem;
        }else if (!move_uploaded_file($file['tmp_name'], $uploadfile)) {
            switch ($file['error']) {
                case 1:
                    $mensagem = "<font color='#F00'>O tamanho do arquivo é maior que o tamanho permitido.</font>";
                    break;
                case 2:
                    $mensagem = "<font color='#F00'>O tamanho do arquivo é maior que o tamanho permitido.</font>";
                    break;
                case 3:
                    $mensagem = "<font color='#F00'>O upload do arquivo foi feito parcialmente.</font>";
                case 4:
                    $mensagem = "<font color='#F00'>Não foi feito o upload de arquivo.</font>";
                    break;
            }
        }else {
            list($width_orig, $height_orig) = getimagesize($uploadfile);
            if ($width_orig > $this->width || $height_orig > $this->height) {
                //$this->redimensionar($caminho, $file['name']);
            }
            $mensagem = "<a href='" . $uploadfile . "'><font color='#070'>Upload realizado com sucesso!</font><a>";
        } 
    }
    
    function setWidth($width){
        $this->width = $width;
    }
    
    function getWidth(){
        return $this->width;
    }
    
    function setHeight($height){
        $this->height = $height;                
    }
    
    function getHeight(){
        return $this->height;                
    }  
    
    public function setName($name){
        $this->name = $name;                
    }
    
    public function getNome(){
        return $this->name;                
    }  
    
    function setDirectory($directory){
        $this->directory = $directory;                
    }
    
    public function getDirectory(){
        return $this->directory;                
    } 
    
    public function getExtension(){
        return $this->extension;                
    }
    
    public function setExtension($extension){
        $this->extension = $extension;                
    }
    
    public function getAbolustePath(){
        return $this->getDirectory().$this->getNome().'.'.$this->getExtension();
    }
}

?>