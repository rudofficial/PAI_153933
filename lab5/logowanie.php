<?php
session_start();
require_once 'funkcje.php';

if(isset($_POST['zaloguj'])) {
    $login = test_input($_POST['login']);
    $haslo = test_input($_POST['haslo']);

    if ($login === $osoba1->login && $haslo === $osoba1->haslo) {
        $_SESSION['zalogowanyImie'] = $osoba1->imieNazwisko;
        $_SESSION['zalogowany'] = 1;
        header("Location: user.php"); // Przekierowanie użytkownika
        exit(); // Zakończenie wykonywania skryptu
    } elseif ($login === $osoba2->login && $haslo === $osoba2->haslo) {
        $_SESSION['zalogowanyImie'] = $osoba2->imieNazwisko;
        $_SESSION['zalogowany'] = 1;
        header("Location: user.php"); // Przekierowanie użytkownika
        exit(); // Zakończenie wykonywania skryptu
    } else {
        header("Location: index.php"); // Przekierowanie użytkownika na stronę logowania
        exit(); // Zakończenie wykonywania skryptu
    }
} else {
    // Jeśli próba dostępu do logowania.php bez wysłania formularza, przekieruj użytkownika na stronę logowania
    header("Location: index.php");
    exit();
}
?>
