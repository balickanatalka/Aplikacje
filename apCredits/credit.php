<?php

// 1. pobranie parametrów 
// Operator ?? oznacza: jeśli parametr nie istnieje, ustaw pusty string.
$kwota = $_GET["kwota"] ?? "";
$lata = $_GET["lata"] ?? "";
$oprocentowanie = $_GET["oprocentowanie"] ?? "";

$errors = [];


$rata = null;

// Sprawdzenie czy formularz został wysłany
if (isset($_GET["kwota"]) || isset($_GET["lata"]) || isset($_GET["oprocentowanie"])) {
// 2. walidacja

// KWOTA
    if ($kwota === "") {
        $errors["kwota"] = "Podaj kwotę kredytu";
    } elseif (!is_numeric($kwota)) {
        $errors["kwota"] = "Kwota musi być liczbą";
    } elseif ($kwota <= 0) {
        $errors["kwota"] = "Kwota musi być większa od 0";
    }

// LATA
    if ($lata === "") {
        $errors["lata"] = "Podaj liczbę lat";
    } elseif (!is_numeric($lata)) {
        $errors["lata"] = "Liczba lat musi być liczbą";
    } elseif ($lata <= 0) {
        $errors["lata"] = "Lata muszą być większe od 0";
    }

// OPROCENTOWANIE
    if ($oprocentowanie === "") {
        $errors["oprocentowanie"] = "Podaj oprocentowanie";
    } elseif (!is_numeric($oprocentowanie)) {
        $errors["oprocentowanie"] = "Oprocentowanie musi być liczbą";
    } elseif ($oprocentowanie < 0) {
        $errors["oprocentowanie"] = "Oprocentowanie nie może być ujemne";
    }

// 3. Obliczenia wykonujemy tylko jeśli nie ma błędów
    if (empty($errors)) {
        
        $kwota = (float)$kwota;
        $lata = (int)$lata;
        $oprocentowanie = (float)$oprocentowanie;

        
        $liczba_rat = $lata * 12;


        $miesieczna_stopa = ($oprocentowanie / 100) / 12;

        
        if ($miesieczna_stopa == 0) {
            $rata = $kwota / $liczba_rat;
        } 
        else {
            $rata = $kwota * ($miesieczna_stopa * pow(1 + $miesieczna_stopa, $liczba_rat))
                / (pow(1 + $miesieczna_stopa, $liczba_rat) - 1);
        }
    }
}

// 4. widok
include "credit_view.php";
