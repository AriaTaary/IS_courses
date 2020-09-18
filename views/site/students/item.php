<?php
/**
 * @var $data
 * @var $professors
 */
?>

<div class="content-main">
    <div class="content-header">
    </div>
    <div class="items">
        <div class="item item-main">
            <div class="item-header item-header-main">
                <p><?= $data['surname'] ?> <?= $data['name'] ?> <?= $data['patronym'] ?></p>
            </div>
            <div class="item-content">
                <p class="item-list-info">Пол: <?= $data['gender_name'] ?></p>
                <p class="item-list-info">Номер группы: <?= $data['group_number'] ?></p>
                <p class="item-description">Название направления: <?= $data['direction_name'] ?></p>
                <p class="item-description">Номер направления: <?= $data['direction_code'] ?></p>
                <p class="item-list-info">Статус оплаты: <?= $data['payment_name'] ?></p>
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