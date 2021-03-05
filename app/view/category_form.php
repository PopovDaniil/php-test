<style>
    form {
        margin-top: 10px;
    }
</style>

<form action="/category.php" method="POST">
        <input type="hidden" name="id" value="<?=$data['id']?>">
        <input type="text" name="name" value="<?= $data['name'] ?? "" ?>">
        <button type="submit"><?= $data['id'] ? "Сохранить" : "Создать"?>
        </button>
</form>
