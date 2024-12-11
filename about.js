let next = document.querySelector('.next');
let prev = document.querySelector('.prev');
let slider= document.querySelector('.slide');
let slideList= document.querySelector('.slide .list');

let thumb= document.querySelector('.thumbnail'); 
let thumItem= thumb.querySelectorAll('.item');
thumb.appendChild(thumItem[0]);
// necxbutton
next.onclick = function() {
    moveSlider('next');
}
//prevbutton
prev.onclick = function() {
    moveSlider('prev');
}
 function moveSlider(direction){
    let slideItem= slider.querySelectorAll('.item');
    let thumItem= document.querySelectorAll('.thumbnail .item')
if(direction === 'next'){
    slideList.appendChild(slideItem[0]);
    thumb.appendChild(thumItem[0]);
    slider.classList.add('next');
}
else{
    slideList.prepend(slideItem[slideItem.length - 1]);
    thumb.prepend(thumItem[thumItem.length - 1]);
    slider.classList.add('prev'); 
    
}
slider.addEventListener('animationend', function(){
if(direction==='next'){
    slider.classList.remove('next')
}
else{
    slider.classList.remove('next')
}

}, { once:true} )

 }



