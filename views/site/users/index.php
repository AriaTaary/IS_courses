<?php

/**
 * @var $data
 */

$page->title = "Пользователи";

?>

<div class="content-header">
    <p class="title">Пользователи</p>
    <form class="form-search" action="/users/search/" method="get" class="menu-search">
        <button type="submit"><img class="search" src="/img/search_w.png"></button>
        <input name="s" placeholder="Поиск..." type="search" <?php if (isset($search)) : ?>value="<?= $search ?>"<?php endif; ?>>
    </form>
    <a href="/users/add/">
        <button class="button add-button" type="submit" value="Добавить">Добавить</button>
    </a>
</div>

<?php if ($data === null) : ?>
    <p>Пользователей пока нет</p>
<?php else : ?>
    <div class="items">
    <?php foreach ($data as $item) : ?>
        <div class="item">
            <div class="item-header">
                <p>Email: <?= $item['email'] ?></p>
                <p>ID: <?= $item['id'] ?></p>
            </div>
            <div class="item-content">
                <p><?= $item['surname'] ?></p>
                <p><?= $item['name'] ?></p>
                <p><?= $item['fathername'] ?></p>
                <p class="user-status">Статус пользователя: <?= $item['status'] ?></p>
            </div>
            <div class="item-footer">
                <a class="change-button-link" href="/users/edit/<?= $item['id'] ?>">
                    <button class="button change-button" type="submit" value="Изменить">Изменить</button>
                </a>
                <a class="change-button-link" href="/users/delete/?id=<?= $item['id'] ?>">
                    <button class="button change-button" type="submit" value="Удалить">Удалить</button>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
<?php endif; ?>