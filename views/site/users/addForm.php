<?php
/**
 * @var $data
 * @var $statuses
 * @var $error
 */
?>

<div class="content-main">
    <div class="content-header">
        <p>Добавить пользователя</p>
        <?php if (isset($error)) : ?><p><?= $error ?></p><?php endif; ?>
    </div>

    <div class="items">
        <div class="item item-main">
            <form action="/users/add/" method="post">
            <div class="content-main">
                <div class="item-content">
                    <div class="login-form">
                        <p class="login-name">Email:</p>
                        <input class="form-input" name="email" placeholder="Введите email" type="search"
                               <?php if (isset($data)) : ?>value="<?= $data['email'] ?>"<?php endif; ?>
                        >
                    </div>
                    <div class="login-form">
                        <p class="login-name">Фамилия:</p>
                        <input class="form-input" name="surname" placeholder="Введите фамилию" type="search"
                        <?php if (isset($data)) : ?>value="<?= $data['surname'] ?>"<?php endif; ?>
                        >
                    </div>
                    <div class="login-form">
                        <p class="login-name">Имя:</p>
                        <input class="form-input" name="name" placeholder="Введите имя" type="search"
                               <?php if (isset($data)) : ?>value="<?= $data['name'] ?>"<?php endif; ?>
                        >
                    </div>
                    <div class="login-form">
                        <p class="login-name">Отчество:</p>
                        <input class="form-input" name="fathername" placeholder="Введите отчество" type="search"
                               <?php if (isset($data)) : ?>value="<?= $data['fathername'] ?>"<?php endif; ?>
                        >
                    </div>
                    <div class="login-form">
                        <p class="login-name">Пароль:</p>
                        <input class="form-input" name="password" placeholder="Введите пароль" type="search"
                               <?php if (isset($data)) : ?>value="<?= $data['password'] ?>"<?php endif; ?>
                        >
                    </div>
                    <div class="login-form">
                        <p class="login-name">Повторите пароль:</p>
                        <input class="form-input" name="password_twice" placeholder="Введите пароль ещё раз" type="search">
                    </div>
                    <div class="login-form">
                        <p class="login-name">Статус:</p>
                        <select name="status_id" id="">
                            <?php foreach ($statuses as $status) : ?>
                                <option value="<?= $status['id'] ?>"><?= $status['runame'] ?></option>
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