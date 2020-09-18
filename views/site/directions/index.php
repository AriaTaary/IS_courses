<?php

/**
 * @var $directions
 * @var $search
 */

$page->title = "Направления обучения";
$page->description = "Описание страницы";
$page->keywords = "направления обучения, московский политех";

?>

<div class="content-header">
    <p class="title-long">Направления обучения</p>
    <form class="form-search" action="/directions/search/" method="get" class="menu-search">
        <button type="submit"><img class="search" src="/img/search_w.png"></button>
        <input name="s" placeholder="Поиск..." type="search" <?php if (isset($search)) : ?>value="<?= $search ?>"<?php endif; ?>>
    </form>
    <a href="/directions/add/">
        <button class="button add-button" type="submit" value="Добавить">Добавить</button>
    </a>
</div>


<?php if ($directions === null) : ?>
    <p>Направлений пока нет</p>
<?php else : ?>
    <div class="items">
    <?php foreach ($directions as $direction) : ?>
        <div class="item">
            <div class="item-header">
                <p><?= $direction['name'] ?></p>
                <p><?= $direction['code'] ?></p>
            </div>
            <div class="item-footer">
                <a class="item-button-link" href="/directions/<?= $direction['id'] ?>">
                    <button class="button item-button" type="submit" value="Подробнее">Подробнее</button>
                </a>
                <a class="change-button-link" href="/directions/edit/<?= $direction['id'] ?>">
                    <button class="button change-button" type="submit" value="Изменить">Изменить</button>
                </a>
                <a class="change-button-link" href="/directions/delete/?id=<?= $direction['id'] ?>">
                    <button class="button change-button" type="submit" value="Удалить">Удалить</button>
                </a>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
<?php endif; ?>