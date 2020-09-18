<?php

/**
 * @var $data
 */

$page->title = "Студенты";

?>

<div class="content-header">
    <p class="title">Студенты</p>
    <form class="form-search" action="/students/search/" method="get" class="menu-search">
        <button type="submit"><img class="search" src="/img/search_w.png"></button>
        <input name="s" placeholder="Поиск..." type="search" <?php if (isset($search)) : ?>value="<?= $search ?>"<?php endif; ?>>
    </form>
    <a href="/students/add/">
        <button class="button add-button" type="submit" value="Добавить">Добавить</button>
    </a>
</div>

<?php if ($data === null) : ?>
    <p>Студентов пока нет</p>
<?php else : ?>
    <div class="items">
    <?php foreach ($data as $item) : ?>
        <div class="item">
            <div class="item-header">
                <p><?= $item['surname'] ?> <?= $item['name'] ?> <?= $item['patronym'] ?></p>
                <p>Группа: <?= $item['group_number'] ?></p>
            </div>
            <div class="item-footer">
                <a class="item-button-link" href="/students/<?= $item['id'] ?>">
                    <button class="button item-button" type="submit" value="Подробнее">Подробнее</button>
                </a>
                <a class="change-button-link" href="/students/edit/<?= $item['id'] ?>">
                    <button class="button change-button" type="submit" value="Изменить">Изменить</button>
                </a>
                <a class="change-button-link" href="/students/delete/?id=<?= $item['id'] ?>">
                    <button class="button change-button" type="submit" value="Удалить">Удалить</button>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
<?php endif; ?>