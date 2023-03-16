//Просмотр feedback
let feedbackItem = document.querySelectorAll('.feedback_item');
let checkButton = document.querySelectorAll('.admin_feedback_check');

if (checkButton) {
	checkButton.forEach((el, i) => {
		el.addEventListener('toggled', (e) => {
			e.preventDefault();
			console.log(e.detail.value);

			if (e.detail.value === 0) {
				feedbackItem[i].classList.remove('feedback_checked')
			} else if (e.detail.value === 1) {
				feedbackItem[i].classList.add('feedback_checked')
			}
		})
	})
}
