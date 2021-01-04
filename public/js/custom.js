//Funktion för att förhandsvisa bild
const inputImage = document.getElementById('bild');
inputImage.addEventListener("change", function() {
    const file = this.files[0];
    const previewContainer = document.getElementById('img-preview');
    const previewImg = previewContainer.querySelector('.img-preview-img');
    if(file) {
        const reader = new FileReader();
        previewContainer.style.display = "block";
        previewImg.style.display = "block";
        reader.addEventListener("load", function() {
            previewImg.setAttribute("src", this.result);
        });
        reader.readAsDataURL(file);
    } else {
        previewContainer.style.display = "none";
        previewImg.style.display = "none";
        previewImg.setAttribute("src", "");
    }
});