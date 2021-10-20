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
    <title>Livraria Hogwarts</title>
    <style>
        .card-Button {
            background-color: #F5F5F5;
            margin: 15px;
            margin-left: 90px;
            margin-right: 90px;
            height: 60px;
            border-radius: 12px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
        }

        .card {
            background-color: #F5F5F5;
        }

        .botao {
            margin-top: 10px;
            margin-left: 10px;
        }

        h4 {
            font-family: "Goudy Bookletter 1911", sans-serif;
            font-weight: bold;
            margin-top: 10px;
            font-size: 26px;
        }

        .a {
            margin-left: 30px;
        }

        body {
            background: rgb(238, 174, 202);
            background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);
        }

        .card {
            background-color: #F5F5F5;
            margin: 35px;
            margin-left: 90px;
            margin-right: 90px;
            height: 450px;
            border-radius: 12px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
           
        }

        .form{
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="card-Button">
        <a class="btn btn-success botao" href="./cadastrar.php">Cadastar</a>
    </div>

    <?php
    include_once './conexaoBD/conexaoBD.php';

    if (!empty($_GET['id'])) {
        $query = "DELETE FROM Livros WHERE id = " . $_GET['id'] . ";";
        $conexao->query($query);
    }

    $query = "SELECT * FROM Livros";
    $listaLivros = $conexao->query($query);

    if (!$listaLivros->num_rows == 0) {
        echo '
        <div class="card">  
    <div class="tabelaLivro">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="center">#</th>
                    <th scope="col">TITULO</th>
                    <th scope="col">SINOPSE</th>
                    <th scope="col">AUTOR</th>
                    <th scope="col">PREÇO</th>
                    <th scope="col">EDITORA</th>
                    <th scope="col">OPÇÕES</th>
                </tr>
            </thead>
            <tbody>';


        while ($livros = $listaLivros->fetch_assoc()) {
            echo '
                        <tr>
                        <td>' . $livros['id'] . '</td>
                        <td>' . $livros['titulo'] . '</td>
                        <td>' . $livros['sinopse'] . '</td>
                        <td>' . $livros['autor'] . '</td>
                        <td>' . $livros['preco'] . '</td>
                        <td>' . $livros['editora'] . '</td>
                        <td>
                        <a href="./editar.php?id=' . $livros['id'] . '"class="btn btn-success btn-sm">Editar</a>
                        <a href="#" onclick="excluir(' . $livros['id'] . ')"class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                        </tr>
                        ';
        }
    } else {
        echo '<h3 class="erro" styler="text-align:center;">Não tem registro no banco</h3>';
    }
    ?>
    </tbody>
    </table>
    </div>
</div>

    <script type="text/javascript">
        function excluir(id) {
            if (confirm("Deseja realmente apagar esse Livro?")) {
                window.location = '?id=' + id;
            }
        }
    </script>
</body>

</html>