<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <title>QuillJS with CodeIgniter</title>
</head>
<body>
    <div id="editor-container" style="height: 400px;"></div>
    <input type="file" id="fileInput" style="display: none;">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
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
            ['link', 'image', 'video'],
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

                fetch('deneme/upload', { // CodeIgniter'daki upload fonksiyonunun URL'si
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
    </script>
</body>
</html>
