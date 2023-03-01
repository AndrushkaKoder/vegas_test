//Просмотр feedback
let feedbackItem = document.querySelectorAll('.feedback_item');
let checkButton = document.querySelectorAll('.admin_feedback_check');

if (checkButton) {

	checkButton.forEach((el, i) => {
		el.addEventListener('click', (e) => {
			e.preventDefault();
			let action = el.getAttribute('href');
			let checked = parseInt(el.getAttribute('data-checked'));
			checked = 1 - checked;
			el.dataset.checked = checked;

			let params = {
				checked: checked
			};

			axios.post(action, params)
				.then(function () {
					feedbackItem[i].classList.toggle('feedback_checked')
				})
				.catch(function (error) {
					console.error(error)
				})
		})
	})
}
