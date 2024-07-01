<div class="py-5 bg-light mx-md-3 sec-subscribe">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="h4 fw-bold">Bültenimize Kayıt Olun!</h2>
                    </div>
                </div>
                <form action="<?= base_url("/mail"); ?>" method="POST" class="row">
                    <div class="col-md-8">
                        <div class="mb-3 mb-md-0">
                            <input type="email" class="form-control" name="mail" placeholder="Mail Adresinizi Giriniz.">
                        </div>
                    </div>
                    <div class="col-md-4 d-grid">
                        <input type="submit" class="btn btn-primary" value="Kayıt Ol">
                    </div>
                </form>
            </div>
        </div>
        <div class="site-footer">
        <div class="container">
            <div class="row justify-content-center copyright">
                <div class="col-lg-7 text-center">
                    <div class="widget">
                        <ul class="social list-unstyled">
                            <li><a href="#"><span class="icon-facebook"></span></a></li>
                            <li><a href="#"><span class="icon-twitter"></span></a></li>
                            <li><a href="#"><span class="icon-linkedin"></span></a></li>
                            <li><a href="#"><span class="icon-youtube-play"></span></a></li>
                        </ul>
                    </div>
                    <div class="widget">
                        <div class="d-block">
                        <a href="#"> Copyright &copy; <script>document.write(new Date().getFullYear());</script> Tevhid AI | Tüm Hakları Saklıdır. </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="overlayer"></div>
        <div class="loader">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <script src="<?= base_url("assets/") ?>js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url("assets/") ?>js/tiny-slider.js"></script>
        <script src="<?= base_url("assets/") ?>js/glightbox.min.js"></script>
        <script src="<?= base_url("assets/") ?>js/aos.js"></script>
        <script src="<?= base_url("assets/") ?>js/navbar.js"></script>
        <script src="<?= base_url("assets/") ?>js/counter.js"></script>
        <script src="<?= base_url("assets/") ?>js/custom.js"></script>
    </body>
    <!-- Mirrored from preview.colorlib.com/theme/magdesign/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 24 Nov 2022 11:42:02 GMT -->
</html>