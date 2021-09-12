export default function cekMode(){
    let isDark = localStorage.getItem('isDark')
    console.log(isDark)
    let n = document.getElementsByClassName('inintColorthemesMode')
    let htmlEl = document.getElementById('mode')
    let card = document.getElementsByClassName('card')

    if(isDark === 'true'){
        for (let v = 0; v < n.length; v++) {
            n[v].classList.add('dark__')
        }
        for(let a = 0;a <card.length;a++){
            card[a].classList.add('dark__')
        }
        htmlEl.classList.add('bg_dark__')
        console.log('changes')
            return true;

    }else{
        for (let v = 0; v < n.length; v++) {
            n[v].classList.remove('dark__')
        }
        for(let a = 0;a <card.length;a++){
            card[a].classList.remove('dark__')
        }
        htmlEl.classList.remove('bg_dark__')
        console.log('changes')
            return false;

    }
}