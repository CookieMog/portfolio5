let nIntervalID;
import { diapoClass } from "/resources/js/diapo.js";
//Lancement Diapo
// var images = [
//     "{{ asset('images/step1.jpg') }}",
//     "{{ asset('images/step2.jpg') }}",
//     "{{ asset('images/step3.jpg') }}",
// ];

let images = document.querySelectorAll(".elements .element img");

let imagesTab = [];

for (const image of images) {
    imagesTab.push(image.src);
}
// image = imagesTab

// images = [images[0].src, images[1].src ? images[1].src : "" , images[2].src ? images[2].src];

console.log(images, imagesTab);

var imgElem = window.document.getElementById("carousel").querySelector("img");

const carousel = new diapoClass(imgElem, imagesTab, "gauche", "droite");
