//Changing image position for the product part
document.querySelectorAll('.prod-part-item').forEach(item => {
    const mainImage = item.querySelector('.main-image');
    const smallImages = item.querySelectorAll('.small-image');

    smallImages.forEach(smallImage => {
        smallImage.onclick = function() {
            mainImage.src = smallImage.src;
        };
    });
});