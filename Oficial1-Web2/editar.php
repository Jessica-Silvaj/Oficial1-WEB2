<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Estilo -->
    <link rel="stylesheet" href="./estilo/estilo.css" />
    <!-- Bootstrap 5  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- icons -->
    <title>Editar Livro</title>

    <style>
        body {
            background: rgb(238, 174, 202);
            background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);
        }

        .card-Button {
            background-color: #F5F5F5;
            margin: 115px;
            margin-left: 290px;
            margin-right: 290px;
            height: 350px;
            border-radius: 12px;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .input-form {
            width: 590px;
            height: 25px;
            border-radius: 10px;
            margin-top: 10px;
        }

        form {
            text-align: center;
            margin-top: 50px;
        }

        .input-button {
            width: 180px;
            height: 35px;
            margin-top: 10px;
            background-color: #4CAF50;
            border-radius: 12px;
            cursor: pointer;
            display: inline-block;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        h3 {
            margin-top: 30px;
            text-align: center;
        }
    </style>

</head>

<body>
    <div>
        <?php
        include_once './conexaoBD/conexaoBD.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $query = "UPDATE Livros
             SET
            titulo = '" . addslashes($_POST['titulo']) . "',
            sinopse = " . $_POST['sinopse'] . ",
            autor = " . $_POST['autor'] . ",
            preco = " . $_POST['preco'] . ",
            editora = " . $_POST['editora'] . ",
            WHERE id = " . $_POST['id'] . ";";
            // echo $query;
            $conexao->query($query);
            header('Location: index.php');
        }

        $query = "SELECT * FROM Livros  WHERE id = " . $_GET['id'] . ";";
        $livro = $conexao->query($query);
        $livro = $livro->fetch_assoc();
        ?>
        <div class="card-Button">

            <h3>Editar um novo Livro</h3>
            <form method="POST">
                <div>
                    <label>Titulo:</label>
                    <input name="titulo" type="text" class="input-form" required value="<?= $livro['titulo'] ?>" />
                </div>

                <div>
                    <label>Sinopse:</label>
                    <input name="sinopse" type="text" class="input-form" required value="<?= $livro['sinopse'] ?>" />
                </div>

                <div>
                    <label>Autor:</label>
                    <input name="autor" type="text" class="input-form" required value="<?= $livro['autor'] ?>" />
                </div>

                <div>
                    <label>Preço: </label>
                    <input name="preco" type="number" min="0" max="10" step="0.01" class="input-form" required value="<?= $livro['preco'] ?>" />
                </div>

                <div>
                    <label>Editora:</label>
                    <input name="editora" type="text" class="input-form" required value="<?= $livro['editora'] ?>" />
                </div>

                <div>
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>" />
                    <input type="submit" class="input-button" value="Salvar modificação" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>