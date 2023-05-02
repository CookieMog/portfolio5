let images = document.querySelectorAll(".banner-image");
let banner = document.querySelector("#banner");

function expandImage(index) {
    // Expand selected image
    images[index].classList.add(`image${index + 1}-expanded`);

    // Hide other images
    images.forEach((image, i) => {
        if (i !== index) {
            image.style.opacity = 0;
        }
    });

    // Adjust banner
    banner.style.height = `${images[index].clientHeight}px`;
}

function resetBanner() {
    // Reset all images
    images.forEach((image, i) => {
        image.classList.remove(`image${i + 1}-expanded`);
        image.style.opacity = 1;
    });

    // Reset banner height
    banner.style.height = "";
}

// Add event
images.forEach((image, i) => {
    image.addEventListener("mouseover", () => {
        expandImage(i);
    });

    image.addEventListener("mouseout", () => {
        resetBanner();
    });
});
