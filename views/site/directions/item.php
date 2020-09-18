<?php
/**
 * @var $data
 * @var $subjects
 */
?>

<div class="content-main">
    <div class="content-header">
    </div>
    <div class="items">
        <div class="item item-main">
            <div class="item-header item-header-main">
                <p class="name"><?= $data['name'] ?></p>
                <p><?= $data['code'] ?></p>
            </div>
            <div class="item-content">
                <p class="item-description">Описание: <?= $data['description'] ?></p>
                <p class="item-list-info">Список предметов:</p>
                <?php if ($subjects === null) : ?>
                    <p class="list-info-another">Предметов пока нет</p>
                <?php else : ?>
                    <p>
                    <ul>
                        <?php foreach ($subjects as $subject) : ?>
                            <li class="list-info-another"><?= $subject['name'] ?></li>
                        <?php endforeach; ?>
                    </ul>
                    </p>
                <?php endif; ?>
                <p class="item-list-info">Стоимость: <?= $data['price'] ?></p>
            </div>
            <div class="item-footer">

                <a class="change-button-link" href="/directions/edit/<?= $data['id'] ?>">
                    <button class="button change-button" type="submit" value="Изменить">Изменить</button>
                </a>
                <a class="change-button-link" href="/directions/delete/?id=<?= $data['id'] ?>">
                    <button class="button change-button" type="submit" value="Удалить">Удалить</button>
                </a>
            </div>
        </div>
    </div>
</div>