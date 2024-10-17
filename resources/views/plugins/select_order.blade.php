<script type="text/javascript">
		// у отряда класс выглядит как "Passeriformes"
		// у семейства как "Passeriformes Passeridae"
		// так что для отображения семейств только связанных с отрядом
		// функция будет искать те, у которых в класс семейства входит класс отряда

		function selectOrder() {
			let select_value = document.querySelector('select[name="order_id"]').value;

			// проверяем, выбран ли определенный отряд
			// если да, отображаем выбор семейства
			if (select_value != 0) {
				document.querySelector('select[name="family_id"]').disabled = false;

				// определяем класс у отряда
				let order_class = document.querySelector('select[name="order_id"] option:checked').className;

				// убираем видимость всех пунктов
				// при смене отряда будут убираться ненужные семейства
				document.querySelectorAll('select[name="family_id"] option').forEach(e => e.style.display = "none");

				// проверяем, входит ли подстрока с классом отряда в строку с классом семейства
				document.querySelectorAll('select[name="family_id"] option').forEach(e => {
					if (e.className.includes(order_class)) e.style.display = "inline-block";
				});
			}
		}

</script>