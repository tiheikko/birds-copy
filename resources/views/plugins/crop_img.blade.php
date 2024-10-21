<script src="https://unpkg.com/croppie/croppie.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var croppieContainer = document.getElementById('croppie-container');
        var uploadInput = document.getElementById('upload_new_img');
        var croppedImageInput = document.getElementById('cropped_image');

        var croppie = new Croppie(croppieContainer, {
            enableExif: true,
            viewport: {
                width: 300,
                height: 300,
                type: 'square' // тип обрезки: square, circle и т. д.
            },
            boundary: {
                width: 400,
                height: 400
            }
        });

        uploadInput.addEventListener('change', function () {
            var reader = new FileReader();
            reader.onload = function (e) {
                croppie.bind({
                    url: e.target.result
                });
            }
            reader.readAsDataURL(this.files[0]);
        });

        document.querySelector('form').addEventListener('submit', function (ev) {
            ev.preventDefault(); // предотвращаем стандартное поведение формы

            croppie.result({
                type: 'base64',
                size: { width: 300, height: 300 }
            }).then(function (resp) {
                croppedImageInput.value = resp;
                document.querySelector('form').submit(); // отправляем форму после установки значения
            });
        });
    });
</script>
