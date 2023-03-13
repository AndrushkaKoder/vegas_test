//Удаление алерта оповещения через time милисекунд
let time = 3000;

let adminAlert = document.querySelector('.admin_alert')
if (adminAlert) {
	setTimeout(() => {
		adminAlert.remove();
	}, time)}
