/*
* parama    object
*   parama.url  要交互的地址
*   parama.data    要交互的数据
*   parama.dataType     要加护的数据类型
*   parama.type     传送数据的方式
*   parama.success      传送成功的回调函数
*   parama.async    是否异步
* */
function ajax(parama) {
    if(typeof parama != 'object'){
        console.error("请输入一个object的类型");
        return;
    }
    if(parama.url == undefined){
        console.error("请指定文件路径");
        return;
    }
    let type = parama.type || 'get';
    let dataType = parama.dataType||'text';
    let data = parama.data||'';
    let async = parama.async===undefined ? true : parama.async;
    if(typeof data == 'object'){
        let str = '';
        for(let i in data){
            str += i + "=" +data[i] + "&";
        }
        data = str.slice(0,-1);
    }
    let xmlobj = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");
    xmlobj.responseType = dataType;
    xmlobj.onload = function () {
        let doc = xmlobj.response;
        parama.success(doc);
    }
    if(type == "get"){
        xmlobj.open("get",parama.url+"?"+data,async);
        xmlobj.send();
    }else if(type == "post"){
        xmlobj.open("post",parama.url,async);
        xmlobj.setRequestHeader("content-Type","application/x-www-form-urlencoded");
        xmlobj.send(data);
    }
}