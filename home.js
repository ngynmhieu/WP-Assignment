function displayUser(){
    document.getElementsByClassName("dropdown")[0].classList.toggle("show");
}

function create_button(){
    add_resume = document.createElement("div");
    add_resume.className = "add-resume";
    add_button = document.createElement("button");
    add_button.className = "add-button";
    add_img = document.createElement("img");
    add_img.src = "image/add.png";
    add_button.appendChild(add_img);
    add_resume.appendChild(add_button);
    return add_resume;
}

function retrieve_data(user_name){
    const xhttp = new XMLHttpRequest();
    add_button = create_button();
    resume_container = document.getElementsByClassName("resume-container")[0];
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            resume_container.innerHTML += this.responseText;
            resume_container.appendChild(add_button);
        }
    }
    xhttp.open("GET", "cv_retrieve.php?login_username="+user_name, true);
    xhttp.send();
}

function delete_record(id){
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            return true;
        }
        else{
            return false;
        }
    }
    xhttp.open("DELETE", "cv_delete.php?user_id="+id, true);
    xhttp.send();
}


window.onload = function(){
    user_name = document.getElementsByClassName("headline")[0].getElementsByTagName("h2")[0].innerHTML;
    retrieve_data(user_name);
}


window.onclick = function(event) {
    // hide the user profile if click out of it
    if (!event.target.matches(".user")) {
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
            parent = event.target.parentElement.parentElement;
            id = parent.getElementsByTagName("ul")[0].children[0].innerHTML;
            result = delete_record(id);            
            if(result){
                alert("Deleted!");
            } else{
                alert("Delete unsucessful!");
            }
            window.location.reload();
        } else{
            alert("Cancel!");
        }
    }
    // create new form
    if (event.target.matches(".edit-button") || event.target.matches(".new-button") || event.target.matches(".add-button")){
        // redirect user to login page if not login
        login_username = document.getElementsByClassName("headline")[0].getElementsByTagName("h2")[0].innerHTML;
        if (login_username == "resume"){
            window.location.replace("Login.php");
        }
        // direct to page create cv
        else{
            user_id = event.target.parentElement.parentElement.getElementsByTagName("ul")[0].children[0].innerHTML;
            let url = 'page_cv_create.php';
            let form = document.createElement("form");
            form.setAttribute("action", url);
            form.setAttribute("method", "post");
            let input_field = document.createElement("input");
            input_field.setAttribute("type", "text");
            input_field.setAttribute("name", "user_id");
            input_field.setAttribute("value", user_id);
            form.appendChild(input_field);
            document.body.appendChild(form);
            form.submit();
        }

        // window.location.replace("page_cv_create.php");
    }
}