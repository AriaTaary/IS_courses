<?php
/**
 * @var $data
 * @var $students
 */
?>

<div class="content-main">
    <div class="content-header">
    </div>
    <div class="items">
        <div class="item item-main">
            <div class="item-header item-header-main">
                <p><?= $data['number'] ?></p>
            </div>
            <div class="item-content">
                <p class="item-description">Направление: <?= $data['direction_name'] ?></p>
                <p class="item-description">Код направления: <?= $data['direction_code'] ?></p>
                <p class="item-list-info">Список студентов:</p>
                <?php if ($students === null) : ?>
                    <p class="list-info-another">Студентов пока нет</p>
                <?php else : ?>
                    <p>
                    <ul>
                        <?php foreach ($students as $student) : ?>
                            <li class="list-info-another"><?= $student['surname'] ?> <?= $student['name'] ?> <?= $student['patronym'] ?></li>
                        <?php endforeach; ?>
                    </ul>
                    </p>
                <?php endif; ?>
            </div>
            <div class="item-footer">
                <a class="change-button-link" href="/groups/edit/<?= $data['id'] ?>">
                    <button class="button change-button" type="submit" value="Изменить">Изменить</button>
                </a>
                <a class="change-button-link" href="/groups/delete/?id=<?= $data['id'] ?>">
                    <button class="button change-button" type="submit" value="Удалить">Удалить</button>
                </a>
            </div>
        </div>
    </div>
</div>