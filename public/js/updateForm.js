//Update button handling
//Enabling all inputs when edit button is clicked
try {
    let editBtn = document.querySelector("#editBtn");
    editBtn.addEventListener('click', (e) => {
        e.preventDefault();
        let inputs = document.querySelectorAll("input");
        let textareas = document.querySelectorAll("textarea");
        inputs.forEach(input => {
            input.disabled = false;
        });
        textareas.forEach(textarea => {
            textarea.disabled = false;
        });
        //displaying select image button
        let selectImage = document.querySelectorAll(".select-image");
        selectImage.forEach(select => {
            select.style.display = "block";
        });

        //change the button to update
        editBtn.value = "Update";
        //scroll back to top
        window.scrollTo(0, 0);
    }, {
        once: true
    });
}catch(err){
    console.log(err);
}