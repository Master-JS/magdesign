<?php $this->load->view("header_admin"); ?>
<style>
    .link-btn{
        border: 8px #000; 
        margin: 5px 10px; 
        border-radius: 15px; 
        padding: 10px 15px;
    }

    .create-form .form-control{
        border-radius: 0.25rem;
        height: auto;
        padding: 15px 20px;
    }

</style>
<div class="section pt-5 pb-0">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-9">
                <div class="d-flex">
                    <h2 class="heading">'Yazarlar'</h2>
                </div>
                <div class="row">
                    <form action="<?= base_url("Af45sdieD/yazar_insert"); ?>" method="POST" class="create-form" enctype="multipart/form-data">
                        <div class="form-group mb-4">
                            <label for="title">Yazar İsmi</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group mb-4">
                            <label for="title">Kapak Resmi</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                        <button type="submit" class="btn btn-primary" style="display: block; width: 100%;">Yazar Oluştur</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php if (!empty($yazarlar)) { ?>
                <div class="col-lg-9">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">İsim</th>
                                <th scope="col">Fotoğraf</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($yazarlar as $row) { ?>
                            <tr>
                                <form action="<?= base_url("Af45sdieD/kategori_update/$row->yazar_id"); ?>" method="POST">
                                    <th scope="row"><?= "#".$row->yazar_id; ?></th>
                                    <td><?= $row->isim; ?> </td>
                                    <td>
                                        <div class="author-pic">
                                            <img height="50px" src="<?= base_url("assets/images/$row->yazar_image") ?>" alt="Image">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="<?= base_url("Af45sdieD/edit_yazar/$row->yazar_id"); ?>">
                                            <button class="link-btn" type="button">Düzenle</button>
                                        </a>
                                        <a href="<?= base_url("Af45sdieD/yazar_delete/$row->yazar_id"); ?>">
                                            <button class="link-btn" type="button">Sil</button>
                                        </a>
                                    </td>
                                </form>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
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
