window.onload = function () {
    let flag = true;
    let rightLang = document.querySelector(".rightLang");
    let lang = document.querySelector(".two_lang");
    rightLang.onclick = function () {
        if(flag){
            lang.style.display = "block";
            flag = false;
        }else if(!flag){
            lang.style.display = "none";
            flag = true;
        }
    }
}




