window.onclick = function(event) {
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
        window.location.href = "http://localhost:3000/form.php";
    }
}