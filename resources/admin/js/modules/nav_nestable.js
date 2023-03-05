//Инициализация nestable для услуг
$(document).ready(function () {
	$('.services_nestable').nestable({
		maxDepth: 1,
	})

	$('.services_nestable').on('change', function () {
		let data = $(this).nestable('serialize');

		const wrapper = document.querySelector('.services_nestable');
		if (wrapper) {
			const action = wrapper.getAttribute('data-send');

			axios.post(action, {data: data}).then(function (response) {
				console.log(response)
			}).catch(function (error) {
				console.error(error)
			})
		}
	});

});
