function openFileChooser() {
    const fileChooser = document.getElementById("fileChooser");
    fileChooser.click();
}

function handleFileSelect(event) {
    const file = event.target.files[0];
    const reader = new FileReader();

    reader.onload = function(event) {
        const box = document.getElementById("box");
        box.style.backgroundImage = `url('${event.target.result}')`;
        box.style.backgroundSize = "cover";
        box.style.backgroundPosition = "center";
        box.innerHTML = "";
        document.getElementById("imageInput").value = file.name;
    }
    reader.readAsDataURL(file);
}

document.getElementById("fileChooser").addEventListener("change", handleFileSelect);