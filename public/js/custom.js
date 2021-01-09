//Funktion för att förhandsvisa bild
function previewImg(){
    const inputImage = document.getElementById("image");
    inputImage.addEventListener("change", function() {
    const file = this.files[0];
    const previewContainer = document.getElementById("img-preview");
    const previewImg = previewContainer.querySelector(".img-preview-img");
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
}


//Funktion för modal
function showModal(){
    const modal = document.querySelector(".div-modal");
    const previews = document.querySelectorAll(".img-container img");
    const original = document.querySelector(".img-modal");
    const projects = document.querySelectorAll(".project-card");

    previews.forEach((preview) => {
        preview.addEventListener("click", () => {
            modal.classList.add("open");
            original.classList.add("open");

            const originalSrc = preview.getAttribute("data-original");
            original.src = originalSrc;

            projects.forEach((project) => {
                project.style.display="none";
            });
        });
    });

    modal.addEventListener("click", (e) => {
        if(e.target.classList.contains("div-modal")){
            modal.classList.remove("open");
            original.classList.remove("open");
            projects.forEach((project) => {
                project.style.display="block";
            });
        }
    });
}