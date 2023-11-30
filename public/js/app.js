//Get an image preview when uploading an image + check image size
function previewImage(input) {
    var preview = document.getElementById('imagePreview');
    var fileInput = document.getElementById('imageInput');

    if (fileInput.files && fileInput.files[0]) {
        // Check file size
        if (fileInput.files[0].size > 50000) { // 50 KB in bytes
            alert('File size exceeds the maximum allowed (50 KB). Please choose a smaller image.');
            return
        }

        var reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
        };

        reader.readAsDataURL(fileInput.files[0]);
    }
}

//User nice button to open ugly file input
function openFileInput() {
    document.getElementById('imageInput').click();
}

//Hide success or failure messages after 3 seconds
document.addEventListener('DOMContentLoaded', function () {
    const successMessage = document.getElementById('message');

    if (successMessage) {
        setTimeout(function () {
            successMessage.style.display = 'none';
        }, 3000);
    }
});

