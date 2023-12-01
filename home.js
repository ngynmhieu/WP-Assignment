function displayUser(){
    document.getElementsByClassName("dropdown")[0].classList.toggle("show");
}

window.onclick = function(event) {
    // hide the user profile if click out of it
    if (!event.target.matches(".user")) {
        console.log(event.target);
        let dropdowns = document.getElementsByClassName("dropdown");
        let openDropdown = dropdowns[0];
        if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
        }
    }
    // log target for debug
    // console.log(event.target);

    // confirm if delete resume
    if (event.target.matches(".delete-button")){
        let result = confirm("Are you sure you want to delete this resume ?");
        if (result == true){
            alert("Deleted!");
        } else{
            alert("Not deleted!");
        }
    }
    // create new form
    if (event.target.matches(".edit-button") || event.target.matches(".new-button") || event.target.matches(".add-button")){
        window.location.replace("page_cv_create.php");
    }
}