window.onload = function () {
    let file = document.querySelector('input[type=file]');
    let img = document.querySelector('.look>img');
    let size = 1024*1024;
    let type = ["image/png","image/jpeg","image/gif"];
    let tishi = document.querySelector('.tishi');
    let obj;
    file.onchange = function () {
        //获取文件的信息
        if (obj.size > size){
            tishi.innerText = "文件太大";
            return;
        }
        let files = new FileReader();//创建能够解析文件信息的对象
        //当解析完成以后会触发onload事件
        files.onload = function (e) {
            let result = e.target.result;
            img.setAttribute('src',result);
        }
        files.readAsDataURL(obj);//利用FileReader对象里面的readAsDataURL将获取的文件解析成地址的方式
    }
    let btn = document.querySelector('input[type=button]');
    let back = document.querySelector('.back');
    btn.onclick = function () {
        if (obj.size > size){
            alert("禁止上传");
            return;
        }
        let formobj = new FormData();
        formobj.append('file',obj);
        let ajax = new XMLHttpRequest();
        ajax.upload.onprogress = function (e) {
            let total = e.total;
            let loaded = e.loaded;
            let bili = loaded/total*100;
            back.style.width = bili + "%";
        }
        ajax.onload = function () {
            let doc = ajax.response;
            console.log(doc);
        }
        ajax.open('post','../addData.php');
        ajax.send(formobj);
    }
}
