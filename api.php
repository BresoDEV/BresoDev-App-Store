<?php

class INI
{
    /*
    Exemplo de uso:

    $meuini = new INI('config.ini');
    $meuini->Modificar('1002', 'link', 123);

    */
    public $arquiviINI;
    public function __construct($arquivo)
    {
        $this->arquiviINI = $arquivo;
    }
    function Deletar_Chave($chave)
    {
        $config = parse_ini_file($this->arquiviINI, true);
        if (isset($config, $chave)) {
            unset($config[$chave]);

            $inistr = '';
            foreach ($config as $section => $values) {
                $inistr .= "[$section]\n";
                foreach ($values as $key => $value) {
                    $inistr .= "$key = \"$value\"\n";
                }
            }
            file_put_contents($this->arquiviINI, $inistr);
        }
    }

    function Deletar_Sessao($chave, $sessao)
    {
        $config = parse_ini_file($this->arquiviINI, true);
        if (isset($config[$chave][$sessao])) {
            unset($config[$chave][$sessao]);

            $inistr = '';
            foreach ($config as $section => $values) {
                $inistr .= "[$section]\n";
                foreach ($values as $key => $value) {
                    $inistr .= "$key = \"$value\"\n";
                }
            }
            file_put_contents($this->arquiviINI, $inistr);
        }
    }




    function Modificar($chave, $sessao, $valor)
    {
        $config = parse_ini_file($this->arquiviINI, true);

        $config[$chave][$sessao] = $valor;

        $inistr = '';
        foreach ($config as $section => $values) {
            $inistr .= "[$section]\n";
            foreach ($values as $key => $value) {
                $inistr .= "$key = \"$value\"\n";
            }
        }
        file_put_contents($this->arquiviINI, $inistr);
    }

    function Ler($chave, $sessao)
    {
        $config = parse_ini_file($this->arquiviINI, true);
        return $config[$chave][$sessao];
    }

    function Chave_Existe($chave)
    {
        $config = parse_ini_file($this->arquiviINI, true);
        return isset($config[$chave]);
    }

    function Sessao_Existe($chave, $sessao)
    {
        $config = parse_ini_file($this->arquiviINI, true);
        return isset($config[$chave][$sessao]);
    }
    function Contar_Chaves()
    {
        $config = parse_ini_file($this->arquiviINI, true);
        return count($config);
    }

    function Obter_Todas_Chaves()
    {
        /*
        $meuini = new INI('config.ini');
        print_r($meuini->Obter_Todas_Chaves());
        */
        $config = parse_ini_file($this->arquiviINI, true);
        $inistr = [];
        $ind = 0;
        foreach ($config as $section => $values) {
            $inistr[] = $section;
            $ind++;
        }
        return $inistr;
    }

    function Deletar_Tudo()
    {
        file_put_contents($this->arquiviINI, '');
    }

    function Deletar_Sessoes()
    {
        $chaves = $this->Obter_Todas_Chaves();
        foreach ($chaves as $ch) {
            $this->Deletar_Chave($ch);
        }
        $str = '';
        foreach ($chaves as $ch) {
            $str .= '[' . $ch . ']' . PHP_EOL;
        }
        file_put_contents($this->arquiviINI, $str);
    }


}

//$meuini = new INI('apks.ini');
//for ($i = 0; $i < 100; $i++) {
//    $meuini->Modificar($i, "nome",'');
//    $meuini->Modificar($i, "icone",'');
//    $meuini->Modificar($i, "descricao",'');
//    $meuini->Modificar($i, "apk",'');
//    $meuini->Modificar($i, "link",'');
//    $meuini->Modificar($i, "downloads",'');
//    $meuini->Modificar($i, "img1",'');
//    $meuini->Modificar($i, "img2",'');
//    $meuini->Modificar($i, "img3",'');
//}

?>