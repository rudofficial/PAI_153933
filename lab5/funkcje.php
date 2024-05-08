<?php

//функция жебы не заклуцить сыстэм
function test_input($data) {
    $data = trim($data); // удаляет белые знаки с начала и конца ценгу
    $data = stripslashes($data); // усува знаки уцечки (\)
    $data = htmlspecialchars($data); //конвертуе спец знаки HTML на енцъе

    return $data;
}

class Osoba {
    public $login;
    public $haslo;
    public $imieNazwisko;
}

$osoba1 = new Osoba;
$osoba1->login = "adam";
$osoba1->haslo = "adam2020";
$osoba1->imieNazwisko = "Adam Kowalski";

$osoba2 = new Osoba;
$osoba2->login = "agata";
$osoba2->haslo = "2020agata";
$osoba2->imieNazwisko = "Agata Nowak";


?>
