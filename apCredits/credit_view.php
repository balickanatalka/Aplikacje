<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>

<body>

<h2>Kalkulator kredytowy</h2>

<form action="credit.php" method="GET">

    Kwota kredytu:
    <input type="text" name="kwota" value="<?= htmlspecialchars($kwota ?? '') ?>">
    <?php if (!empty($errors['kwota'])): ?>
        <div style="color:red"><?= htmlspecialchars($errors['kwota']) ?></div>
    <?php endif; ?>
    <br>

    Liczba lat:
    <input type="text" name="lata" value="<?= htmlspecialchars($lata ?? '') ?>">
    <?php if (!empty($errors['lata'])): ?>
        <div style="color:red"><?= htmlspecialchars($errors['lata']) ?></div>
    <?php endif; ?>
    <br>

    Oprocentowanie roczne:
    <input type="text" name="oprocentowanie" value="<?= htmlspecialchars($oprocentowanie ?? '') ?>">
    <?php if (!empty($errors['oprocentowanie'])): ?>
        <div style="color:red"><?= htmlspecialchars($errors['oprocentowanie']) ?></div>
    <?php endif; ?>
    <br>

    <input type="submit" value="Oblicz ratę">

</form>

<?php if (isset($rata) && $rata !== null): ?>
    <h2>Miesięczna rata: <?= round($rata, 2) ?> zł</h2>
<?php endif; ?>

</body>
</html>
