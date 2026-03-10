<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>

<body>

<h2>Kalkulator kredytowy</h2>

<form action="credit.php" method="GET">
    Kwota kredytu:
    <input type="text" name="kwota" value="<?= htmlspecialchars($kwota ?? '') ?>"><br>

    Liczba lat:
    <input type="text" name="lata" value="<?= htmlspecialchars($lata ?? '') ?>"><br>

    Oprocentowanie roczne:
    <input type="text" name="oprocentowanie" value="<?= htmlspecialchars($oprocentowanie ?? '') ?>"><br>

    <input type="submit" value="Oblicz ratę">
</form>

<?php
if (isset($rata) && $rata !== null ): ?>
    <h2>Miesięczna rata: <?= round($rata, 2) ?> zł</h2>
<?php
endif; ?>

<?php
if (!empty($error)): ?>
    <div style="color:red">
        Błąd: <?= htmlspecialchars($error) ?>
    </div>
<?php
endif; ?>

</body>
</html>
