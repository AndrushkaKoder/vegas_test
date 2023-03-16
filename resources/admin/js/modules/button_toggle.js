let visible_buttons = document.querySelectorAll('[data-param-toggle]');

for (let btn of visible_buttons) {
	btn.addEventListener('click', (e) => {
		e.preventDefault();

		let action = btn.getAttribute('href');
		let data = {};

		axios.post(action, data).then(function (response) {
			if (response.data.value === 0) {
				btn.firstElementChild.classList.remove(btn.getAttribute('data-icon1'))
				btn.firstElementChild.classList.add(btn.getAttribute('data-icon0'));
				btn.firstElementChild.style.color = 'gray';

				btn.dispatchEvent(new CustomEvent("toggled", {
					detail: {value: response.data.value}
				}));
			} else if (response.data.value === 1) {
				btn.firstElementChild.classList.remove(btn.getAttribute('data-icon0'))
				btn.firstElementChild.classList.add(btn.getAttribute('data-icon1'));
				btn.firstElementChild.style.color = 'green';

				btn.dispatchEvent(new CustomEvent("toggled", {
					detail: {value: response.data.value}
				}));
			}
		}).catch(function (error) {

		});
	});
}
