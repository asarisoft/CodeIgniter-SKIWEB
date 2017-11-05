function previewImage() {
    document.getElementById("image_preview").style.display = "block";
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("image_source").files[0]);
    oFReader.onload = function(oFREvent) {
        document.getElementById("image_preview").src = oFREvent.target.result;
    };
};