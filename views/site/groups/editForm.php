<?php
/**
 * @var $data
 * @var $directions
 * @var $error
 */
?>

<div class="content-main">
    <div class="content-header">
        <p>Изменить группу</p>
        <?php if (isset($error)) : ?><p><?= $error ?></p><?php endif; ?>
    </div>

    <div class="items">
        <div class="item item-main">
            <form action="/groups/edit/" method="post">
            <div class="content-main">
                <div class="item-content">
                    <div class="login-form">
                        <p class="login-name">Номер группы:</p>
                        <input class="form-input"  name="number" placeholder="Введите номер группы" type="search"
                               <?php if (isset($data)) : ?>value="<?= $data['number'] ?>"<?php endif; ?>
                        >
                    </div>
                    <div class="login-form">
                        <p class="login-name">Направление:</p>
                        <select name="direction_id">
                            <?php foreach ($directions as $item) : ?>
                                <option value="<?= $item['id'] ?>" <?php if ($data['direction_id'] == $item['id']) : ?>selected<?php endif; ?>><?= $item['name'] ?></option>
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