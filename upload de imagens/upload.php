<?php 
 include_once("config.php");

 echo pathinfo("imagens", PATHINFO_EXTENSION);

    if(isset($_FILES['arquivo'])) {
        $arquivo = $_FILES['arquivo'];

        if($arquivo['error'])
            die("falha ao enviar");


        $pasta = "arquivo/";
        $nomeDoArquivo = $arquivo['name'];
        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));



        $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
        $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);
        if($deu_certo) {
            $mysqli = mysqli_query($conexao, "INSERT INTO geral (nome, path) 
            VALUES ('$nomeDoArquivo', '$path')");
            echo "<p>Arquivo enviado com sucesso</p>";

        } else
                echo "<p>Deu errado</p>";   
    }


?>

<!DOCTYPE html>
<html lang="pt-Br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device=width, initial-scale=1.0">
        <title>Upload de Arquivos</title>

    </head>
    <body>
        <form method="POST" enctype="multipart/form-data" action="">
            <p><label for="">Selecione o Arquivo</label>
            <input name="arquivo" type="file"></p>
            <button name="upload" type="submit">Enviar</button>
        </form>

        <table>
            <thead>
                <th>Visualização</th>
                <th>Nome</th>
            </thead>
            <tbody>
                <tr>
                    <td><img  src="<?php echo $arquivo['path']; ?>" alt=""></td>
                    <td><?php echo $arquivo['name'];?></td>
                </tr>
            </tbody>
        </table>
        <header>
        </header>
    </body>
</html>