<?php
/**
 * @var \Turma3\wrapperCategory $Category
 */

require "../autoload.php";

use Turma3\wrapperCategory;

$Category = new wrapperCategory();

$dados = $_GET;

if (isset($_GET['edit'])) {
    $valor = $Category->getCategory($dados['edit']);
} else {
    $Category->updateCategory($dados['id'], $dados['category']);
    header("location:index.php");
}
?>

<form action="editCategory.php" method="get">
    <input type="hidden" name="id" value="<?php echo $valor[0]['id']; ?>">
    <label for="category">Categoria:</label>
    <input type="text" name="category" value="<?php echo $valor[0]['nome']; ?>">

    <button type="submit">Salvar</button>
</form>
