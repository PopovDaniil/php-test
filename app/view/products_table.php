<style>
    table {
        border-collapse: collapse;
    }
    td,th {
        border: 3px outset green;
    }
    a {
        color:blue;
    }
    table th a, table th strong {
        text-decoration: none;
        margin: 0px 4px;
    }
</style>

<a href="/product/add">Добавить товар</a>
<table>
    <tr>
        <?php foreach ($sort_columns as $column) { ?>
            <th>
            <? if ($column) { ?>

                <?php if ($sort['by'] == $column && $sort['order'] == 'asc') {?>
                    <strong>↓</strong>
                <?php } else { ?>
                <a href="/product/?sort=<?= $column ?>&order=asc">↓</a>
                <?php } ?>

                <?php if ($sort['by'] == $column && $sort['order'] == 'desc') {?>
                    <strong>↑</strong>
                <?php } else { ?>
                    <a href="/product/?sort=<?= $column ?>&order=desc">↑</a>
                <?php } ?>
                
            <? } ?>
            </th>
        <?php } ?>
    </tr>
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

<?= $pages_list ?>