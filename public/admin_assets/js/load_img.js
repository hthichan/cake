var loadImg = function(event) {
    var img = document.getElementById("img_file")
    img.src = URL.createObjectURL(event.target.files[0]);
}