<?php 
//шаблон регистрации нового ползователя
$errors = $arr;
?>

<form class="form container <?=isset($errors)?'form--invalid' : '' ?>" action="https://echo.htmlacademy.ru" method="POST"> <!-- form--invalid -->
    <h2>Регистрация нового аккаунта</h2>
    <div class="form__item"> <!-- form__item--invalid -->
      <label for="email">E-mail*</label>
      <input id="email" type="text" name="email" placeholder="Введите e-mail" value=<?=$_POST['email']?>>
      <span class="form__error"><?=$errors['email']?></span>
    </div>
    <div class="form__item">
      <label for="password">Пароль*</label>
      <input id="password" type="text" name="password" placeholder="Введите пароль" >
      <span class="form__error"><?=$errors['password']?></span>
    </div>
    <div class="form__item">
      <label for="name">Имя*</label>
      <input id="name" type="text" name="name" placeholder="Введите имя" value=<?=$_POST['name']?> >
      <span class="form__error"><?=$errors['name']?></span>
    </div>
    <div class="form__item">
      <label for="message">Контактные данные*</label>
      <textarea id="message" name="message" placeholder="Напишите как с вами связаться" >value=<?=$_POST['message']?></textarea>
      <span class="form__error"><?=$errors['message']?></span>
    </div>
    <div class="form__item form__item--file form__item--last">
      <label>Аватар</label>
      <div class="preview">
        <button class="preview__remove" type="button">x</button>
        <div class="preview__img">
          <img src="img/avatar.jpg" width="113" height="113" alt="Ваш аватар">
        </div>
      </div>
      <div class="form__input-file">
        <input class="visually-hidden" type="file" id="photo2" value="" name="avatar">
        <label for="photo2">
          <span>+ Добавить</span>
        </label>
      </div>
      <span class="form__error"><?=$errors['avatar']?></span>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Зарегистрироваться</button>
    <a class="text-link" href="#">Уже есть аккаунт</a>
  </form>