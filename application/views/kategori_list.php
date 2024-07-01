<?php $this->load->view("header_admin"); ?>
<style>
    .link-btn{
        border: 8px #000; 
        margin: 5px 10px; 
        border-radius: 15px; 
        padding: 10px 15px;
    }
</style>
<div class="section pt-5 pb-0">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-9">
                <div class="d-flex">
                    <h2 class="heading">'Kategoriler'</h2>
                </div>
                <form action="<?= base_url("Af45sdieD/kategori_insert"); ?>" method="POST">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group mb-4">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Kategori İsmi Giriniz"  required>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <div class="form-group mb-4">
                                <button class="form-control btn btn-primary">Yeni bir kategori oluştur</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php if (!empty($kategoriler)) { ?>
                <div class="col-lg-9">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Başlık</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($kategoriler as $row) { ?>
                            <tr>
                                <form action="<?= base_url("Af45sdieD/kategori_update/$row->kategori_id"); ?>" method="POST">
                                    <th scope="row"><?= "#".$row->kategori_id; ?></th>
                                    <td><input type="text" class="form-control" id="title" name="title" value="<?= $row->kategori_name ?>"  required></td>
                                    <td>
                                        <button class="link-btn" type="submit">Güncelle</button>
                                        <a href="<?= base_url("Af45sdieD/kategori_delete/$row->kategori_id"); ?>">
                                            <button class="link-btn" type="button">Sil</button>
                                        </a>
                                    </td>
                                </form>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>





                        <!-- <div class="post-entry d-md-flex small-horizontal mb-5">
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
                        </div> -->
                </div>
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
