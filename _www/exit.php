
<?php
  require("dbconnect.php");
  session_start();
//  echo 'Мыло, '.$_SESSION['email'];
//  echo 'Пароль, '.$_SESSION['password'];
  unset($_SESSION['email']); // разрегистрировали переменную
  unset($_SESSION['password']); // разрегистрировали переменную
 // echo 'Привет, '.$_SESSION['username'];

  /* теперь имя пользователя уже не выводится */

  session_destroy(); // разрушаем сессию
  header("Location: index.html");

?>