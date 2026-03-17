        </main>

        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="small text-muted">Kalkulator kredytowy</div>
            </div>
        </footer>
    </div>
</div>

<script src="<?= _APP_URL ?>/assets/js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
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
        let raw = resultEl.innerText.replace('zł', '').replace(/\s/g, '').replace(',', '.').trim();
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
</script>

</body>
</html>