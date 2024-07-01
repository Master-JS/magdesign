<?php $this->load->view("header_admin"); ?>
<style>
    .create-form .form-control{
        border-radius: 0.25rem;
        height: auto;
        padding: 15px 20px;
    }

    .select2-container--bootstrap4 .select2-selection{
        padding: 5px 10px;
    }
</style>
<link href="<?= base_url("assets/css/select2.min.css"); ?>" rel="stylesheet">
<link href="<?= base_url("assets/css/select2-bootstrap4.css"); ?>" rel="stylesheet">
<link href="<?= base_url("assets/css/quill.snow.css"); ?>" rel="stylesheet">
        <div class="section post-section pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="heading text-center">Blog Yazısını Düzenle</h2>
                        <form action="<?= base_url("kategori/makale_update/$blog->blog_id"); ?>" id="myForm" method="POST" class="create-form mb-5" enctype="multipart/form-data">
                            <div class="form-group mb-4">
                                <label for="title">Başlık</label>
                                <input type="text" class="form-control" id="title" name="title" value="<?= $blog->title; ?>" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="spot">Spot</label>
                                <input type="text" class="form-control" id="spot" maxlength="200" name="spot" value="<?= $blog->spot; ?>" required>
                                <small id="spot" class="form-text text-muted">En fazla 200 karakter.</small>
                            </div>
                            <div class="form-group mb-4">
                                <label for="makale">Makale</label>
                                <div id="editor-container" style="min-height: 200px;"><?= $blog->makale ?></div>
                                <input type="file" id="fileInput" style="display: none;">
                                <input type="hidden" id="hiddenInput" name="content">
                            </div>
                            <div class="form-group mb-4">
                                <label for="yazar">Yazar</label>
                                <select name="yazar" id="yazar" class="form-control" required>
                                <?php foreach ($yazarlar as $yazar) { ?>
                                    <option value="<?= $yazar->yazar_id ?>" <?= $blog->yazar_id == $yazar->yazar_id ? "selected" : "" ?>><?= $yazar->isim; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kategoriler</label>
                                <select name="kategori[]" class="kategori" multiple placeholder="Kategori Seçiniz">
                                    <?php foreach ($kategoriler as $kategori) { ?>
                                        <option value="<?= $kategori->kategori_id ?>" <?= in_array($kategori->kategori_id, $blog->kategori) ? "selected" : ""; ?>>
                                            <?= $kategori->kategori_name; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <br>
                            <button id="submitBtn" type="submit" class="btn btn-primary btn-block" style="display: block; width: 100%;">Blog Yazısını Güncelle</button>
                        </form>
                        <hr>
                        <br>
                        <form action="<?= base_url("kategori/makale_update_kapak/$blog->blog_id"); ?>" id="myForm2" method="POST" class="create-form" enctype="multipart/form-data">
                            <h5 class="h5 heading text-center">Kapak Fotoğrafını Değiştir</h5>
                            <div class="form-group mb-4">
                                <label for="title">Kapak Resmi</label>
                                <input type="file" class="form-control" id="image" name="image" required>
                            </div>
                            <div class="form-group mb-4">
                                <label>Mevcut Kapak Resmi</label>
                                <hr>
                                <img src="<?= base_url("assets/images/$blog->image"); ?>" alt="Kapak Resmi" class="img-fluid">
                            </div>
                            <button id="submitBtn2" type="submit" class="btn btn-primary btn-block" style="display: block; width: 100%;">Blog Yazısının Kapağını Güncelle</button>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
<?php $this->load->view("footer"); ?>
<script src="<?= base_url("assets/js/jquery-3.3.1.slim.min.js"); ?>"></script>
<script src="<?= base_url("assets/js/select2.min.js"); ?>"></script>
<script>
    $(function () {
        $('select.kategori').each(function () {
            $(this).select2({
                theme: 'bootstrap4',
                width: 'style',
                placeholder: $(this).attr('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });
        });
    });
</script>
<script src="<?= base_url("assets/js/quill.js"); ?> "></script>
<script>
    var toolbarOptions = [
        [{ 'font': [] }],
        [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
        [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
        [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
        [{ 'header': 1 }, { 'header': 2 }],               // custom button values
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
        [{ 'direction': 'rtl' }],                         // text direction
        [{ 'align': [] }],
        ['link', 'image'],
        ['clean']                                         // remove formatting button
    ];

    var quill = new Quill('#editor-container', {
        theme: 'snow',
        modules: {
            toolbar: toolbarOptions
        }
    });

    quill.getModule('toolbar').addHandler('image', function() {
        var fileInput = document.getElementById('fileInput');
        fileInput.click();

        fileInput.onchange = function() {
            var file = fileInput.files[0];
            var formData = new FormData();
            formData.append('file', file);

            fetch('<?= base_url(); ?>/deneme/upload', { // CodeIgniter'daki upload fonksiyonunun URL'si
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(result => {
                if (result.fileUrl) {
                    var range = quill.getSelection();
                    quill.insertEmbed(range.index, 'image', result.fileUrl);
                } else {
                    console.error('Error uploading file:', result.error);
                }
            })
            .catch(error => {
                console.error('Error uploading file:', error);
            });
        };
    });

    $(document).ready(function() {
        $('#myForm').submit(function(e) {
            // Submit işlemi durdurulabilir
            e.preventDefault();
            
            var contents = $('.ql-editor').html(); // QuillJS editöründen içeriği al

            // Gizli input alanına içeriği set et
            $('#hiddenInput').val(contents);

            // Formu submit et
            this.submit();
        });
    });
</script>