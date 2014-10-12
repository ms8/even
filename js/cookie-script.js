
function setCookie(No,Name,Price,Pic,Quantity){
    var n = parseInt(Quantity);
    if(!isNaN(n)){
        var valueStr = "|No="+No+"|Name="+Name+"|Price="+Price+"|pic="+Pic+"|Quantity="+Quantity
            +"|total="+parseFloat(Price)*n;
        addCookie(No,valueStr);
        return true;
    }
    return false;
}

function addCookie(No,NameStr){
    NameStr = "lvya_" + No + "=" + NameStr;
    document.cookie = NameStr + ";" + "path=/";
}

function addProduct(No,Name,Price,Pic,Quantity){
    var item = getCookie("lvya_"+No);
    if(item != ""){ //已经存在这个商品
        var quote = "|Quantity=";
        var start = item.indexOf(quote);
        var pre = item.substring(0,start);
        if( start != -1){
            start = start + quote.length;
            item = item.substring(start,item.length);
            var end = item.indexOf("|");
            if(end != -1){
                var num = item.substring(0,end);  //原有的总数
                num = parseInt(num);
                num += parseInt(Quantity);
                pre = pre + "|Quantity="+num +"|total="+parseFloat(Price)*num;  //构造新的cookie并覆盖旧的
                addCookie(No,pre);
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }else{ //新商品
        return setCookie(No,Name,Price,Pic,Quantity);
    }
}

function parseProduct(product){
    var pObj = new Object();
    var no = search(product,"|No=");
    var name = search(product,"|Name=");
    var price = search(product,"|Price=");
    var pic = search(product,"|pic=");
    var quantity = search(product,"|Quantity=");
    var total = search(product,"|total=");
    if(no == "" || name == "" || price == "" || quantity == ""||total == ""||pic==""){
        return null
    }
    pObj.No = no;
    pObj.Name = name;
    pObj.Price = price;
    pObj.Pic = pic;
    pObj.Quantity = quantity;
    pObj.total = total;
    return pObj;
}

function getAllProduct(){
    if (document.cookie.length>0){
        var products = new Array();
        var tmp = document.cookie;
        var c_start = tmp.indexOf("lvya_");
        while (c_start!=-1){
            c_start = tmp.indexOf("=",c_start);
            c_start = c_start+1;
            var c_end = tmp.indexOf(";",c_start);
            if (c_end == -1)
                c_end = tmp.length;
            var str = tmp.substring(c_start,c_end);
            str = parseProduct(str);
            if(str != null){
                products.push(str);
            }
            if (c_end == tmp.length)
                break;
            c_start = tmp.indexOf("lvya_",c_end);
        }
        return products;
    }
    return null;
}

function search(str,quote){
    var start = str.indexOf(quote);
    if( start != -1){
        start = start + quote.length;
        str = str.substring(start,str.length);
        var end = str.indexOf("|");
        if(end == -1){
            end = str.length;
        }
        var value = str.substring(0,end);
        return value;
    }
    return "";
}

function getCookie(c_name){
    if (document.cookie.length>0){
        var c_start = document.cookie.indexOf(c_name + "=");
        if (c_start!=-1){
            c_start = c_start + c_name.length+1;
            var c_end = document.cookie.indexOf(";",c_start);
            if (c_end == -1)
                c_end = document.cookie.length;
            return unescape(document.cookie.substring(c_start,c_end));
        }
    }
    return "";
}

function delProduct(productNo){
    document.cookie = "lvya_"+productNo+"=dispear;Expires=Saturday,15 Sep 1990 23:59:59 GMT;path=/";
}

function refreshCart(){
    var products = getAllProduct();
    if(products != null){
        $("#cartnum").text(products.length);
    }
}