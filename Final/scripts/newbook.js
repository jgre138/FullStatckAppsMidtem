function validateTitle(field) {
    return field.trim() === "" ? "Title is required.\n" : "";
}

function validateAuthor(field) {
    return field.trim() === "" ? "Author is required.\n" : "";
}

function validateFile(field) {
    if (field.files.length === 0) return ""; // No file uploaded

    const file = field.files[0];
    const validTypes = ['image/jpeg', 'image/png'];
    const maxSize = 5 * 1024 * 1024; // 5MB

    if (!validTypes.includes(file.type)) {
        return "File must be a JPEG or PNG image.\n";
    }

    if (file.size > maxSize) {
        return "File size must not exceed 5MB.\n";
    }

    return "";
}

function validateBook(form) {
    let result = "";
    result += validateTitle(form.title.value);
    result += validateAuthor(form.author.value);
    result += validateFile(form.bookcover);

    if (result === "") {
        return true;
    } else {
        alert("Error in Form:\n" + result);
        return false;
    }
}