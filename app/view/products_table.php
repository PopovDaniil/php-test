<style>
    table {
        border-collapse: collapse;
    }
    td {
        border: 3px outset green;
    }
</style>

<a href="/product/add">Добавить товар</a>
<table> 
    <?php
    foreach ($data as $item) { ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['category_name']?></td>
                <td><a href="/product/<?= $item['id'] ?>/edit">[e]</a>
                <td><a href="/product/<?= $item['id'] ?>/delete">[x]</a>
            </tr>
    <?php } ?>
</table>