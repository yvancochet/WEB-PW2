//Get an image preview when uploading an image + check image size
function previewImage(input) {
    var preview = document.getElementById('imagePreview');
    var fileInput = document.getElementById('imageInput');

    if (fileInput.files && fileInput.files[0]) {
        // Check file size
        if (fileInput.files[0].size > 50000) { // 50 KB in bytes
            alert('File size exceeds the maximum allowed (50 KB). Please choose a smaller image.');
            fileInput.value = ''; // Clear the file input
            preview.style.display = 'none'; // Hide the preview
            return
        }

        var reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
        };

        reader.readAsDataURL(fileInput.files[0]);
    }
}

//Hide success or failure messages after 5 seconds
document.addEventListener('DOMContentLoaded', function () {
    const successMessage = document.getElementById('success-message');

    if (successMessage) {
        setTimeout(function () {
            successMessage.style.display = 'none';
        }, 5000);
    }
});