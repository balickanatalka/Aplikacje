<?php

// 1. pobranie parametrów
// Operator ?? oznacza: jeśli parametr nie istnieje, ustaw pusty string.
$kwota = $_GET["kwota"] ?? "";
$lata = $_GET["lata"] ?? "";
$oprocentowanie = $_GET["oprocentowanie"] ?? "";


$error = "";

$rata = null;

// Sprawdzenie czy użytkownik w ogóle podał jakieś dane w formularzu
if ($kwota !== "" || $lata !== "" || $oprocentowanie !== "") {

    // 2. walidacja  

    // Sprawdzenie czy wszystkie pola są wypełnione
    if ($kwota === "" || $lata === "" || $oprocentowanie === ""){
        $error = "Proszę wypełnić wszystkie pola";
    }
    // Sprawdzenie czy wartości są liczbami
    elseif (!is_numeric($kwota) || !is_numeric($lata) || !is_numeric($oprocentowanie)){
        $error = "Proszę podać poprawne liczby";
    }
    // Sprawdzenie zakresów wartości
    elseif ($kwota <= 0 || $lata <= 0 || $oprocentowanie < 0){
        $error = "Kwota i lata muszą być większe od 0";
    }

    // 3. zadanie
    if ($error === "") {

        // Konwersja typów na liczby
        $kwota = (float)$kwota;
        $lata = (int)$lata;
        $oprocentowanie = (float)$oprocentowanie;

        
        $liczba_rat = $lata * 12;

        
        $miesieczna_stopa = ($oprocentowanie / 100) / 12;

        
        if ($miesieczna_stopa == 0){
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


