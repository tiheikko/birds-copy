<script type="text/javascript">

	function selectGenus() {
		let select_value = document.querySelector('select[name="genus_id"]').value;


		// проверяем, выбран ли определенный отряд
		// если да, отображаем выбор семейства
		if (select_value != 0) {
			document.querySelector('select[name="species_id"]').disabled = false;

			// определяем класс у семейства
			let genus_class = document.querySelector('select[name="genus_id"] option:checked').className;

			// убираем видимость всех пунктов
			// при смене отряда будут убираться ненужные семейства
			document.querySelectorAll('select[name="species_id"] option').forEach(e => e.style.display = "none");

			// проверяем, совпадают ли классы у семейства и рода
			document.querySelectorAll('select[name="species_id"] option').forEach(e => {
				if (e.className.includes(genus_class)) e.style.display = "inline-block";
			});
		}
	}
</script>