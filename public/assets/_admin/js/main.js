let adminAlert = document.querySelector('.admin_alert'), //Алерт сообщением $error/success
	adminBtnDelete = document.querySelectorAll('.admin_btn_delete'), //Кнопки удаления сервиса
	adminAction = document.querySelector('.admin_action'); //div куда залаетает форма


//Удаление алерта
if (adminAlert) {
	setTimeout(() => {
		adminAlert.remove();
	}, 3000)
}

//Функция удаления элмента в админ панели. Принимает кнопку удаления, куда будет помещена форма(div с кнопкой удаления)
// и action из дата-атрибута. Value - имя поля, которое можем передать в Request
function deleteElement(appendParent, action, value = null) {
	if (confirm('Вы уверены? Элемент будет удален безвозвратно')) {
		let deleteForm = document.createElement('form');
		let hidden = document.createElement('input');
		let csrf = document.createElement('input')
		deleteForm.append(csrf);
		deleteForm.append(hidden)
		csrf.type = 'hidden';
		csrf.name = '_token';
		csrf.value = App.csrf;
		hidden.type = 'hidden';
		hidden.name = '_method';
		hidden.value = 'delete';
		appendParent.append(deleteForm);
		deleteForm.method = 'POST';
		deleteForm.action = action;
		deleteForm.submit();
		console.log('form');
	}
}

//Слушатели события на кнопках удаления сервиса и картинки
if (adminBtnDelete) {
	for (let btn of adminBtnDelete) {
		btn.addEventListener('click', (e) => {
			e.preventDefault();
			deleteElement(adminAction, btn.getAttribute('href'));
		});
	}
}

let deleteButton = document.querySelectorAll('.admin_edit_img_delete'), //Кнопки удаления картинок
	imgAction = document.querySelector('.admin_edit_img'); //div куда залетает форма при удалении картинки

for (let btn of deleteButton) {
	btn.addEventListener('click', () => {
		btn.parentNode.querySelector('img');
		let img = btn.parentNode.querySelector('img');
		let toggler = btn.parentNode.lastElementChild;
		img.classList.toggle('blur');
		if (img.classList.contains('blur')) {
			toggler.value = 1;
			btn.classList.add('active')
			btn.innerHTML = "Отмена";
		} else {
			toggler.value = 0;
			btn.classList.remove('active')
			btn.innerHTML = 'Удалить';
		}
	});
}


//показать сео параметры

let seoButton = document.querySelector('.admin_edit_seo_btn'),
	seoBlock = document.querySelector('.admin_edit_seo');

seoButton.addEventListener('click', ()=>{
	seoBlock.classList.toggle('active_seo')
	seoBlock.classList.contains('active_seo') ? seoButton.innerHTML = 'Скрыть СЕО параметры' : seoButton.innerHTML = 'Показать СЕО параметры';


});




