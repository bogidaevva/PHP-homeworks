(()=>{"use strict";function e(e){let t=document.querySelectorAll(".cake");Array.from(t).forEach((e=>e.remove())),e.success.forEach((e=>{let t=document.createElement("div");t.classList.add("cake"),t.innerHTML=`\n        <h4>${e.title}</h4> \n        <p>${e.price}</p> \n        <a href="/cake?id=${e.id} ">Подробнее</a>`,document.body.append(t)}))}function t(e){let t=document.createElement("p");t.innerText=e.error;let r=document.querySelectorAll(".cake");Array.from(r).forEach((e=>e.remove())),document.body.append(t)}document.forms.price.addEventListener("submit",(function(r){if(r.preventDefault(),""!=this.elements.min.value.trim()&&""!=this.elements.max.value.trim())if(parseInt(this.elements.min.value.trim())>parseInt(this.elements.max.value.trim()))alert("Проверьте корректность введенных параметров.");else{let r=parseInt(this.elements.min.value.trim()),n=parseInt(this.elements.max.value.trim());fetch("/search_by_price?min="+r+"&max="+n).then((e=>e.json())).then((r=>{"success"==Object.keys(r)[0]?(void 0!==document.querySelector("p")&&document.querySelector("p").remove(),e(r)):t(r)}))}else alert("Введите параметры поиска.")})),document.forms.title.addEventListener("submit",(function(r){if(r.preventDefault(),""!=this.elements.title.value.trim()){let r=this.elements.title.value.trim();fetch("/search_by_title?title="+r).then((e=>e.json())).then((r=>{"success"==Object.keys(r)[0]?(void 0!==document.querySelector("p")&&document.querySelector("p").remove(),e(r)):t(r)}))}else alert("Введите название торта.")}))})();