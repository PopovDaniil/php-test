<style>
    table {
        border-collapse: collapse;
    }
    td {
        border: 3px outset green;
    }
</style>

<a href="/category.php?action=add">Добавить категорию</a>
<table> 
    <?php
    foreach ($data as $item) { ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['name'] ?></td>
                <td><a href="/category.php?action=edit&id=<?= $item['id'] ?>">[e]</a>
                <td><a href="/category.php?action=delete&id=<?= $item['id'] ?>">[x]</a>
            </tr>
    <?php } ?>
</table>