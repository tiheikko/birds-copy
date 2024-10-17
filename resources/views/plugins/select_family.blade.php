<script type="text/javascript">
		// у семейства и рода класс совпадает("Passeriformes Passeridae")
		// так что для отображения рода только связанных с семейством
		// функция будет искать те, у которых в класс рода совпадает с классом семейства
		function selectFamily() {
			let select_value = document.querySelector('select[name="family_id"]').value;


			// проверяем, выбран ли определенный отряд
			// если да, отображаем выбор семейства
			if (select_value != 0) {
				document.querySelector('select[name="genus_id"]').disabled = false;

				// определяем класс у семейства
				let family_class = document.querySelector('select[name="family_id"] option:checked').className;

				// убираем видимость всех пунктов
				// при смене отряда будут убираться ненужные семейства
				document.querySelectorAll('select[name="genus_id"] option').forEach(e => e.style.display = "none");

				// проверяем, совпадают ли классы у семейства и рода
				document.querySelectorAll('select[name="genus_id"] option').forEach(e => {
					if (e.className.includes(family_class)) e.style.display = "inline-block";
				});
			}
		}
</script>