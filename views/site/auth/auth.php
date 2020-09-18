<?php

/**
 * TODO: Поправить стили, потому что тег form должен быть один, а не новый на каждый input.
 * TODO: Я закомментировал div с классами block-log-in block-open и указал их в form + у modal-footer вручную стили тут указал
 */

?>

<div class="modal">
    <div class="modal-dialogue">
        <div class="modal-header">
            <p class="modal-title">Вход</p>
        </div>
        <div class="modal-body">
<!--            <div class="block-log-in block-open">-->
                <form action="/" method="post" class="block-log-in block-open">
                    <div class="login-form">
                        <p class="login-name">Email:</p>
                        <input class="login-input" name="email" placeholder="Введите email" type="search">
                    </div>
                    <div class="login-form">
                        <p class="login-name">Пароль:</p>
                        <input class="login-input" name="password" placeholder="Введите пароль" type="search">
                    </div>
                    <div class="modal-footer" style="width: 100%">
                        <div class="footer-buttons">
                            <button type="submit" class="button login-button enter-button">Войти</button>
                        </div>
                    </div>
                </form>
<!--            </div>-->

        </div>
        <!-- /.modal-body -->
    </div>
    <!-- /.modal-dialogue -->
</div>
<!-- /.modal -->