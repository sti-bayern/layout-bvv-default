var ALPINE_VERSION="3.10.2";
require('./bootstrap');
// require('fslightbox');

// Lightbox
import SmartPhoto from "smartphoto"; 
document.addEventListener('DOMContentLoaded', function () {
    new SmartPhoto(".lightbox", {
        // resizeStyle: 'fit'
    });
});



import Alpine from 'alpinejs'

window.Alpine = Alpine

queueMicrotask(() => {
    Alpine.start()
})
