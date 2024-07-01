<?php $this->load->view("header"); ?>
<div class="section pt-5 pb-0">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-9"> 
                <h2 class="heading">'Blog Yazıları'</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php if (!empty($blogs)) { ?>
                <?php foreach ($blogs as $row) { ?>
                    <div class="col-lg-9">
                        <div class="post-entry d-md-flex small-horizontal mb-5">
                            <div class="me-md-5 thumbnail mb-3 mb-md-0">
                                <a href="<?= base_url("detay/$row->blog_id"); ?>">
                                    <img src="<?= base_url("assets/images/$row->image") ?>" alt="Image" class="img-fluid">
                                </a>
                            </div>
                            <div class="content">
                                <div class="post-meta mb-3">
                                    <?php
                                    $dizi = explode(',', $row->kategori);
                                    $kategori = $this->db->where_in("kategori_id", $dizi)->get("katagoriler")->result();
                                    $kategori_names = [];
                                    foreach ($kategori as $kat_row) {
                                        $kategori_names[] =  '<a href="#" class="category">'.$kat_row->kategori_name.'</a>';
                                    }
                                    echo implode(", ", $kategori_names);
                                    ?>
                                    &mdash;
                                    <span class="date"><?= $this->date_model->get_tarih($row->date); ?></span>
                                </div>
                                <h2 class="heading"><a href="<?= base_url("detay/$row->blog_id") ?>"><?= $row->title; ?></a></h2>
                                <p><?=  $row->spot ?></p>
                                <?php $yazar = $this->db->where("yazar_id", $row->yazar_id)->get("yazarlar")->row(); ?>
                                <a href="#" class="post-author d-flex align-items-center">
                                    <div class="author-pic">
                                        <img src="<?= base_url("assets/images/$yazar->yazar_image") ?>" alt="Image">
                                    </div>
                                    <div class="text">
                                        <span>Yazar:</span>
                                        <strong><?= $yazar->isim; ?></strong>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <p>Henüz blog yazısı bulunmamaktadır.</p>
            <?php } ?>
        </div>
        <div class="row align-items-center justify-content-center py-5">
            <div class="col-lg-6 text-center">
                <div class="custom-pagination">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("footer"); ?>
