<?php
/**
 * @var $data
 * @var $genders
 * @var $error
 */
?>

<div class="content-main">
    <div class="content-header">
        <p>Изменить преподавателя</p>
        <?php if (isset($error)) : ?><p><?= $error ?></p><?php endif; ?>
    </div>

    <div class="items">
        <div class="item item-main">
            <form action="/professors/edit/" method="post">
            <div class="content-main">
                <div class="item-content">
                    <div class="login-form">
                        <p class="login-name">Фамилия:</p>
                        <input class="form-input"  name="surname" placeholder="Введите название" type="search" value="<?= $data['surname'] ?>">
                    </div>
                    <div class="login-form">
                        <p class="login-name">Имя:</p>
                        <input class="form-input"  name="name" placeholder="Введите название" type="search" value="<?= $data['name'] ?>">
                    </div>
                    <div class="login-form">
                        <p class="login-name">Отчество:</p>
                        <input class="form-input"  name="patronym" placeholder="Введите название" type="search" value="<?= $data['patronym'] ?>">
                    </div>
                    <div class="login-form">
                        <p class="login-name">Пол:</p>
                        <select name="gender_id" id="">
                            <?php foreach ($genders as $gender) : ?>
                                <option value="<?= $gender['id'] ?>" <?php if ($gender['id'] === $data['gender_id']) : ?>selected<?php endif; ?>><?= $gender['name'] ?></option>
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