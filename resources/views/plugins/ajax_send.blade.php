<script type="text/javascript">
    document.getElementById('i_saw__button').addEventListener('submit', function(event){
       event.preventDefault();

       let formData = new FormData(this);
       let actionURL = this.action;

       fetch(actionURL, {
           method: 'POST',
           body: formData,
           headers: {
               'Accept': 'application/json',
               'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
           }
       })
           .then(response => response.json())
           .then(data => {
               console.log(data);
               document.getElementById('message').innerText = "Данные успешно отправлены!";
           })
           .catch(error => console.error('Error: ', error));
    });
</script>
