//Навигация выбор действия
let btnContainer = document.querySelectorAll('.buttons_container > button'),
	urlItem = document.querySelector('.url_item'), //
	bindItem = document.querySelector('.bind_item'),
	bindTo = document.querySelector('.bind_to'),
	urlCheck = document.querySelector('[data-check]')

if (btnContainer) {
	let urlInput = document.querySelector('#url')
	for (let btn of btnContainer) {
		btn.addEventListener('click', () => {
			if (btn.hasAttribute('data-url')) {
				urlItem.classList.add('active_item')
				bindItem.classList.remove('active_item')
				bindItem.style.display = 'none'
				// urlInput.setAttribute('required', '')
				urlCheck.value = 1
				console.log("hello")
			} else if (btn.hasAttribute('data-bind')) {
				urlCheck.value = 0
				urlInput.removeAttribute('required')
				urlItem.classList.remove('active_item')
				bindItem.classList.add('active_item')
				urlItem.style.display = 'none'
			}
		})
	}
}

if (bindTo) {
	let bindToPages = document.querySelectorAll('.bind_to_page');
	services = document.querySelector('.bind_services_item')

	bindTo.addEventListener('change', () => {
		bindToPages.forEach((el) =>{
			if(bindTo.value === el.getAttribute('data-model')){
				el.closest('.bind_inner').style.display = 'block';
			} else {
				el.closest('.bind_inner').style.display = 'none';
			}

		})
	})
}
