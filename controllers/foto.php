<?php
/* Classe de tratamento de foto
*   Autor: karl Gama    
*   Data de criação: 15/12/19
*   Modificações:
*   Nome: 
*   Modificações:
*/

class foto
{
    
    public function __contrutct()
    {

    }
    public function validaFoto()
    {
        //se não houver foto dentro do file, não segue com o tratamento
        if($_FILES['flefoto']['name'] == "")
            return false;
        //confirma se o arquivo de foto chegou
        else if($_FILES['flefoto']['size'] > 0 && $_FILES['flefoto']['type'] != "")
        {
            //informações referentes ao arquivo da foto
            $arquivo_size = $_FILES['flefoto']['size'];
            $tamanho_arquivo = round($arquivo_size/1024);
            $arquivos_permitidos = array("image/jpeg","image/jpg", "image/png");
            $ext_arquivo = $_FILES['flefoto']['type'];

            //válida o tipo de arquivo
            if(in_array($ext_arquivo, $arquivos_permitidos))
            {
                if($tamanho_arquivo < 1000) 
                {
                    //retorna nome do arquivo
                    $nome_arquivo = pathinfo($_FILES['flefoto']['name'], PATHINFO_FILENAME);
                    $ext = pathinfo($_FILES['flefoto']['name'], PATHINFO_EXTENSION);
                    $nome_arquivo_cripty = md5(uniqid(time()).$nome_arquivo);
                    
                    $foto = $nome_arquivo_cripty.".".$ext;
                    $arquivo_temp = $_FILES['flefoto']['tmp_name'];

                    $diretorio = "./uploads/";

                    if(move_uploaded_file($arquivo_temp, $diretorio.$foto))
                        return $diretorio.$foto;
                    else
                        echo('Erro ao fazer upload da foto');
                }else
                    echo('tamanho da foto não permitido');
            }echo('formato do arquivo não permitido');

        }else
            echo ('Arquivo não recebido');
    } 
}
?>