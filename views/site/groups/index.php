<?php

/**
 * @var $groups
 */

$page->title = "Учебные группы";

?>

<div class="content-header">
    <p class="title">Группы</p>
    <form class="form-search" action="/groups/search/" method="get" class="menu-search">
        <button type="submit"><img class="search" src="/img/search_w.png"></button>
        <input name="s" placeholder="Поиск..." type="search" <?php if (isset($search)) : ?>value="<?= $search ?>"<?php endif; ?>>
    </form>
    <a href="/groups/add/">
        <button class="button add-button" type="submit" value="Добавить">Добавить</button>
    </a>
</div>

<?php if ($groups === null) : ?>
    <p>Групп пока нет</p>
<?php else : ?>
    <div class="items">
    <?php foreach ($groups as $group) : ?>
        <div class="item">
            <div class="item-header">
                <p><?= $group['number'] ?></p>
                <p>Направление: <a class="direction-link" href="/directions/<?= $group['direction_id'] ?>"><?= $group['direction_code'] ?></a></p>
            </div>
            <div class="item-footer">
                <a class="item-button-link" href="/groups/<?= $group['id'] ?>">
                    <button class="button item-button" type="submit" value="Подробнее">Подробнее</button>
                </a>
                <a class="change-button-link" href="/groups/edit/<?= $group['id'] ?>">
                    <button class="button change-button" type="submit" value="Изменить">Изменить</button>
                </a>
                <a class="change-button-link" href="/groups/delete/?id=<?= $group['id'] ?>">
                    <button class="button change-button" type="submit" value="Удалить">Удалить</button>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
<?php endif; ?>