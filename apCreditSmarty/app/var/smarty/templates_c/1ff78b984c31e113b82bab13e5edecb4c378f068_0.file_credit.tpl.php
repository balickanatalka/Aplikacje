<?php
/* Smarty version 5.8.0, created on 2026-03-20 23:56:20
  from 'file:credit.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_69bdd0942c9f82_77287397',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ff78b984c31e113b82bab13e5edecb4c378f068' => 
    array (
      0 => 'credit.tpl',
      1 => 1774047373,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:top.tpl' => 1,
    'file:bottom.tpl' => 1,
  ),
))) {
function content_69bdd0942c9f82_77287397 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\apCredit\\app\\templates\\smarty';
$_smarty_tpl->renderSubTemplate("file:top.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>

<div class="row">
    <div class="col-xl-8">
        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-cash-coin me-2"></i>
                Kalkulator kredytowy
            </div>

            <div class="card-body">
                <form action="<?php echo $_smarty_tpl->getValue('app_url');?>
/index.php" method="get">
                    <div class="row g-3">

                        <div class="col-md-4">
                            <label class="form-label">Kwota kredytu</label>
                            <input type="text" name="kwota" class="form-control" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('kwota'), ENT_QUOTES, 'UTF-8', true);?>
">
                            <?php if (!( !true || empty($_smarty_tpl->getValue('errors')['kwota']))) {?>
                                <div class="text-danger small mt-2"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('errors')['kwota'], ENT_QUOTES, 'UTF-8', true);?>
</div>
                            <?php }?>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Liczba lat</label>
                            <input type="text" name="lata" class="form-control" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('lata'), ENT_QUOTES, 'UTF-8', true);?>
">
                            <?php if (!( !true || empty($_smarty_tpl->getValue('errors')['lata']))) {?>
                                <div class="text-danger small mt-2"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('errors')['lata'], ENT_QUOTES, 'UTF-8', true);?>
</div>
                            <?php }?>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Oprocentowanie</label>
                            <input type="text" name="oprocentowanie" class="form-control" value="<?php echo htmlspecialchars((string)$_smarty_tpl->getValue('oprocentowanie'), ENT_QUOTES, 'UTF-8', true);?>
">
                            <?php if (!( !true || empty($_smarty_tpl->getValue('errors')['oprocentowanie']))) {?>
                                <div class="text-danger small mt-2"><?php echo htmlspecialchars((string)$_smarty_tpl->getValue('errors')['oprocentowanie'], ENT_QUOTES, 'UTF-8', true);?>
</div>
                            <?php }?>
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
                    <?php if ($_smarty_tpl->getValue('rata') !== null) {?>
                        <?php echo $_smarty_tpl->getSmarty()->getModifierCallback('number_format')($_smarty_tpl->getValue('rata'),2,","," ");?>
 zł
                    <?php } else { ?>
                        --
                    <?php }?>
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
                <h4><?php echo $_smarty_tpl->getValue('liczbaRatWidok');?>
</h4>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center shadow">
            <div class="card-body">
                <div class="text-muted">Całkowita spłata</div>
                <h4><?php echo $_smarty_tpl->getValue('calkowitaSplataWidok');?>
</h4>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center shadow">
            <div class="card-body">
                <div class="text-muted">Odsetki</div>
                <h4><?php echo $_smarty_tpl->getValue('odsetkiWidok');?>
</h4>
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

<?php echo '<script'; ?>
>
    window.creditLabels = <?php echo json_encode($_smarty_tpl->getValue('chartLabels'));?>
;
    window.creditData = <?php echo json_encode($_smarty_tpl->getValue('chartData'));?>
;
<?php echo '</script'; ?>
>

<?php $_smarty_tpl->renderSubTemplate("file:bottom.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
}
}
