</div>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright HOPE © 2025 <a href="#">HOPE</a> Company. All rights reserved.
                    <br>Design: <a href="https://templatemo.com" target="_blank"
                        title="free CSS templates">TemplateMo</a> Distribution: <a href="https://themewagon.com target="
                        _blank">ThemeWagon</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo RUTA_BASE; ?>assets/bootstrap/js/bootstrap.bundle.js"></script>

<script src="<?php echo RUTA_BASE; ?>assets/js/isotope.min.js"></script>
<script src="<?php echo RUTA_BASE; ?>assets/js/owl-carousel.js"></script>
<script src="<?php echo RUTA_BASE; ?>assets/js/tabs.js"></script>
<script src="<?php echo RUTA_BASE; ?>assets/js/popup.js"></script>
<script src="<?php echo RUTA_BASE; ?>assets/js/custom.js"></script>


<script>
function bannerSwitcher() {
    next = $('.sec-1-input').filter(':checked').next('.sec-1-input');
    if (next.length) next.prop('checked', true);
    else $('.sec-1-input').first().prop('checked', true);
}

var bannerTimer = setInterval(bannerSwitcher, 5000);

$('nav .controls label').click(function() {
    clearInterval(bannerTimer);
    bannerTimer = setInterval(bannerSwitcher, 5000)
});
</script>

</html>