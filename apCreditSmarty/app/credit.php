<?php
require_once dirname(__FILE__) . '/../config.php';

// ochrona
include _ROOT_PATH . '/app/security/check.php';

// ----------------------
// 1. Dane wejściowe
// ----------------------
$kwota = $_GET['kwota'] ?? '';
$lata = $_GET['lata'] ?? '';
$oprocentowanie = $_GET['oprocentowanie'] ?? '';

$errors = [];
$rata = null;

// wartości pomocnicze do widoku
$liczbaRatWidok = '--';
$calkowitaSplataWidok = '--';
$odsetkiWidok = '--';

// dane do wykresu
$chartLabels = [];
$chartData = [];

// ----------------------
// 2. Walidacja + obliczenia
// ----------------------
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['kwota'])) {

    if (!is_numeric($kwota) || (float)$kwota <= 0) {
        $errors['kwota'] = 'Podaj poprawną kwotę';
    }

    if (!is_numeric($lata) || (float)$lata <= 0) {
        $errors['lata'] = 'Podaj poprawną liczbę lat';
    }

    if (!is_numeric($oprocentowanie) || (float)$oprocentowanie < 0) {
        $errors['oprocentowanie'] = 'Podaj poprawne oprocentowanie';
    }

    if (empty($errors)) {
        $kwotaNum = (float)$kwota;
        $lataNum = (float)$lata;
        $oprocentowanieNum = (float)$oprocentowanie;

        $liczba_rat = (int)($lataNum * 12);
        $miesieczna_stopa = ($oprocentowanieNum / 100) / 12;

        if ($miesieczna_stopa == 0) {
            $rata = $kwotaNum / $liczba_rat;
        } else {
            $rata = $kwotaNum * ($miesieczna_stopa * pow(1 + $miesieczna_stopa, $liczba_rat))
                / (pow(1 + $miesieczna_stopa, $liczba_rat) - 1);
        }

        // wartości do widoku
        $liczbaRatWidok = $liczba_rat;
        $calkowitaSplata = $rata * $liczba_rat;
        $odsetki = $calkowitaSplata - $kwotaNum;

        $calkowitaSplataWidok = number_format($calkowitaSplata, 2, ',', ' ') . ' zł';
        $odsetkiWidok = number_format($odsetki, 2, ',', ' ') . ' zł';

        // wykres
        $maxPoints = min($liczba_rat, 24);
        for ($i = 1; $i <= $maxPoints; $i++) {
            $chartLabels[] = 'Rata ' . $i;
            $chartData[] = round($rata, 2);
        }
    }
}

// ----------------------
// 3. Smarty
// ----------------------
require_once(__DIR__ . '/../vendor/smarty/libs/Smarty.class.php');

$smarty = new Smarty\Smarty;

$smarty->setTemplateDir(__DIR__ . '/templates/smarty');
$smarty->setCompileDir(__DIR__ . '/var/smarty/templates_c');
$smarty->setCacheDir(__DIR__ . '/var/smarty/cache');
$smarty->setConfigDir(__DIR__ . '/var/smarty/configs');

// ----------------------
// 4. Przekazanie danych
// ----------------------
$role = $_SESSION['role'] ?? '';

$smarty->assign('app_url', _APP_URL);
$smarty->assign('role', $role);
$smarty->assign('kwota', $kwota);
$smarty->assign('lata', $lata);
$smarty->assign('oprocentowanie', $oprocentowanie);
$smarty->assign('errors', $errors);
$smarty->assign('rata', $rata);
$smarty->assign('liczbaRatWidok', $liczbaRatWidok);
$smarty->assign('calkowitaSplataWidok', $calkowitaSplataWidok);
$smarty->assign('odsetkiWidok', $odsetkiWidok);
$smarty->assign('chartLabels', $chartLabels);
$smarty->assign('chartData', $chartData);

// ----------------------
// 5. Render
// ----------------------
$smarty->display('credit.tpl');