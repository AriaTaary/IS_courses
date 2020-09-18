<?php
/**
 * @var $data
 * @var $error
 */
?>

<div class="content-main">
    <div class="content-header">
        <p>Изменить направление</p>
        <?php if (isset($error)) : ?><p><?= $error ?></p><?php endif; ?>
    </div>

    <div class="items">
        <div class="item item-main">
            <form action="/directions/edit/" method="post">
            <div class="content-main">
                <div class="item-content">
                    <div class="login-form">
                        <p class="login-name">Код направления:</p>
                        <input class="form-input"  name="code" placeholder="Введите код" type="search" value="<?= $data['code'] ?>">
                    </div>
                    <div class="login-form">
                        <p class="login-name">Название:</p>
                        <input class="form-input"  name="name" placeholder="Введите название" type="search" value="<?= $data['name'] ?>">
                    </div>
                    <div class="login-form">
                        <p class="login-name">Описание:</p>
                        <textarea name="description" id="" cols="" rows="5" placeholder="Введите описание"><?= $data['description'] ?></textarea>
                    </div>
                    <div class="login-form">
                        <p class="login-name">Стоимость:</p>
                        <input class="form-input"  name="price" placeholder="Введите стоимость" type="search" value="<?= $data['price'] ?>">
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