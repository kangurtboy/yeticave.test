<?php 
//шаблон регистрации нового ползователя
require $_SERVER['DOCUMENT_ROOT'] . './config.php';
$errors = $arr;
?>

<form class="form container <?=count($errors)?'form--invalid' : '' ?>" method="POST" enctype="multipart/form-data"> <!-- form--invalid -->
    <h2>Регистрация нового аккаунта</h2>
    <div class="form__item <?=isset($errors['email'])?'form__item--invalid':''?>"> <!-- form__item--invalid -->
      <label for="email">E-mail*</label>
      <input id="email" type="text" name="email" placeholder="Введите e-mail" value=<?=$_POST['email']?>>
      <span class="form__error"><?=$errors['email']?></span>
    </div>
    <div class="form__item <?=isset($errors['password'])?'form__item--invalid':''?>">
      <label for="password">Пароль*</label>
      <input id="password" type="text" name="password" placeholder="Введите пароль" value=<?=$_POST['password']?>>
      <span class="form__error"><?=$errors['password']?></span>
    </div>
    <div class="form__item <?=isset($errors['name'])?'form__item--invalid':''?>">
      <label for="name">Имя*</label>
      <input id="name" type="text" name="name" placeholder="Введите имя" value=<?=$_POST['name']?> >
      <span class="form__error"><?=$errors['name']?></span>
    </div>
    <div class="form__item <?=isset($errors['message'])?'form__item--invalid':''?>">
      <label for="message">Контактные данные*</label>
      <textarea id="message" name="message" placeholder="Напишите как с вами связаться" ><?=$_POST['message']?></textarea>
      <span class="form__error"><?=$errors['message']?></span>
    </div>
    <div class="form__item form__item--file form__item--last <?=isset($_FILES['avatar']['name']) && !isset($errors['avatar'])?'form__item--uploaded':'form__item--invalid'?>">
      <label>Аватар</label>
      <div class="preview">
        <button class="preview__remove" type="button">x</button>
        <div class="preview__img">
          <img src=<?=$server_name . '/uploads/' . $_FILES['avatar']['name']?> width="113" height="113" alt="Ваш аватар">
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
    <a class="text-link" href=<?=$server_name . 'pages/login.php'?>>Уже есть аккаунт</a>
  </form>