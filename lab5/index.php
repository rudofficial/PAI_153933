<?php session_start(); ?> 
<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
    <meta charset='UTF-8' />
</head>
<body>
    
<h1><?php 
    echo "Nasz System"; 
    ?></h1>

<?php

    require_once 'funkcje.php'; // подключ функции

    // Sprawdzenie czy użytkownik jest zalogowany
    if(isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] === 1) { //проверк чы зменна zalog истнее и чы вартость зменней сесыйней выноси 1
        echo "<p>Jesteś już zalogowany jako: {$_SESSION['zalogowanyImie']}</p>";
        echo "<p><a href='user.php'>Przejdź do strony użytkownika</a></p>";
        exit(); 
    }

    // Sprawdzenie czy został przesłany formularz wylogowania
if(isset($_POST['wyloguj'])) {
    $_SESSION['zalogowany'] = 0; // ставит знач зменней сесии залогованы на 0
    header("Location: index.php"); // переключение на страницу логованя
    exit(); 
}

    // Sprawdzenie czy został przesłany formularz utworzenia cookie
if(isset($_POST['utworzCookie'])) {
    $czas_zycia = $_POST['czas']; //побера вартость часу жыця
    setcookie('moje_cookie', 'wartosc_cookie', time() + $czas_zycia, '/'); // созд куки о назве мое куки + вартость куки + актуальны час плюс час жыця куки
    header("Location: cookie.php"); // отправляет пользователя на стронэ обслугуенцоу куки
    exit(); 
}

    // проверка работает ли кнопка логин
    if(isset($_POST['zaloguj'])) {
        // отбюр данных из полей
        $login = $_POST['login']; //принимает знач логин
        $haslo = $_POST['haslo']; //--

        // показ данных на экране
        // echo "<p>Przesłany login: $login</p>";
        //echo "<p>Przesłane hasło: $haslo</p>";
    
        // Sprawdzenie poprawności danych logowania
    if ($login === $osoba1->login && $haslo === $osoba1->haslo) {
        $_SESSION['zalogowanyImie'] = $osoba1->imieNazwisko; //уставя зменноу сесси на име назвиско особы
        $_SESSION['zalogowany'] = 1; //уставя зменноу сесси на 1, то означа же залогованы 
        header("Location: user.php"); // переадресация на страницу
        exit(); 
    } elseif ($login === $osoba2->login && $haslo === $osoba2->haslo) {
        $_SESSION['zalogowanyImie'] = $osoba2->imieNazwisko;
        $_SESSION['zalogowany'] = 1;
        header("Location: user.php"); 
        exit(); 
    } else {
        echo "<p>Błędny login lub hasło!</p>";
    }

    }
    ?>

    
     <form action="logowanie.php" method="POST"> <!--озн что данные отправ на логоване.пхп при помощ POST -->
        <label for="login">login:</label><br>
        <input type="text" id="login" name="login"><br>   <!--создание поля текстового  -->
        <label for="haslo">Haslo:</label><br>
        <input type="password" id="haslo" name="haslo"><br>
        <input type="submit" value="Zaloguj" name="zaloguj"> <!--твожы кнопку залогуй который при нажатии отправляет формуляж  -->
    </form>

    <!-- Formularz utworzenia cookie -->
<form action="cookie.php" method="POST">
    <label for="czas">Czas życia cookie (w sekundach):</label><br>
    <input type="number" id="czas" name="czas"><br>
    <input type="submit" value="Utwórz Cookie" name="utworzCookie">
</form>


<?php
// Wyświetlanie wartości cookie, jeśli istnieje
if(isset($_COOKIE['moje_cookie'])) {  //проверяет чы ест куки о назве мое куки
    echo "<p>Wartość cookie: {$_COOKIE['moje_cookie']}</p>";
}
?>

</body>
</html>


