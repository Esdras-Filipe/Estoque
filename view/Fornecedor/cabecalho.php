   <nav>
       <ul>
           <li><a href="../Produto/Buscar.php"">Produtos</a>
           <?php
            if (isset($_SESSION["tipo"]) && $_SESSION["tipo"] == "Administrador") { ?>
            <ul>
                <li><a href=" ../Produto/Estoque.php">Inserir 
                </a> <li><a href="../Produto/atualizar.php">Atualizar</a>
           <li><a href="../Produto/Buscar.php">Listar</a>
       </ul>
   <?php } ?>
   </li>
   <li><a href="./listar.php">Fornecedores</a>
       <?php
        if (isset($_SESSION["tipo"]) && $_SESSION["tipo"] == "Administrador") { ?>
           <ul>
               <li><a href="./Insere.php">Inserir</a>
               <li><a href="./Atualizar.php">Atualizar</a>
               <li><a href="./listar.php">Listar</a>
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
