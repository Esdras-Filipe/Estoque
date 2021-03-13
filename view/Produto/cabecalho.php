<nav>
    <ul>
        <li><a href="./Buscar.php">Produtos</a>
            <?php
            if (isset($_SESSION["tipo"]) && $_SESSION["tipo"] == "Administrador") { ?>
                <ul>
                    <li><a href="./Estoque.php">Inserir</a>
                    <li><a href="./atualizar.php">Atualizar</a>
                    <li><a href="./Buscar.php">Listar</a>
                </ul>
            <?php } ?>
        </li>
        <li><a href="../Fornecedor/listar.php">Fornecedores</a>
            <?php
            if (isset($_SESSION["tipo"]) && $_SESSION["tipo"] == "Administrador") { ?>
                <ul>
                    <li><a href="../Fornecedor/Insere.php">Inserir</a>
                    <li><a href="../Fornecedor/Atualizar.php">Atualizar</a>
                    <li><a href="../Fornecedor/listar.php">Listar</a>
                </ul>
            <?php } ?>
        </li>
        <li><a href="./TransacaoEstoque.php">Transação de Estoque</a>
            <?php
            if (isset($_SESSION["tipo"]) && $_SESSION["tipo"] == "Administrador") { ?>
                <ul>
                    <li><a href="./Entrada.php">Entrada</a>
                    <li><a href="./Saida.php">Saida</a>
                </ul>
            <?php } ?>
        </li>
        <li><a href="../Usuario/busca.php">Usuario</a>
            <?php
            if (isset($_SESSION["tipo"]) && $_SESSION["tipo"] == "Administrador") { ?>
                <ul>
                    <li><a href="../Usuario/inserir.php">Cadastrar</a>
                    <li><a href="../Usuario/deletar.php">Deletar</a>
                </ul>
            <?php } ?>
        </li>
    </ul>
