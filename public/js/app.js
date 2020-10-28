var openFile = function(event, element) {
    const input = event.target;
    const reader = new FileReader();
    reader.onload = function() {
        const dataURL = reader.result;
        const output = document.querySelector(element);
        output.src = dataURL;
    }
    reader.readAsDataURL(input.files[0])
}