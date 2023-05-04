let images = document.querySelectorAll(".banner-image");
let banner = document.querySelector("#banner");

function expandImage(index) {
    // Expand selected image
    images[index].classList.add(`image${index + 1}-expanded`);

    // Hide other images
    for (let i = 0; i < images.length; i++) {
        if (i !== index) {
            images[i].style.opacity = 0;
            images[i].closest("div").style.display = "none";
        }
    }

    /* // Adjust banner height to match expanded image
    banner.style.height = `${images[index].clientHeight}px`; */
}

function resetBanner() {
    // Reset all images
    for (let i = 0; i < images.length; i++) {
        images[i].classList.remove(`image${i + 1}-expanded`);
        images[i].style.opacity = 1;
        images[i].closest("div").style.display = "block";
    }

    // Reset banner height
    banner.style.height = "";
}

// Add event listeners to each image
for (let i = 0; i < images.length; i++) {
    images[i].addEventListener("mouseover", function () {
        expandImage(i);
    });

    images[i].addEventListener("mouseout", function () {
        resetBanner();
    });
}
