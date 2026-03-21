{include file="top.tpl"}

<div class="row">
    <div class="col-xl-8">
        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-cash-coin me-2"></i>
                Kalkulator kredytowy
            </div>

            <div class="card-body">
                <form action="{$app_url}/index.php" method="get">
                    <div class="row g-3">

                        <div class="col-md-4">
                            <label class="form-label">Kwota kredytu</label>
                            <input type="text" name="kwota" class="form-control" value="{$kwota|escape}">
                            {if !empty($errors.kwota)}
                                <div class="text-danger small mt-2">{$errors.kwota|escape}</div>
                            {/if}
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Liczba lat</label>
                            <input type="text" name="lata" class="form-control" value="{$lata|escape}">
                            {if !empty($errors.lata)}
                                <div class="text-danger small mt-2">{$errors.lata|escape}</div>
                            {/if}
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Oprocentowanie</label>
                            <input type="text" name="oprocentowanie" class="form-control" value="{$oprocentowanie|escape}">
                            {if !empty($errors.oprocentowanie)}
                                <div class="text-danger small mt-2">{$errors.oprocentowanie|escape}</div>
                            {/if}
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
            <div class="card-header">Rata miesięczna</div>
            <div class="card-body">
                <h3 class="mb-0" id="resultRate">
                    {if $rata !== null}
                        {$rata|number_format:2:",":" "} zł
                    {else}
                        --
                    {/if}
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
                <h4>{$liczbaRatWidok}</h4>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center shadow">
            <div class="card-body">
                <div class="text-muted">Całkowita spłata</div>
                <h4>{$calkowitaSplataWidok}</h4>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center shadow">
            <div class="card-body">
                <div class="text-muted">Odsetki</div>
                <h4>{$odsetkiWidok}</h4>
            </div>
        </div>
    </div>

</div>

<div class="card mt-4 shadow">
    <div class="card-header">Wykres rat kredytu</div>
    <div class="card-body">
        <canvas id="creditChart"></canvas>
    </div>
</div>

<script>
    window.creditLabels = {$chartLabels|json_encode};
    window.creditData = {$chartData|json_encode};
</script>

{include file="bottom.tpl"}