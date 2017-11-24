<?php
$title = 'Передача письма';
echo '<title>'.$title.'</title>';
?>


<?php
$mail = 'ekata317@yandex.ru';
$form = "Content-type: text/html; charset=UTF-8\n";
$form .= "";


$w1 = $_POST['A'];
$w2 = $_POST['B'];
$w3 = $_POST['C'];
$w4 = $_POST['D'];
$w5 = $_POST['E'];
$w6 = $_POST['F'];
$w7 = $_POST['G'];
$w8 = $_POST['H'];


$zzc = mail($mail, "Заказ газеты для: $w8", "ФИО: $w8<br> Почта: $w1<br> Телефон: $w2<br> Курс: $w3<br> Группа: $w4<br> Номер Выпуска: $w5<br> Кол-во: $w6<br> Распечатка: $w7<br>", $form);

if ($zzc='true') { 
  echo"Письмо отправлено";
  exit();
} else {
  echo"Ошибка";
  exit();
}
?>
