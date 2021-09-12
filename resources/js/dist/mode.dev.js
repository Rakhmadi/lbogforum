"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = cekMode;

function cekMode() {
  var isDark = localStorage.getItem('isDark');
  console.log(isDark);
  var n = document.getElementsByClassName('inintColorthemesMode');
  var htmlEl = document.getElementById('mode');
  var card = document.getElementsByClassName('card');

  if (isDark === 'true') {
    for (var v = 0; v < n.length; v++) {
      n[v].classList.add('dark__');
    }

    for (var a = 0; a < card.length; a++) {
      card[a].classList.add('dark__');
    }

    htmlEl.classList.add('bg_dark__');
    console.log('changes');
    return true;
  } else {
    for (var _v = 0; _v < n.length; _v++) {
      n[_v].classList.remove('dark__');
    }

    for (var _a = 0; _a < card.length; _a++) {
      card[_a].classList.remove('dark__');
    }

    htmlEl.classList.remove('bg_dark__');
    console.log('changes');
    return false;
  }
}