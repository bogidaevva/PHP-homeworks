"use strict";

console.log('hello');
document.forms.add-cake.addEventListening('submit', function(event) {
    event.preventDefault();

    if (this.elements.title.value.trim() == "" || this.elements.price.value.trim() == "" 
        || this.elements.description.value.trim() == "") {
        alert("Все поля являются обязательными для заполнения.");
        return;
    } 
    this.submit();
});
