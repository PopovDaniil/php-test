<style>
    table {
        border-collapse: collapse;
    }
    td {
        border: 3px outset green;
    }
</style>

<a href="?action=add">Добавить товар</a>
<table> 
    <?php
    foreach ($data as $item) { ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['category_name']?></td>
                <td><a href="?action=edit&id=<?= $item['id'] ?>">[e]</a>
                <td><a href="?action=delete&id=<?= $item['id'] ?>">[x]</a>
            </tr>
    <?php } ?>
</table>