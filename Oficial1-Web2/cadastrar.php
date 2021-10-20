<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Livro</title>

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
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
        }

        h3 {
            margin-top: 30px;
            text-align: center;
        }

        form{
            text-align: center;
            margin-top: 50px;
        }

        .input-form{
            width: 590px;
            height: 25px;
            border-radius: 10px;
            margin-top: 10px;
        }

        .input-button{
            width: 180px;
            height: 35px;
            margin-top: 10px;
            background-color: #4CAF50;
            border-radius: 12px;
            cursor: pointer;
            display: inline-block;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
        }
        
    </style>
</head>

<body>
    <?php
    include_once './conexaoBD/conexaoBD.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titulo = $_POST['titulo'];
        $sinopse = $_POST['sinopse'];
        $autor = $_POST['autor'];
        $preco = $_POST['preco'];
        $editora = $_POST['editora'];

        $query = "INSERT INTO 
                        Livros (titulo , sinopse , autor , preco , editora)
                         VALUES 
                         ('$titulo', '$sinopse', '$autor', '$preco' , '$editora')
                          ";

        $conexao->query($query);
        header('Location: index.php');
    }
    ?>
    <div class="card-Button">

        <h3>Cadastrar um novo Livro</h3>
        <div>
            <form method="POST">
                <div>
                    <label>Titulo:</label>
                    <input name="titulo" class="input-form" id="titulo" type="text" required/>
                </div>

                <div>
                    <label>Sinopse:</label>
                    <input name="sinopse"class="input-form" id="sinopse" type="text"  required/>
                </div>

                <div>
                    <label>Autor:</label>
                    <input name="autor" class="input-form" id="autor" type="text"  required/>
                </div>

                <div>
                    <label>Preço: </label>
                    <input name="preco" min="0" max="10" step="0.01" class="input-form" id="preco" type="number"  required/>
                </div>

                <div>
                    <label>Editora:</label>
                    <input name="editora" class="input-form" id="editora" type="text"  required/>
                </div>

                <div>
                    <input type="hidden" name="" />
                    <input type="submit" class="input-button" value="Salvar Cadastro" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>