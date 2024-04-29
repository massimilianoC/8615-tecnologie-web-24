document.addEventListener('DOMContentLoaded', function() {
    const input = document.querySelector("input.upload.post.media.button");
    const preview = document.querySelector("li.post-element.preview.input.media div");

    const commentButtons = document.querySelectorAll("btn btn-primary")

    input.addEventListener("change", updateImageDisplay);

    function updateImageDisplay() {
    while (preview.firstChild) {
        preview.removeChild(preview.firstChild);
        }
    const curFiles = input.files;
    const para = document.createElement("p");
    if (curFiles.length === 0) {
        para.textContent = "No files currently selected for upload";
        preview.appendChild(para);
    } else {
        for (const file of curFiles) {
        if (validFileType(file)) {
            para.textContent = `File name ${file.name}, file size ${returnFileSize(
            file.size,
            )}.`;
            preview.setAttribute("class","post-element image-background");
            preview.setAttribute("style","background-image: url('"+URL.createObjectURL(file)+"')");
            //image.alt = image.title = file.name;
        } else {
            para.textContent = `File name ${file.name}: Not a valid file type. Update your selection.`;
            listItem.appendChild(para);
        }
        list.appendChild(listItem);
        }
    }
    }

    // https://developer.mozilla.org/en-US/docs/Web/Media/Formats/Image_types
    const fileTypes = [
    "image/apng",
    "image/bmp",
    "image/gif",
    "image/jpeg",
    "image/pjpeg",
    "image/png",
    "image/svg+xml",
    "image/tiff",
    "image/webp",
    "image/x-icon",
    ];

    function validFileType(file) {
    return fileTypes.includes(file.type);
    }

    function returnFileSize(number) {
    if (number < 1024) {
        return `${number} bytes`;
    } else if (number >= 1024 && number < 1048576) {
        return `${(number / 1024).toFixed(1)} KB`;
    } else if (number >= 1048576) {
        return `${(number / 1048576).toFixed(1)} MB`;
    }
    }

}, false);