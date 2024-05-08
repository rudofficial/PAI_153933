<?php session_start(); //начинает дибо взнавя сессию

if(isset($_POST['utworzCookie'])) {  //справдза чы зостал высланы формуляж з полем о назве куки
    // получение времени жизни куки
    $czas_zycia = $_POST['czas']; //пост побера час жиця

    // создание куки
    setcookie("moje_cookie", "wartosc_cookie", time() + $czas_zycia, "/"); //назва куки + вартость куки + час выгасненця + сцежка для которой куки достэмпна 

    // показ коммениката
    echo "Ciasteczko zostało pomyślnie dodane.";
}

?>
<!DOCTYPE html>
<html>
<head>
<title>PHP</title>
<meta charset='UTF-8' />
</head>
<body>
    <?php
        require_once("funkcje.php");
        echo "Cookie";
    ?>

<br>
    <a href="index.php">Powrót do strony głównej</a>

</body>
</html>
