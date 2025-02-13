document.addEventListener("DOMContentLoaded", function () {
    let editors = document.querySelectorAll('.ckeditor');

    editors.forEach(function (editor) {
        ClassicEditor
            .create(editor)
            .catch(error => {
                console.error(error);
            });
    });
});
