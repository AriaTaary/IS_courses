<?php
/**
 * @var $data
 * @var $genders
 * @var $error
 */
?>

<div class="content-main">
    <div class="content-header">
        <p>Добавить преподавателя</p>
        <?php if (isset($error)) : ?><p><?= $error ?></p><?php endif; ?>
    </div>

    <div class="items">
        <div class="item item-main">
            <form action="/professors/add/" method="post">
            <div class="content-main">
                <div class="item-content">
                    <div class="login-form">
                        <p class="login-name">Фамилия:</p>
                        <input class="form-input"  name="surname" placeholder="Введите название" type="search"
                        <?php if (isset($data)) : ?>value="<?= $data['surname'] ?>"<?php endif; ?>
                        >
                    </div>
                    <div class="login-form">
                        <p class="login-name">Имя:</p>
                        <input class="form-input"  name="name" placeholder="Введите название" type="search"
                               <?php if (isset($data)) : ?>value="<?= $data['name'] ?>"<?php endif; ?>
                        >
                    </div>
                    <div class="login-form">
                        <p class="login-name">Отчество:</p>
                        <input class="form-input"  name="patronym" placeholder="Введите название" type="search"
                               <?php if (isset($data)) : ?>value="<?= $data['patronym'] ?>"<?php endif; ?>
                        >
                    </div>
                    <div class="login-form">
                        <p class="login-name">Пол:</p>
                        <select name="gender_id" id="">
                            <?php foreach ($genders as $gender) : ?>
                                <option value="<?= $gender['id'] ?>"><?= $gender['name'] ?></option>
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
                    <button class="button change-button" type="submit">Изменить</button>
            </div> -->
        </div>
    </div>
</div>