<?php 
//Шаблон авторизации
$errors = $arr;
?>

<main>
  <form class="form container <?=isset($errors)? 'form--invalid': '' ?>" method="post"> <!-- form--invalid -->
    <h2>Вход</h2>
    <div class="form__item <?=isset($errors['email'])? 'form__item--invalid': '' ?>"> <!-- form__item--invalid -->
      <label for="email">E-mail*</label>
      <input id="email" type="text" name="email" required placeholder="Введите e-mail" value=<?=$_POST['email']?> >
      <span class="form__error"><?=$errors['email']?></span>
    </div>
    <div class="form__item form__item--last <?=isset($errors['password'])? 'form__item--invalid': '' ?>">
      <label for="password">Пароль*</label>
      <input id="password" type="password" name="password" placeholder="Введите пароль" required >
      <span class="form__error"><?=$errors['password']?></span>
    </div>
    <button type="submit" class="button">Войти</button>
  </form>
</main>