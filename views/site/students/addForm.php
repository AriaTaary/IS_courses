<?php
/**
 * @var $data
 * @var $genders
 * @var $groups
 * @var $payment_status
 * @var $error
 */
?>

<div class="content-main">
    <div class="content-header">
        <p>Добавить студента</p>
        <?php if (isset($error)) : ?><p><?= $error ?></p><?php endif; ?>
    </div>

    <div class="items">
        <div class="item item-main">
            <form action="/students/add/" method="post">
            <div class="content-main">
                <div class="item-content">
                    <div class="login-form">
                        <p class="login-name">Фамилия:</p>
                        <input class="form-input"  name="surname" placeholder="Введите фамилию" type="search"
                        <?php if (isset($data)) : ?>value="<?= $data['surname'] ?>"<?php endif; ?>
                        >
                    </div>
                    <div class="login-form">
                        <p class="login-name">Имя:</p>
                        <input class="form-input"  name="name" placeholder="Введите имя" type="search"
                               <?php if (isset($data)) : ?>value="<?= $data['name'] ?>"<?php endif; ?>
                        >
                    </div>
                    <div class="login-form">
                        <p class="login-name">Отчество:</p>
                        <input class="form-input"  name="patronym" placeholder="Введите отчество" type="search"
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
                    <div class="login-form">
                        <p class="login-name">Группа:</p>
                        <select name="group_id" id="">
                            <?php foreach ($groups as $group) : ?>
                                <option value="<?= $group['id'] ?>"><?= $group['number'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="login-form">
                        <p class="login-name">Статус оплаты:</p>
                        <select name="payment_id" id="">
                            <?php foreach ($payment_status as $payment) : ?>
                                <option value="<?= $payment['id'] ?>"><?= $payment['name'] ?></option>
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