<?php
/* Smarty version 5.8.0, created on 2026-03-21 12:29:17
  from 'file:bottom.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.8.0',
  'unifunc' => 'content_69be810d05cd81_82539704',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc86ee30ca2689d958d184d088003d75847e3d49' => 
    array (
      0 => 'bottom.tpl',
      1 => 1774047311,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_69be810d05cd81_82539704 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\apCreditSmarty\\app\\templates\\smarty';
?>        </main>

        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="small text-muted">Kalkulator kredytowy</div>
            </div>
        </footer>
    </div>
</div>

<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->getValue('app_url');?>
/assets/js/scripts.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/chart.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('creditChart');

    if (ctx && window.creditLabels && window.creditData && window.creditData.length > 0) {
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: window.creditLabels,
                datasets: [{
                    label: 'Rata',
                    data: window.creditData,
                    borderWidth: 3,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
    }

    const resultEl = document.getElementById('resultRate');

    if (resultEl && resultEl.innerText.trim() !== '--') {
        let raw = resultEl.innerText
            .replace('zł', '')
            .replace(/\s/g, '')
            .replace(',', '.')
            .trim();

        let target = parseFloat(raw);

        if (!isNaN(target)) {
            let current = 0;
            let step = target / 30;

            const timer = setInterval(function () {
                current += step;

                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }

                resultEl.innerText = current.toFixed(2).replace('.', ',') + ' zł';
            }, 20);
        }
    }
});
<?php echo '</script'; ?>
>

</body>
</html><?php }
}
