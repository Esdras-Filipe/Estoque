<nav>
    <ul>
        <li><a href="../Produto/buscar.php">Produtos</a>
            <?php
            if (isset($_SESSION["tipo"]) && $_SESSION["tipo"] == "Administrador") { ?>
                <ul>
                    <li><a href="../Produto/Estoque.php">Inserir</a>
                    <li><a href="../Produto/atualizar.php">Atualizar</a>
                    <li><a href="../Produto/buscar.php">Listar</a>
                </ul>
            <?php } ?>
        </li>
        <li><a href="../Fornecedor/listar.php">Fornecedores</a>
            <?php
            if (isset($_SESSION["tipo"]) && $_SESSION["tipo"] == "Administrador") { ?>
                <ul>
                    <li><a href="../Fornecedor/insere.php">Inserir</a>
                    <li><a href="../Fornecedor/Atualizar.php">Atualizar</a>
                    <li><a href="../Fornecedor/listar.php">Listar</a>
                </ul>
            <?php } ?>
        </li>
        <li><a href="../Produto/TransacaoEstoque.php">Transação de Estoque</a>
            <?php
            if (isset($_SESSION["tipo"]) && $_SESSION["tipo"] == "Administrador") { ?>
                <ul>
                    <li><a href="../Produto/Entrada.php">Entrada</a>
                    <li><a href="../Produto/Saida.php">Saida</a>
                </ul>
            <?php } ?>
        </li>
        <li><a href="./busca.php">Usuario</a>
            <?php
            if (isset($_SESSION["tipo"]) && $_SESSION["tipo"] == "Administrador") { ?>
                <ul>
                    <li><a href="./inserir.php">Cadastrar</a>
                    <li><a href="./deletar.php">Deletar</a>
                </ul>
            <?php } ?>
        </li>
    </ul>