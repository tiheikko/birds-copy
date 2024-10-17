<script type="text/javascript">
	function selectCategory() {
		let category = document.querySelector('.wrapper > span').className;

		document.querySelectorAll('nav a').forEach(e => {
			if(e.className.includes(category)) e.classList.add('chosen');
		});
	}

	selectCategory();
</script>