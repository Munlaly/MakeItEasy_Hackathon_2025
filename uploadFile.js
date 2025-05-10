const fileInput = document.getElementById("fileInput");
const uploadButton = document.getElementById("uploadButton");
const previewImage = document.getElementById("previewImage");
const fileNameSpan = document.getElementById("fileName");
const picturesGrid = document.getElementById("pictures-grid");

fileInput.addEventListener("change", () => {
        const files = fileInput.files;

        if (files.length > 0) {
            fileNameSpan.textContent = `${files.length} file(s) selected`;
            
            const reader = new FileReader();
            reader.onload = function (event) {
                previewImage.src = event.target.result;
                previewImage.style.display = "block";
            };
            reader.readAsDataURL(files[0]); 
        } else {
            fileNameSpan.textContent = "No files chosen";
            previewImage.style.display = "none";
        }
    });

    
    uploadButton.addEventListener("click", () => {
        const files = fileInput.files;

        if (files.length === 0) {
            alert("Please select at least one file!");
            return;
        }

        for (const file of files) {
            const reader = new FileReader();
            reader.onload = function (event) {

                const imageContainer = document.createElement("div");
               imageContainer.classList.add("image-container");

                const newImage = document.createElement("img");
                newImage.src = event.target.result;
                newImage.classList.add("uploaded-image");

                const imageCaption = document.createElement("p");
                imageCaption.classList.add("image-caption");
                imageCaption.textContent = "Uploaded Image";

                imageContainer.appendChild(newImage);
                imageContainer.appendChild(imageCaption);
                picturesGrid.appendChild(imageContainer);
            };
            reader.readAsDataURL(file);
        }

        
        fileInput.value = "";
        fileNameSpan.textContent = "No files chosen";
        previewImage.style.display = "none";
    });
