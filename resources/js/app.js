let nIntervalID;
import { diapoClass } from "/resources/js/diapo.js";

const carouselElement = document.getElementById("carousel");

if (carouselElement) {
    const images = carouselElement.querySelectorAll(".elements .element img");
    const imagesTab = Array.from(images).map((image) => image.src);
    const imgElem = carouselElement.querySelector("img");

    const carousel = new diapoClass(imgElem, imagesTab, "gauche", "droite");
    carousel.start();
}
