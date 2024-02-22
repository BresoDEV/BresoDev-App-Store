<?php
include('api.php');

?>

<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    table {
        width: 100%;
    }

    td img {
        max-width: 90%;
        border-radius: 10%;
    }

    button {
        width: 100%;
        border: none;
        border-radius: 5px;
        background-color: #007bff;
        padding: 5px;
        color: aliceblue;
    }

    .ct img {
        max-width: 30%;

    }

    .ct {
        padding: 5px;
        border: 1px solid black;
        border-radius: 5px;
        
    }

    .nul img {
        border-radius: 10%;
    }
    .nul {
        max-width: 90%;
        align-items: center;
        text-align: center;
    }
</style>

<body>
<?php
 
if (isset($_GET['download'])) 
{
    $meuini = new INI('apks.ini');
    $d = $meuini->Ler($_GET['apk'], 'downloads');
    $d++;
    $meuini->Modificar($_GET['apk'], 'downloads', $d);
    sleep(2);
    echo '<script>window.location.href = "'.$meuini->Ler($_GET['apk'], 'apk').'";</script>';
}
?>

    <?php
    $meuini = new INI('apks.ini');

    echo '
<table>
<tr>
<td rowspan="2" style="width:21%;border:none">
<img src="' . $meuini->Ler($_GET['apk'], 'icone') . '">
</td> 
<td style="border:none;font-size:20px"><b>' . $meuini->Ler($_GET['apk'], 'nome') . '</b></td> 
</tr> 
<tr><td style="font-size:12px; border:none"><i>Autor: BresoDEV</i></td></tr> 
<tr><td colspan="2"><hr></td></tr></table> 
<table><tr><th style="font-weight:normal;font-size:13px">Tamanho</th> 
<th style="font-weight:normal;font-size:13px">Downloads</th></tr><tr> 
<th>0.9MB</th> 
<th>' . $meuini->Ler($_GET['apk'], 'downloads') . '</th> 
</tr></table><hr><br><a href="download.php?apk=' . $_GET['apk'] . '&download=' . $_GET['apk'] . '"><button id="dh">Download</button></a><br><hr> 
<table style="padding:4px"><tr><td><b><h3>Sobre:</h3></b></td></tr><tr> 
<td>' . $meuini->Ler($_GET['apk'], 'descricao') . '</td> 
</tr></table><br><div class="ct"><center> 
<img src="' . $meuini->Ler($_GET['apk'], 'img1') . '">
<img src="' . $meuini->Ler($_GET['apk'], 'img2') . '">
<img src="' . $meuini->Ler($_GET['apk'], 'img3') . '">
</div></center><br><br> 

';

    $ultimo = 0;
    $finalizou = true;
    while ($finalizou) {
        if ($meuini->Chave_Existe($ultimo)) {
            if ($meuini->Ler($ultimo, 'nome') !== '') {
                $ultimo++;
            } else {
                $finalizou = false;
            }
        } else {
            $finalizou = false;
        }
    }
    $ultimo--;
    $r1 = rand(0, $ultimo);
    $r2 = rand(0, $ultimo);
    $r3 = rand(0, $ultimo);
    if($r1 == $r2 && $ultimo > $r2)
    {
        $r2++;
    }
    if($r3 == $r2 || $r3 == $r1 )
    {
        if($ultimo > $r3)
        {
            $r3++;
        }
    }
    echo '<center> 
    <div class="ct"><b>Outros apks:</b><br> 
            <table class="nul" border="1"> 
            <tr> 
            <td> <a href="download.php?apk=' . $r1 . '"><img src="' . $meuini->Ler($r1, 'icone') . '" style="width:100px;max-width:100px"> </a> </td> 
            <td> <a href="download.php?apk=' . $r2 . '"><img src="' . $meuini->Ler($r2, 'icone') . '" style="width:100px;max-width:100px"> </a> </td> 
            <td> <a href="download.php?apk=' . $r3 . '"><img src="' . $meuini->Ler($r3, 'icone') . '" style="width:100px;max-width:100px"> </a> </td> 
            </tr> 
            <tr> 
            <td>' . $meuini->Ler($r1, 'nome') . '</td> 
            <td>' . $meuini->Ler($r2, 'nome') . '</td> 
            <td>' . $meuini->Ler($r3, 'nome') . '</td> 
            </tr></table></div></center> 
    ';


    ?>


</body>

<script>

</script>

</html>