<?php
/**
 * @var $data
 * @var $type_exams
 * @var $professors
 * @var $directions
 * @var $error
 */
?>

<div class="content-main">
    <div class="content-header">
        <p>Добавить дисциплину</p>
        <?php if (isset($error)) : ?><p><?= $error ?></p><?php endif; ?>
    </div>

    <div class="items">
        <div class="item item-main">
            <form action="/subjects/add/" method="post">
            <div class="content-main">
                <div class="item-content">
                    <div class="login-form">
                        <p class="login-name">Название:</p>
                        <input class="form-input"  name="name" placeholder="Введите название" type="search"
                        <?php if (isset($data)) : ?>value="<?= $data['name'] ?>"<?php endif; ?>
                        >
                    </div>
                    <!-- <div class="login-form">
                        <p class="login-name">Описание:</p>
                        <textarea name="description" id="" cols="" rows="5" placeholder="Введите описание"><?php if (isset($data)) : ?><?= $data['description'] ?><?php endif; ?></textarea>
                    </div> -->
                    <div class="login-form">
                        <p class="login-name">Выбрать направление:</p>
                        <select multiple="multiple" size="5" name="directions_id[]">
                            <?php foreach ($directions as $direction) : ?>
                                <option value="<?= $direction['id'] ?>"><?= $direction['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="login-form">
                        <p class="login-name">Выбрать преподавателей:</p>
                        <select multiple="multiple" size="5" name="professors_id[]">
                            <?php foreach ($professors as $professor) : ?>
                                <option value="<?= $professor['id'] ?>"><?= $professor['surname'] ?> <?= $professor['name'] ?> <?= $professor['patronym'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="login-form">
                        <p class="login-name">Вид аттестации:</p>
                        <select name="type_exam_id">
                            <?php foreach ($type_exams as $item) : ?>
                                <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="item-footer">
                    <button class="button change-button" type="submit">Добавить</button>
                </div>
            </div>
            </form>
            <!-- <div class="item-footer">
                    <button class="button change-button" type="submit">Добавить</button>
            </div> -->
        </div>
    </div>
</div>