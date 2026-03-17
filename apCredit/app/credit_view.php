<?php 
require_once dirname(__FILE__) . '/../config.php';

// ochrona dostępu
include _ROOT_PATH . '/app/security/check.php';

include _ROOT_PATH . '/app/templates/top.php'; 
?>

<div class="row">
    <div class="col-xl-8">
        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-cash-coin me-2"></i>
                Kalkulator kredytowy
            </div>

            <div class="card-body">
                <form action="<?= _APP_URL ?>/index.php" method="get">
                    <div class="row g-3">

                        <div class="col-md-4">
                            <label class="form-label">Kwota kredytu</label>
                            <input type="text" name="kwota" class="form-control" value="<?= htmlspecialchars($kwota ?? '') ?>">
                            <?php if (!empty($errors['kwota'])): ?>
                                <div class="text-danger small mt-2"><?= htmlspecialchars($errors['kwota']) ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Liczba lat</label>
                            <input type="text" name="lata" class="form-control" value="<?= htmlspecialchars($lata ?? '') ?>">
                            <?php if (!empty($errors['lata'])): ?>
                                <div class="text-danger small mt-2"><?= htmlspecialchars($errors['lata']) ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Oprocentowanie</label>
                            <input type="text" name="oprocentowanie" class="form-control" value="<?= htmlspecialchars($oprocentowanie ?? '') ?>">
                            <?php if (!empty($errors['oprocentowanie'])): ?>
                                <div class="text-danger small mt-2"><?= htmlspecialchars($errors['oprocentowanie']) ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-calculator me-2"></i>Oblicz ratę
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-xl-4">
        <div class="card mb-4">
            <div class="card-header">
                Rata miesięczna
            </div>
            <div class="card-body">
                <h3 class="mb-0" id="resultRate">
                    <?= isset($rata) ? number_format($rata, 2, ',', ' ') . ' zł' : '--' ?>
                </h3>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">

    <div class="col-md-4">
        <div class="card text-center shadow">
            <div class="card-body">
                <div class="text-muted">Liczba rat</div>
                <h4>
                    <?= isset($lata) && is_numeric($lata) ? (int)$lata * 12 : '--' ?>
                </h4>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center shadow">
            <div class="card-body">
                <div class="text-muted">Całkowita spłata</div>
                <h4>
                    <?= (isset($rata, $lata) && is_numeric($lata)) ? number_format($rata * ((int)$lata * 12), 2, ',', ' ') . ' zł' : '--' ?>
                </h4>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center shadow">
            <div class="card-body">
                <div class="text-muted">Odsetki</div>
                <h4>
                    <?= (isset($rata, $lata, $kwota) && is_numeric($lata) && is_numeric($kwota)) ? number_format(($rata * ((int)$lata * 12)) - (float)$kwota, 2, ',', ' ') . ' zł' : '--' ?>
                </h4>
            </div>
        </div>
    </div>

</div>

<div class="card mt-4 shadow">
    <div class="card-header">
        Wykres rat kredytu
    </div>

    <div class="card-body">
        <canvas id="creditChart"></canvas>
    </div>
</div>

<?php
$chartLabels = [];
$chartData = [];

if (isset($rata, $lata) && is_numeric($lata)) {
    $liczbaRat = (int)$lata * 12;

    if ($liczbaRat > 0) {
        $maxPoints = min($liczbaRat, 24); // pokaż maks. 24 punkty na wykresie
        for ($i = 1; $i <= $maxPoints; $i++) {
            $chartLabels[] = 'Rata ' . $i;
            $chartData[] = round($rata, 2);
        }
    }
}
?>

<script>
    window.creditLabels = <?= json_encode($chartLabels) ?>;
    window.creditData = <?= json_encode($chartData) ?>;
</script>

<?php include _ROOT_PATH . '/app/templates/bottom.php'; ?>