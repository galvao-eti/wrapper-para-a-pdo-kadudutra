<?php
/**
 * @var \Turma3\wrapperCategory $Category
 */

require "../autoload.php";

use Turma3\wrapperCategory;

$Category = new wrapperCategory();

$dados = $_GET;

if (isset($dados['delete'])) {
    $Category->deleteCategory($dados['delete']);
}

$categories = $Category->listCategory();

?>
<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>
<a href="/www/addCategory.php">Adicionar Categoria</a>
<br>
<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th colspan="2">Ações</th>
    </tr>
    <?php foreach ($categories as $cat) { ?>
        <tr>
            <td><?php echo $cat['id'] ?></td>
            <td><?php echo $cat['nome'] ?></td>
            <td><a href="/www/editCategory.php?edit=<?php echo $cat['id'] ?>">Editar</a></td>
            <td><a href="/www/index.php?delete=<?php echo $cat['id'] ?>">Deletar</a></td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
