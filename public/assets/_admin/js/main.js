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

let deleteButton = document.querySelectorAll('.admin_edit_img_delete'); //Кнопки удаления картинок

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

//показать сео параметры
let seoButton = document.querySelector('.admin_edit_seo_btn'),
	seoBlock = document.querySelector('.admin_edit_seo');
if (seoButton) {
	seoButton.addEventListener('click', () => {
		seoBlock.classList.toggle('active_seo')
		seoBlock.classList.contains('active_seo') ? seoButton.innerHTML = 'Скрыть СЕО параметры' : seoButton.innerHTML = 'Показать СЕО параметры';
	});
}

//Ининциализация редактора текста
tinymce.init({
	selector: 'textarea.edit_content',
});








//sortable навигация
// let nestedSortables = document.querySelectorAll('.nested-sortable');
// for (let i = 0; i < nestedSortables.length; i++) {
// 	let options = {
// 		group: 'share',
// 		animation: 100
// 	};
//
// 	let events = [
// 		'onEnd',
// 	]
// 	events.forEach(function (name) {
//
// 		options[name] = function () {
// 			let dataNum = document.querySelectorAll('#nestedDemo > [data-num]');
// 			let result = [];
// 			for (el of dataNum) {
// 				let children = [];
// 				let dataNumInner = el.querySelectorAll(':scope > .nested-sortable > [data-num]')
// 				if (dataNumInner.length) {
// 					for (let innerEl of dataNumInner) {
// 						children.push({
// 							id: innerEl.getAttribute('data-num'),
// 						})
// 					}
// 				}
//
// 				result.push({
// 					id: el.getAttribute('data-num'),
// 					children: children
// 				})
// 			}
//
// 			let navAction = document.querySelector('[data-send]');
// 			navAction = navAction.getAttribute('data-send')
// 			console.log(navAction)
//
//
// 			console.log(result)
// 			axios.post(navAction, {data: result}).then(function (response) {
// 				console.log(response)
//
// 			}).catch(function (error) {
// 				console.error(error)
// 			})
//
//
// 		};
// 	});
//
// 	let s = Sortable.create(nestedSortables[i], options);
// }


