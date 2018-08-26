<?php
/**
 * @var \Turma3\wrapperCategory $Category
 */

require "../autoload.php";

use Turma3\wrapperCategory;

$Category = new wrapperCategory();

if ($_GET) {
    $dados = $_GET;
    $Category->addCategory($dados['category']);
}
?>

<form action="addCategory.php" method="get">
    <label for="category">Categoria:</label>
    <input type="text" name="category">

    <button type="submit">Salvar</button>
</form>
