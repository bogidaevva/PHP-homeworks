"use strict";
console.log('АЛО')
document.forms.search-by-price.addEventListener('submit', function(event) {
    event.preventDefault();
    console.log('АЛОooooooo')
    if (this.elements.min.value.trim() == "" || this.elements.max.value.trim() == "") {
        alert("Введите параметры поиска.");
        return;
    } else if (this.elements.min.value.trim() > this.elements.max.value.trim()) {
        alert("Проверьте корректность введенных параметров.");
        return;
    } else {
        let min = parseInt(this.elements.min.value.trim());
        let max = parseInt(this.elements.max.value.trim());

        fetch('/search_by_price?min=' + min + '&max=' + max).then(response => response.text())
            .then(answer => {
                if (answer == 'success') {
                    console.log("uraaa");
                } else {
                    console.log("nu bliiiin");
                }
            })
    }
});

document.forms.search-by-title.addEventListener('submit', function(event) {
    event.preventDefault();
});


