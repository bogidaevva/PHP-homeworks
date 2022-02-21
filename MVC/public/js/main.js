"use strict";

document.forms.addition.addEventListener('submit', function(event) {
    event.preventDefault();

    if (this.elements.title.value.trim() == "" || this.elements.price.value.trim() == "" 
        || this.elements.description.value.trim() == "") {
        alert("Все поля являются обязательными для заполнения.");
        return;
    } 
    this.submit();
});
