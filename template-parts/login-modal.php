<? if ( !is_user_logged_in() ): ?>
<a href="#" rel="popup_name" class="poplight">Вход</a>
<div id="popup_name" class="popup_block">
<form action="<?php echo wp_login_url(get_permalink()); ?>"   id="loginForm" action="" method="post">
<div class="field">
<label>Имя пользователя:</label>
<div class="input">
<input type="text" name="log" value="<?php echo wp_specialchars(stripslashes($user_login), 1) ?>"  id="login" /></div>
</div>
<div class="field">
<a href="<?php bloginfo('url') ?>/login/?action=lostpassword" id="forgot">Забыли пароль?</a>
<label>Пароль:</label>
<div class="input">
<input type="password" name="pwd" value="" id="pass" /></div>
</div>
<div class="submit">
<button name="submit" type="submit">Войти</button>
<label>
<div style="font-size: 14px;padding: 5px;"><a href="<?php bloginfo('url') ?>/login/?action=register">Регистрация</a></div>
</label></div>
</form>
</div>
<? else: ?>
<a href="#" rel="popup_name" class="poplight">Ваш профиль</a>
<div id="popup_name" class="popup_block">
<div id="loginForm" action="" method="post">
<div class="cont-side">
<center><?php global $current_user;  get_currentuserinfo(); echo get_avatar( $current_user->user_email, '96' ); ?>
<span class="name"><?php global $user_login; get_currentuserinfo(); echo $user_login; ?></span>
<?php global $user_ID; if( $user_ID ) : ?>
<?php if( current_user_can('level_2') or current_user_can('level_10') ) : ?>
<a href="<?php bloginfo('url') ?>/wp-admin/index.php">Администрирование</a>
<?php else : ?>
<?php endif; ?>
<?php endif; ?>
<a href="<?php bloginfo('url'); ?>/author/<?php echo $current_user->user_login; ?>">Профиль</a>  | <a href="<?php bloginfo('url') ?>/wp-admin/profile.php" title="изменить">Изменить</a>
</center>
<div class="submit"><a href="<?php echo wp_logout_url( $redirect ); ?>" title="Выйти"><button name="submit" type="submit">Выйти</button></a>
<div>
<div>
</div>
</div>
<? endif?>