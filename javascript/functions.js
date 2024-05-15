document.addEventListener('DOMContentLoaded', function() {
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
    const input = document.querySelector("input.upload.post.media.button");
    const preview = document.querySelector("li.post-element.preview.input.media div");
    const showCommentButtons = document.querySelectorAll(".show-comment.button");
    const addCommentButtons = document.querySelectorAll(".add-comment.button");
    const followButtons= document.querySelectorAll("button.follow-button");

    //AXIOS
    //NOTIFICATIONS
    followButtons.forEach(button => {
        button.addEventListener("mousedown", function (){
            let buttonId = button.getAttribute("id");
            const formData = new FormData();
            formData.append('fkFollower', document.querySelector("input#fkFollower-"+buttonId).value);
            formData.append('fkFollowed',document.querySelector("input#fkFollowed-"+buttonId).value);
            formData.append('doFollow', document.querySelector("input#doAction-"+buttonId).value);
            followAction(button,formData);
        });
    });

    function followAction(button,formData){
        axios.post('follow.php', formData).then(response => {
            toggleFollowButton(button,response.data);
        });
    }

    function toggleFollowButton(button, follow){
        console.log(follow);
        if(follow==1){
            button.setAttribute("class","follow-button btn-sm btn btn-outline-primary");
            button.innerHTML = '<i class="bi bi-plus-circle"></i> Follow';
        } else {
            button.setAttribute("class","follow-button btn-sm btn btn-outline-secondary");
            button.innerHTML = '<i class="bi bi-x-circle"></i> Unfollow';
        }
    }
    
    //UI TOGGLE

    if(input!=null)
        input.addEventListener("change", updateImageDisplay);
    
    showCommentButtons.forEach(button => {
        button.addEventListener("mousedown", function (){
            toggleComments(button.getAttribute("postid"))
        });
    });

    addCommentButtons.forEach(button => {
        button.addEventListener("mousedown", 
            function (){
                showComments(button.getAttribute("postid"))
                showAddCommentForm(button.getAttribute("postid"))
            });
    });

    function toggleComments(postId) {
        let section = document.querySelector("#comment-section-"+postId);
        let sectionClass = section.getAttribute("class");
        if(sectionClass.includes("hidden")){
            showComments(postId);
        } else {
            hideComments(postId);
        }
        //hide comment form
        let form = document.querySelector("#add-comment-form-"+postId);
        form.setAttribute("class","post comment-form hidden");
    }

    function showComments(postId) {
        let section = document.querySelector("#comment-section-"+postId);
        section.setAttribute("class","comments");
    }

    function hideComments(postId) {
        let section = document.querySelector("#comment-section-"+postId);
        section.setAttribute("class","comments hidden");
    }

    function showAddCommentForm(postId){
        let form = document.querySelector("#add-comment-form-"+postId);
        form.setAttribute("class","post comment-form");
    }

    //PREVIEW UPLOAD IMAGE

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