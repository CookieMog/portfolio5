let nIntervalID;
import { diapoClass } from "/resources/js/diapo.js";
//Lancement Diapo
var images = [
    "{{ asset('images/step1.jpg') }}",
    "{{ asset('images/step2.jpg') }}",
    "{{ asset('images/step3.jpg') }}",
];
var imgElem = window.document.getElementById("carousel").querySelector("img");

const carousel = new diapoClass(imgElem, images, "gauche", "droite");
