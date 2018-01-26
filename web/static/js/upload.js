class upload{
    constructor(){
        this.data = [];
        this.list = [];
        this.multiple = false;
        this.size = 1024*1024*10;
        this.type = "image/png;image/jpeg;image/gif";
        this.filename = "file";
        this.selectBtnStyle = "width:200px;height:50px;border-radius:6px;background:#eee;border:1px solid #000;";
        this.selectBtnCon = "请选择上传文件";
        this.upBtnStyle = "width:200px;height:50px;border-radius:6px;background:cyan;border:1px solid #000;clear:both;";
        this.upBtnCon = "点击上传";
        this.viewStyle = "width:306px;";
        this.listStyle = "width:100px;height:100px;float:left;border:1px solid #ccc;";
        this.progressStyle = "width:100%;height:5px;position:absolute;bottom:0;left:0;";
        this.bar = "width:0%;height:100%;background:green";
        this.errorStyle = "width:100%;height:30px;position:absolute;left:0;top:0;right:0;bottom:0;margin:auto;text-align:center;line-height:30px;color:red;background:rgba(0,0,0,.8)";
        this.errorCon = "错误";
    }
    /*
    * 创建整个视图
    * params object
    *
    * params.parent     父容器
    * params.selectBtn   选择按钮
    * params.view        预览按钮
    * params.upBtn       上传按钮
    * */
    createView(params){
        //创建选择文件按钮
        this.createSelect(params.parent,params.selectBtn,()=>{
            //创建预览窗口
            this.createPview(params.view);
            //创建上传按钮
            this.createUpBtn(params.upBtn);
            //选择文件
            this.change();
        });
    }
    //开始选择文件
    change(){
        let that = this;
        this.selectBtn.onchange = function () {
            that.view.style.border = "1px solid #000";
            that.data = Array.prototype.slice.call(this.files);
            that.check();
        }
    }
    //针对每一个数据完成检查
    check(){
        let that = this;
        let temp = [];
        let length = this.data.length;
        for (let i = 0; i < length; i++){
            temp[i] = this.data[i];
            let obj = this.createList(this.data[i]);
            that.list[i] = obj;
            obj.del.index = i;
            (function (obj) {
                obj.list.onmouseenter = function () {
                    obj.del.style.display = 'block';
                }
                obj.list.onmouseleave = function () {
                    obj.del.style.display = 'none';
                }
            })(obj);
            
            obj.del.onclick = function () {
                this.parentNode.parentNode.removeChild(this.parentNode);
                let tempdata = temp[this.index];
                for (let j = 0; j < length; j++){
                    if (that.data[j] == tempdata){
                        that.data.splice(j, 1);
                        that.list.splice(j, 1);
                    }
                }
            }
            //判断是不是符合类型
            if (this.type.indexOf(this.data[i].type) < 0){
                let tempdata = temp[i];
                for (let j = 0; j < length; j++){
                    if (that.data[j] == tempdata){
                        that.data.splice(j, 1);
                        that.list.splice(j, 1);
                    }
                }
                obj.error.style.display = 'block';
                obj.error.innerText = '类型不对';
            }
            //判断大小是不是满足条件
            if (this.data[i]){
                if (this.size < this.data[i].size){
                    let tempdata = temp[i];
                    for (let j = 0; j < length; j++){
                        if (that.data[j] == tempdata){
                            that.data.splice(j, 1);
                            that.list.splice(j, 1);
                        }
                    }
                    obj.error.style.display = 'block';
                    obj.error.innerText = '尺寸不对';
                }
            }
        }
    }
    //文件上传
    up(url,callback){
        let that = this;
        this.upBtn.onclick = function () {
            for (let i = 0; i < that.data.length; i++){
                let ajax = new XMLHttpRequest();
                let form = new FormData();
                form.append(that.filename, that.data[i]);
                let arr = [];
                !function (i,ajax) {
                    ajax.onload = function () {
                        arr.push(ajax.response);
                        if (callback){
                            callback(arr);
                        }
                    }
                    ajax.upload.onprogress = function (e) {
                        let bili = e.loaded / e.total * 100 + "%";
                        that.list[i].bar.style.width = bili;
                    }
                }(i,ajax);
                ajax.open("post",url);
                ajax.send(form);
            }
        }
    }
    //创建预览的列表
    createList(data){
        //列表的容器
        let div = document.createElement('div');
        div.style.cssText = this.listStyle;
        div.style.position = "relative";

        let temptype = "image/jpeg;image/png;image/gif";
        if (temptype.indexOf(data.type) > -1){
            //完成 图片数据地址的转换
            let read = new FileReader();//创建能够解析文件信息的对象
            //当解析完成以后会触发onload事件
            read.onload = function (e) {
                div.style.background = "url(" + e.target.result + ")";
                div.style.backgroundSize = "cover";
            }
            read.readAsDataURL(data);//利用FileReader对象里面的readAsDataURL将获取的文件解析成地址的方式
        }else {
            let notice = document.createElement('div');
            notice.innerText = "未知类型";
            div.appendChild(notice);
        }
        //进度条容器
        let progress = document.createElement('div');
        progress.style.cssText = this.progressStyle;
        //进度条
        let bar = document.createElement('div');
        bar.style.cssText = this.bar;
        //错误的容器
        let error = document.createElement('div');
        error.style.cssText = this.errorStyle;
        error.innerHTML = this.errorCon;
        error.style.display = "none";
        //删除按钮
        let del = document.createElement('div');
        del.style.cssText = "width:20px;height:20px;position:absolute;right:5px;top:5px;text-align:center;line-height:20px;cursor:pointer;border:1px solid #777;display:none";
        del.innerHTML = "X";

        progress.appendChild(bar);
        div.appendChild(error);
        div.appendChild(progress);
        div.appendChild(del);
        this.view.appendChild(div);
        return{
            del:del,
            error:error,
            list:div,
            bar:bar
        }
    }
    //创建选择文件按钮
    createSelect(parent,selectBtn,callback){
        if (!parent){
            console.error("必须指定父元素");
        }
        if (selectBtn){
            this.parent = parent;
            this.selectBtn = selectBtn;
            callback();
        }else{
            this.parent = parent;
            let selectBox = document.createElement('div');
            selectBox.style.cssText = this.selectBtnStyle;
            selectBox.style.position = "relative";
            selectBox.style.textAlign = "center";
            selectBox.style.marginBottom = "10px";
            selectBox.innerText = this.selectBtnCon;
            parent.appendChild(selectBox);

            let file = document.createElement('input');
            file.type = 'file';
            file.name = this.filename;
            if (this.multiple){
                file.multiple = 'multiple';
            }
            file.style.cssText = "width:100%;height:100%;opacity:0;z-index:1;position:absolute;left:0;top:0;cursor:pointer;";
            selectBox.appendChild(file);
            selectBox.style.lineHeight = selectBox.offsetHeight + "px";
            this.selectBtn = file;
            callback();
        }
    }
    //创建预览窗口
    createPview(obj){
        if (obj){
            this.view = obj;
        }else {
            let div = document.createElement('div');
            div.style.cssText = this.viewStyle;
            div.style.overflow = "hidden";
            div.style.marginBottom = "10px";
            this.parent.appendChild(div);
            this.view = div;
        }
    }
    //创建上传按钮
    createUpBtn(obj){
        if (obj){
            this.upBtn = obj;
        }else{
            let div = document.createElement('div');
            div.style.cssText = this.upBtnStyle;
            div.innerText = this.upBtnCon;
            div.style.textAlign = "center";
            div.style.cursor = "pointer";
            this.parent.appendChild(div);
            div.style.lineHeight = div.offsetHeight + "px";
            this.upBtn = div;
        }
    }
}