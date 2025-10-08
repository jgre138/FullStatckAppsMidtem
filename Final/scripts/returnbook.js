function validateBookSelection(field) {
    return (field === "") ? "Please select a book to return\n" : "";
}

function validateReturn(form) {
    var result = validateBookSelection(form.books_id.value);
    if (result === "") return true;
    else {
        alert("Error in Returning:\n" + result);
        return false;
    }
}