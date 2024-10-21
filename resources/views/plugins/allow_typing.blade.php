<script type="text/javascript">
	// данный скрипт нужен для того, чтобы пользователь мог писать название
	// только когда выберет значение из последнего выпадающего списка
	
	function allowTyping() {
		let select_value = document.querySelector('select[class="choose_for_typing"]').value;

		if (select_value != 0) {
			document.querySelector('input[name="name"]').disabled = false;
			document.querySelector('input[name="latin_name"]').disabled = false;
		}
	}
</script>