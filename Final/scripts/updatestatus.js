function validateBookSelection(field) {
    return (field === "") ? "Please select a book to update\n" : "";
}

function validateUpdate(form) {
    var result = validateBookSelection(form.books_id.value);
    if (result === "") return true;
    else {
        alert("Error in Update:\n" + result);
        return false;
    }
}