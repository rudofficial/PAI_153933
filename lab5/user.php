<?php
session_start();

// Sprawdzenie czy użytkownik jest zalogowany
if(!isset($_SESSION['zalogowany']) || $_SESSION['zalogowany'] !== 1) {
    header("Location: index.php"); // Przekierowanie użytkownika na stronę logowania
    exit(); // Zakończenie wykonywania skryptu
}

// Obsługa wylogowania użytkownika
if(isset($_POST['wyloguj'])) {
    $_SESSION['zalogowany'] = 0; // Ustawienie wartości zmiennej sesji "zalogowany" na 0
    header("Location: index.php"); // Przekierowanie użytkownika na stronę logowania
    exit(); // Zakończenie wykonywania skryptu
}


// Obsługa przesłania formularza dodającego plik
if(isset($_FILES['plik'])) {
    $nazwa_pliku = $_FILES['plik']['name'];
    $tmp_name = $_FILES['plik']['tmp_name'];
    $folder = 'uploads/';

    // Przeniesienie pliku do folderu
    if(move_uploaded_file($tmp_name, $folder.$nazwa_pliku)) {
        echo "Plik został przesłany pomyślnie.";
    } else {
        echo "Wystąpił błąd podczas przesyłania pliku.";
    }
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
    echo "Zalogowano";

    // Wyświetlenie imienia i nazwiska zalogowanej osoby
if(isset($_SESSION['zalogowanyImie'])) {
    echo "<p>Witaj, {$_SESSION['zalogowanyImie']}!</p>";
} else {
    echo "<p>Witaj, Użytkowniku!</p>";
}

?>

<!-- Formularz wylogowania -->
<form action="user.php" method="POST">
    <input type="submit" name="wyloguj" value="Wyloguj">
</form>

<br>
<a href="index.php">Strona logowania</a>
<br>

<!-- Formularz uploadu pliku -->
<form action="user.php" method="POST" enctype="multipart/form-data">
    <label>Wybierz plik:</label>
    <input type="file" name="plik">
    <input type="submit" value="Prześlij plik">
</form>

<!-- Wyświetlenie obrazu -->
<?php
$sciezka_obrazu = 'uploads/nazwa_pliku.jpg'; // Tutaj podaj nazwę pliku, który chcesz wyświetlić
if(file_exists($sciezka_obrazu)) {
    echo "<img src='$sciezka_obrazu' alt='Obraz'>";
} else {
    echo "Zdjęcie nie jest jeszcze dostępne.";
}
?>


</body>
</html>