<?php
/**
 * @var $data
 * @var $statuses
 * @var $error
 */
?>

<div class="content-main">
    <div class="content-header">
        <p>Изменить пользователя</p>
        <?php if (isset($error)) : ?><p><?= $error ?></p><?php endif; ?>
    </div>

    <div class="items">
        <div class="item item-main">
            <form action="/users/edit/" method="post">
            <div class="content-main">
                <div class="item-content">
                    <div class="login-form">
                        <p class="login-name">Email:</p>
                        <input class="form-input"  name="email" placeholder="Введите email" type="email"
                               <?php if (isset($data)) : ?>value="<?= $data['email'] ?>"<?php endif; ?>
                        >
                    </div>
                    <div class="login-form">
                        <p class="login-name">Фамилия:</p>
                        <input class="form-input"  name="surname" placeholder="Введите фамилию" type="text"
                               <?php if (isset($data)) : ?>value="<?= $data['surname'] ?>"<?php endif; ?>
                        >
                    </div>
                    <div class="login-form">
                        <p class="login-name">Имя:</p>
                        <input class="form-input"  name="name" placeholder="Введите имя" type="text"
                               <?php if (isset($data)) : ?>value="<?= $data['name'] ?>"<?php endif; ?>
                        >
                    </div>
                    <div class="login-form">
                        <p class="login-name">Отчество:</p>
                        <input class="form-input"  name="fathername" placeholder="Введите отчество" type="text"
                               <?php if (isset($data)) : ?>value="<?= $data['fathername'] ?>"<?php endif; ?>
                        >
                    </div>
                    <div class="login-form">
                        <p class="login-name">Статус:</p>
                        <select name="status_id" id="">
                            <?php foreach ($statuses as $status) : ?>
                                <option value="<?= $status['id'] ?>" <?php if ($data['status_id'] == $status['id']) : ?>selected<?php endif; ?>><?= $status['runame'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <input type="number" name="id" value="<?= $data['id'] ?>" style="display: none">
                </div>
                <div class="item-footer">
                    <button class="button change-button" type="submit">Изменить</button>
                </div>
            </div>
            </form>
            <!-- <div class="item-footer">
                    <button class="button change-button" type="submit">Изменить</button>
            </div> -->
        </div>
    </div>
</div>