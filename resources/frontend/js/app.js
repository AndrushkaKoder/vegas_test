require('./bootstrap');



let showMore = document.querySelectorAll('.show_more'),

    titleContent = document.querySelectorAll('.card_description');



for(let i =0; i<showMore.length; i++){

    showMore[i].addEventListener('click', ()=>{

        titleContent[i].classList.toggle('show')

        if (titleContent[i].classList.contains('show')){

            showMore[i].textContent = 'Свернуть'
        } else {

            showMore[i].textContent = 'Развернуть'

        }

    })
}
