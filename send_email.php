<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $fullName = $_POST['fullName'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $colorData = "";

    // Получаем данные о цветах и количестве
    if (isset($_POST['blockColor'])) {
        $blockColors = $_POST['blockColor'];
        $quantities = $_POST['quantity'];

        for ($i = 0; $i < count($blockColors); $i++) {
            $colorData .= "Цвет: " . $blockColors[$i] . ", Количество: " . $quantities[$i] . "\n";
        }
    }

    // Формируем сообщение
    $message = "Новый заказ!\n\n";
    $message .= "ФИО: " . $fullName . "\n";
    $message .= "Номер телефона: " . $phoneNumber . "\n";
    $message .= "Адрес: " . $address . "\n";
    $message .= "Выбранные цвета и количество:\n" . $colorData;

    // Отправляем сообщение на вашу почту
    $to = "arame105@mail.ru"; // Замените на вашу почту
    $subject = "Новый заказ";
    $headers = "From: sobachka1236@gmail.com" . "\r\n" .
        "CC: sobachka1236@mail.ru";

    mail($to, $subject, $message, $headers);
}
?>
