<?php $this->load->view("header"); ?>
    <style> img{ max-width: 100%; } </style>
    <div class="section post-section pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center">
                        <img src="<?= base_url("assets/"); ?>images/person_1.jpg" alt="Image" class="author-pic img-fluid rounded-circle mx-auto">
                    </div>
                    <span class="d-block text-center"><?= $yazar->isim; ?></span>
                    <span class="date d-block text-center small text-uppercase text-black-50 mb-5"><?= $this->date_model->get_tarih($blog->date); ?></span>
                    <h2 class="heading text-center"><?= $blog->title; ?></h2>
                    <?= $blog->makale; ?>
                    <div class="row mt-5 pt-5 border-top">
                        <div class="col-12">
                            <span class="fw-bold text-black small mb-1">Paylaş</span>
                            <ul class="social list-unstyled">
                                <li><a href="#"><span class="icon-facebook"></span></a></li>
                                <li><a href="#"><span class="icon-twitter"></span></a></li>
                                <li><a href="#"><span class="icon-linkedin"></span></a></li>
                                <li><a href="#"><span class="icon-pinterest"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="heading">Related</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="post-entry d-md-flex small-horizontal mb-5">
                        <div class="me-md-5 thumbnail mb-3 mb-md-0">
                            <img src="<?= base_url("assets/"); ?>images/img_2.jpg" alt="Image" class="img-fluid">
                        </div>
                        <div class="content">
                            <div class="post-meta mb-3">
                                <a href="#" class="category">Business</a>, <a href="#" class="category">Travel</a> &mdash;
                                <span class="date">July 2, 2020</span>
                            </div>
                            <h2 class="heading"><a href="single.html">Your most unhappy customers are your greatest source of learning.</a></h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                            <a href="#" class="post-author d-flex align-items-center">
                                <div class="author-pic">
                                    <img src="<?= base_url("assets/"); ?>images/person_1.jpg" alt="Image">
                                </div>
                                <div class="text">
                                    <strong>Sergy Campbell</strong>
                                    <span>Author, 26 published post</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="post-entry d-md-flex small-horizontal mb-5">
                        <div class="me-md-5 thumbnail mb-3 mb-md-0">
                            <img src="<?= base_url("assets/"); ?>images/img_3.jpg" alt="Image" class="img-fluid">
                        </div>
                        <div class="content">
                            <div class="post-meta mb-3">
                                <a href="#" class="category">Business</a>, <a href="#" class="category">Travel</a> &mdash;
                                <span class="date">July 2, 2020</span>
                            </div>
                            <h2 class="heading"><a href="single.html">Your most unhappy customers are your greatest source of learning.</a></h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                            <a href="#" class="post-author d-flex align-items-center">
                                <div class="author-pic">
                                    <img src="<?= base_url("assets/"); ?>images/person_1.jpg" alt="Image">
                                </div>
                                <div class="text">
                                    <strong>Sergy Campbell</strong>
                                    <span>Author, 26 published post</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="post-entry d-md-flex small-horizontal mb-5">
                        <div class="me-md-5 thumbnail mb-3 mb-md-0">
                            <img src="<?= base_url("assets/"); ?>images/img_4.jpg" alt="Image" class="img-fluid">
                        </div>
                        <div class="content">
                            <div class="post-meta mb-3">
                                <a href="#" class="category">Business</a>, <a href="#" class="category">Travel</a> &mdash;
                                <span class="date">July 2, 2020</span>
                            </div>
                            <h2 class="heading"><a href="single.html">Your most unhappy customers are your greatest source of learning.</a></h2>
                            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                            <a href="#" class="post-author d-flex align-items-center">
                                <div class="author-pic">
                                    <img src="<?= base_url("assets/"); ?>images/person_1.jpg" alt="Image">
                                </div>
                                <div class="text">
                                    <strong>Sergy Campbell</strong>
                                    <span>Author, 26 published post</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view("footer"); ?>
<script src="<?= base_url("assets/js/jquery-3.3.1.slim.min.js"); ?>"></script>

