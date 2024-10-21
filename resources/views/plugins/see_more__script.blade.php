<script type="text/javascript">
	function showPointers(node) {
		let selector = '.' + node.className + ' ~ ul';
		let list = document.querySelector(selector);
			
		list.classList == 'show' ? list.classList.remove('show') : list.classList.add('show');
	}
</script>