<?php $this->load->view("header_admin"); ?>
<style>
    .create-form .form-control{
        border-radius: 0.25rem;
        height: auto;
        padding: 15px 20px;
    }
</style>
        <div class="section post-section pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <form action="<?= base_url("Af45sdieD/yazar_update/$yazar->yazar_id"); ?>" method="POST" class="create-form" enctype="multipart/form-data">
                            <h2 class="heading text-center">Yazar Bilgilerini Değiştir</h2>
                            <div class="form-group mb-4">
                                <label for="title">Başlık</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?= $yazar->isim; ?>" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="title">Kapak Resmi</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="form-group mb-4">
                                <label>Mevcut Kapak Resmi</label>
                                <hr>
                                <img style="width: 200px;" src="<?= base_url("assets/images/$yazar->yazar_image"); ?>" alt="Kapak Resmi" class="img-fluid">
                            </div>
                            <button id="submitBtn2" type="submit" class="btn btn-primary" style="display: block; width: 100%;">Yazar Bilgilerini Güncelle</button>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
<?php $this->load->view("footer"); ?>