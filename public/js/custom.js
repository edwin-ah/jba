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
    const paginator = document.querySelectorAll(".paginator");
    const footer = document.getElementById("#footer");

    previews.forEach((preview) => {
        preview.addEventListener("click", () => {
            modal.classList.add("open");
            original.classList.add("open");

            const originalSrc = preview.getAttribute("data-original");
            original.src = originalSrc;

            paginator[0].style.visibility ="hidden";

            projects.forEach((project) => {
                project.style.visibility ="hidden";
            });
        });
    });

    modal.addEventListener("click", (e) => {
        if(e.target.classList.contains("div-modal")){
            modal.classList.remove("open");
            original.classList.remove("open");
            paginator[0].style.visibility="visible";
            
            projects.forEach((project) => {
                project.style.visibility="visible";
            });
        }
    });
}

//Funktion för att ändra färg på radera-knapp
function changeBtnColor(){
    var button = document.getElementById("delete-btn");
    var isChecked = document.getElementById("deleteCheck");
    if(isChecked.checked){
        button.classList.remove("button");
        button.classList.add("btn-danger");
    }
    else if(!isChecked.checked){
        button.classList.add("button");
        button.classList.remove("btn-danger");
    }
}