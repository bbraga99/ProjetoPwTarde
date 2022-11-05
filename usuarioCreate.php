<?php
    $titulo = "Cadastro de usuário";
    include "cabecalho.php";
    include "conexao.php";

    if( isset($_POST) && !empty($_POST)) {
        $nome = $_POST["nome"];
        $login = $_POST["login"];
        $senha = hash("sha512",$_POST["senha"]);
        if(isset($_POST["ativo"]) && $_POST["ativo"]=="on") {
            $ativo = 1;
        } else {
            $ativo = 0;
        }

        $query = "insert into usuarios (nome,login,senha,ativo) values('$nome','$login','$senha',$ativo)";
        $resultado = mysqli_query($conexao,$query);
        if($resultado) {
            header("location: ./usuarios.php");
            exit();
        } else {
            ?>
                <div class="alert alert-danger">
                    Ocorrou algum erro na query
                    <?php echo $query;?>;
                </div>
            <?php
        }
    }
?>

<div class="row">
    <div class="col-md-4 offset-4">
        <form action="./usuarioCreate.php" method="POST">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control">
            </div>

            <div class="form-group">
                <label>Login</label>
                <input type="text" name="login" class="form-control">
            </div>

            <div class="form-group">
                <label>Senha</label>
                <input type="password" name="senha" class="form-control">
            </div>

            <div class="form-group">
                <label>Ativo</label>
                <input type="checkbox" name="ativo" class="form-check">
            </div>

            <div class="form-group mt-3">
                <button class="btn btn-success" type="submit">
                    Enviar
                </button>
            </div>
        </form>
    </div>
</div>

<?php include "rodape.php";?>