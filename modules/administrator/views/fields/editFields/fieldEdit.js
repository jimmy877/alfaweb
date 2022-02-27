
window.onload = function(){

    let typeField = document.querySelector('.typeField');
    console.log(typeField[0]);
    let fields = document.querySelectorAll('.f-fields');

    typeField.onchange = function(){

        var block = this.value;

        switch (block) {
            case "null":
                fields.forEach(el=>{el.classList.remove("active")});
                break;
            case "text":
                fields.forEach(el=>{el.classList.remove("active")});
                fields[2].classList.add("active");
                fields[3].classList.add("active");
                fields[4].classList.add("active");
                break;
            case "select":
                fields.forEach(el=>{el.classList.remove("active")});
                fields[0].classList.add("active");
                fields[2].classList.add("active");
                fields[3].classList.add("active");
                fields[4].classList.add("active");
                break;
            case "textarea":
                fields.forEach(el=>{el.classList.remove("active")});
                fields[2].classList.add("active");
                fields[3].classList.add("active");
                fields[4].classList.add("active");
                break;
            case "checkbox":
                fields.forEach(el=>{el.classList.remove("active")});
                fields[2].classList.add("active");
                fields[3].classList.add("active");
                fields[4].classList.add("active");
                break;
            case "checkboxGroup":
                fields.forEach(el=>{el.classList.remove("active")});
                fields[1].classList.add("active");
                fields[2].classList.add("active");
                fields[3].classList.add("active");
                fields[4].classList.add("active");
                break;
            case "radiobutton":
                fields.forEach(el=>{el.classList.remove("active")});
                fields[1].classList.add("active");
                fields[2].classList.add("active");
                fields[3].classList.add("active");
                fields[4].classList.add("active");
                break;
        }



        //пишем условие, что если селект равен каким-то параметрам то делаем выборку полей и показываем их или скрываем
        //в зависимости от выбранного селекста


    };

};