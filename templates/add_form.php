<!-- Щаблон формы -->
<?php 
$errors = $arr;
?>

<main>

  <form class="form form--add-lot container <?= empty($errors) ? '' : 'form--invalid'?>" action="add.php" method="post" name="lot"> <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two">
      <div class="form__item  <?=$_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['lot-name'])? 'form__item--invalid': '' ?>"> <!-- form__item--invalid -->
        <label for="lot-name">Наименование</label>
        <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота" value=<?=$_POST['lot-name']?>>
        <span class="form__error"><?=$errors['lot-name']?? "Введите наименование лота"?></span>
      </div>
      <div class="form__item <?=$_SERVER['REQUEST_METHOD'] == 'POST' && empty(!$errors['category'])? 'form__item--invalid': '' ?>">
        <label for="category">Категория</label>
        <select id="category" name="category" >
          <option selected><?=$_POST['category']??'Выберите категорию'?></option>
          <option>Доски и лыжи</option>
          <option>Крепления</option>
          <option>Ботинки</option>
          <option>Одежда</option>
          <option>Инструменты</option>
          <option>Разное</option>
        </select>
        <span class="form__error">Выберите категорию</span>
      </div>
    </div>
    <div class="form__item form__item--wide <?=$_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['message'])? 'form__item--invalid': '' ?>">
      <label for="message">Описание</label>
      <textarea id="message" name="message" placeholder="Напишите описание лота" ><?=$_POST['message']?></textarea>
      <span class="form__error">Напишите описание лота</span>
    </div>
    <div class="form__item form__item--file <?=$_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST['img'])? 'form__item--invalid': '' ?>"> <!-- form__item--uploaded -->
      <label>Изображение</label>
      <div class="preview">
        <button class="preview__remove" type="button">x</button>
        <div class="preview__img">
          <img src="<?=$_POST['img']?>" width="113" height="113" alt="Изображение лота">
        </div>
      </div>
      <div class="form__input-file">
        <input class="visually-hidden" type="file" id="photo2" value="" name="img">
        <label for="photo2">
          <span>+ Добавить</span>
        </label>
      </div>
    </div>
    <div class="form__container-three">
      <div class="form__item form__item--small <?=$_SERVER['REQUEST_METHOD'] == 'POST' && empty(!$errors['lot-rate'])? 'form__item--invalid': '' ?>">
        <label for="lot-rate">Начальная цена</label>
        <input id="lot-rate" type="number" name="lot-rate" placeholder="0" value=<?=$_POST['lot-rate']?>>
        <span class="form__error"> <?=$errors['lot-rate'] ?? 'Введите начальную цену'?></span>
      </div>
      <div class="form__item form__item--small <?=$_SERVER['REQUEST_METHOD'] == 'POST' && empty(!$errors['lot-step'])? 'form__item--invalid': '' ?>">
        <label for="lot-step">Шаг ставки</label>
        <input id="lot-step" type="number" name="lot-step" placeholder="0" value=<?=$_POST['lot-step']?> >
        <span class="form__error"> <?=$errors['lot-step'] ??'Введите шаг ставки' ?></span>
      </div>
      <div class="form__item <?=$_SERVER['REQUEST_METHOD'] == 'POST' && empty(!$errors['lot-date'])? 'form__item--invalid': '' ?>">
        <label for="lot-date">Дата окончания торгов</label>
        <input class="form__input-date" id="lot-date" type="date" name="lot-date" value=<?=$_POST['lot-date']?>>
        <span class="form__error"><?=$errors['lot-date']?></span>
      </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Добавить лот</button>
  </form>
</main>