        </div><!-- /.page-content -->
    </div><!-- /.main-content -->
</div><!-- /.app-wrapper -->

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Admin Theme JS -->
<script src="../assets/js/admin-theme.js"></script>

<?php if (isset($extra_js)) echo $extra_js; ?>

<!-- Live clock -->
<script>
function updateClock() {
    const now = new Date();
    const opts = { weekday:'short', month:'short', day:'2-digit', hour:'2-digit', minute:'2-digit' };
    const el = document.getElementById('topbarTime');
    if (el) el.textContent = now.toLocaleString('en-KE', opts);
}
updateClock();
setInterval(updateClock, 60000);
</script>

</body>
</html>
