$(document).ready(function () {
	$('.nestable').nestable({
		maxDepth: 5,
	});

	$('.nestable').on('change', function () {
		let data = $(this).nestable('serialize');
		console.log(data)
		const wrapper = document.querySelector('.nestable');

		if(wrapper){
			const action = wrapper.getAttribute('data-send');

			axios.post(action, {data: data}).then(function (response) {
			}).catch(function (error) {
				console.error(error)
			})

		}



	});
})
