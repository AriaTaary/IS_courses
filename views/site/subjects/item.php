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
                <p><?= $data['name'] ?></p>
            </div>
            <div class="item-content">
                <!-- <p class="item-description"><?= $data['description'] ?></p> -->
                <p class="item-list-info">Список преподавателей:</p>
                <?php if ($professors === null) : ?>
                <p>Преподавателей пока нет</p>
                <?php else : ?>
                <p>
                    <ul>
                        <?php foreach ($professors as $professor) : ?>
                        <li class="list-info-another"><?= $professor['surname'] ?> <?= $professor['name'] ?> <?= $professor['patronym'] ?></li>
                        <?php endforeach; ?>
                    </ul>
                </p>
                <?php endif; ?>
                <p class="item-list-info">Вид аттестации: <?= $data['type_exam'] ?></p>
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