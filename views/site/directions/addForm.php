<?php
/**
 * @var $data
 * @var $error
 */
?>

<div class="content-main">
    <div class="content-header">
        <p>Добавить направление</p>
        <?php if (isset($error)) : ?><p><?= $error ?></p><?php endif; ?>
    </div>

    <div class="items">
        <div class="item item-main">
            <form action="/directions/add/" method="post">
            <div class="content-main">
                <div class="item-content">
                    <div class="login-form">
                        <p class="login-name">Код направления:</p>
                        <input class="form-input" name="code" placeholder="Введите код" type="search"
                        <?php if (isset($data)) : ?>value="<?= $data['code'] ?>"<?php endif; ?>
                        >
                    </div>
                    <div class="login-form">
                        <p class="login-name">Название:</p>
                        <input class="form-input" name="name" placeholder="Введите название" type="search"
                        <?php if (isset($data)) : ?>value="<?= $data['name'] ?>"<?php endif; ?>
                        >
                    </div>
                    <div class="login-form">
                        <p class="login-name">Описание:</p>
                        <textarea name="description" id="" cols="" rows="5" placeholder="Введите описание"><?php if (isset($data)) : ?><?= $data['description'] ?><?php endif; ?></textarea>
                    </div>
                    <div class="login-form">
                        <p class="login-name">Стоимость:</p>
                        <input class="form-input"  name="price" placeholder="Введите стоимость" type="search"
                        <?php if (isset($data)) : ?>value="<?= $data['price'] ?>"<?php endif; ?>
                        >
                    </div>
                </div>
                <div class="item-footer">
                    <button class="button change-button" type="submit">Добавить</button>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>