document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems);
});

window.addEventListener('load', () => {
    charge_page();

    function charge_page() {
        document.getElementById('charge').className = 'hide';
        document.getElementById('content_page').className = '';
    }
});

$(document).ready(function () {
    $('.sidenav').sidenav();
});

$(document).on('click', '.btn-edit', function () {
    let element = $(this)[0];
    let old_name = $(element).attr('f_name');
    let file_extension = $(element).attr('f_extension');
    document.getElementById('old_name').value = old_name;
    document.getElementById('file_extension').value = file_extension;
});

$(document).on('click', '.btn-delete', function () {
    let element = $(this)[0];
    let old_name = $(element).attr('f_name');
    let file_extension = $(element).attr('f_extension');
    document.getElementById('file_name_delete').value = old_name;
    document.getElementById('file_extension_delete').value = file_extension;
});

var uploadedFile = document.getElementById('uploadedfile');

uploadedFile.addEventListener('change', (e) => {
    var fileSize = e.target.files[0].size;
    var siezekiloByte = parseInt(fileSize / 20480);

    if (siezekiloByte > 1024) {
        document.getElementById('idUploadError').className = '';
        document.getElementById('idUploadError_2').className = '';
        document.getElementById('idUploadBtn').className = 'waves-effect waves-light btn disabled green accent-4';
    } else {
        document.getElementById('idUploadBtn').className = 'waves-effect waves-light btn green accent-4';
        document.getElementById('idUploadError').className = 'hide';
        document.getElementById('idUploadError_2').className = 'hide';
    }
});
