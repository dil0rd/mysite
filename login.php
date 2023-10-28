<?php
session_start();

// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$database = "site"; // Используйте корректное название вашей базы данных

$conn = new mysqli($servername, $username, $password, $database);

// Проверка подключения
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$email = $_POST["email"];
$password = $_POST["password"];

// Подготовка SQL-запроса и выполнение для проверки введенных данных в базе данных
$sql = "SELECT id FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

// Проверка, найден ли пользователь с такими данными
if ($result->num_rows > 0) {
// Если аутентификация успешна, устанавливаем сессионную переменную и перенаправляем на страницу галереи
$_SESSION['user_id'] = $result->fetch_assoc()["id"];
header("Location: gallery.html");
exit();
} else {
// Если аутентификация не удалась, выведите сообщение об ошибке или верните пользователя на страницу входа
echo "Неверные учетные данные. Пожалуйста, попробуйте снова.";
}

$conn->close();
}
?>
?>