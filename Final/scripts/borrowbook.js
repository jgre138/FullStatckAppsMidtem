function validateBookSelection(field) {
    return (field === "") ? "Please select a book to borrow\n" : "";
}

function validateBorrow(form) {
    var result = validateBookSelection(form.books_id.value);
    if (result === "") return true;
    else {
        alert("Error in Borrowing:\n" + result);
        return false;
    }
}