<?php
include('api.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fake App Store</title>
    <style>
        body {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }

        header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 1px;
        }

        section {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .app {
            width: 300px;
            margin: 20px;
            padding: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
            column-gap: 2;
        }

        img {
            max-width: 70px;
            border-radius: 5px;
        }

        button {
            width: 100%;
            border-radius: 5px;
            background-color: #007bff;
            color: aliceblue;
            padding: 6px;
            border: none;
            margin-top: 3px;
        }

        p {
            color: rgb(89, 89, 89);
        }
    </style>
</head>

<body>

    <header>
        <h5>BresoDEV App Store</h5>
    </header>

    <section id="card">


        <?php
        $meuini = new INI('apks.ini');
        for ($i = 0; $i < 100; $i++) {
            if($meuini->Chave_Existe($i))
            {
                if($meuini->Ler($i,'link') !== '')
                {
                    if($meuini->Ler($i,'apk') !== '')
                    {
                        echo '<div class="app">
                        <img src="'.$meuini->Ler($i,'icone').'" >
                        <h3>'.$meuini->Ler($i,'nome').'</h3>
                        <p>'.$meuini->Ler($i,'descricao').' </p>
                        <a href="download.php?apk='.$i.'"><button>Download APK</button></a>
                        <a href="'.$meuini->Ler($i,'link').'"><button>Acessar</button></a>
                        </div>';
                    }
                    else{
                        echo '<div class="app">
                    <img src="'.$meuini->Ler($i,'icone').'" >
                    <h3>'.$meuini->Ler($i,'nome').'</h3>
                    <p>'.$meuini->Ler($i,'descricao').' </p>
                    <a href="'.$meuini->Ler($i,'link').'"><button>Acessar</button></a>
                    </div>';
                    }
                }
                else if($meuini->Ler($i,'apk') !== '')
                {
                    echo '<div class="app">
                    <img src="'.$meuini->Ler($i,'icone').'" >
                    <h3>'.$meuini->Ler($i,'nome').'</h3>
                    <p>'.$meuini->Ler($i,'descricao').' </p>
                    <a href="download.php?apk='.$i.'"><button>Download APK</button></a>
                    </div>';
                }
            }

        }

        ?>

    </section>


    <script>


    </script>

</body>

</html>