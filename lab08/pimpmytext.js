var hasClicked = false;
function changeFontSize(){
    var texts = document.getElementById("text");
    var str = "pt";
    var fsize = parseInt(texts.style.fontSize)+2;
    var interval = null;
    if(hasClicked==false){
        texts.style.fontSize = "12pt";
        hasClicked = true;
    }else{
        texts.style.fontSize = fsize.toString().concat("pt");
    }
    interval = setInterval(changeFontSize, 500);
    // texts.value = texts.style.fontSize;
    // texts.style.backgroundColor = "red";
}

function seeAlert(){
    var texts = document.getElementById("text");
    var bling = document.getElementById("Bling");
    if(bling.checked == true){
        texts.style.fontWeight = "bold";
        texts.style.color = "green";
        texts.style.textDecoration = "underline";
        document.body.style.backgroundImage="url(https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/8/hundred.jpg)";
    }else{
        texts.style.fontWeight = "normal";
        texts.style.color = "black";
        texts.style.textDecoration = "blink";
        document.body.style.background="none";
    }
}

function changeCase(){
    var spf = document.getElementById("snoopify");
    var texts = document.getElementById("text");
    texts.value = texts.value.toUpperCase();
    var str = texts.value;
    str = str.replace(".", "-zzle.")
    texts.value = str;
    // var arr = str.split(".");
    // var ifNumDit = /[0-9a-z]/i;
    // for(var i = 0; i < arr.length; i++){
        // arr[i] = arr[i][arr[i].length-1];
        // if(arr[i][arr[i].length-1].test(ifNumDit)==true){
        //     arr[i] = "0989";
        // }
    // }
    // texts.value = arr.join("\n")
    // -izzle
}

function igpig(){
    var texts = document.getElementById("text");
    texts.style.backgroundColor = "Green";
    var str = texts.value;
    var i, words = str.split(/\s+/);
    for(i = 0; i < words.length; i++){
        var newword = null;
        if(words[i][0]=="a"||words[i][0]=="e"||words[i][0]=="i"||words[i][0]=="o"||words[i][0]=="u"){
            newword = words[i].concat("ay");
        }else{
            newword = changeWord(words[i]);
        }
    }
    str = words.join(" ");
    texts.value = str;
}

function changeWord(var str){
    var sstr = str.toLowerCase();
    var index = 100000;
    if(index > sstr.indexOf("a")){
        index = sstr.indexOf("a");
    }
    if(index < sstr.indexOf("e")){
        index = sstr.indexOf("e");
    }
    if(index < sstr.indexOf("i")){
        index sstr.indexOf("i");
    }
    if(index < sstr.indexOf("o")){
        index = sstr.indexOf("o");
    }
    if(index < sstr.indexOf("u")){
        index = sstr.indexOf("u");
    }
    str = str.slice(index, str.length)+str.slice(0, index)+"ay";
    return str;
}
function malkovitch(){
    var texts = document.getElementById("text");
    var str = texts.value;
    var i, words = str.split(/\s+/);
    for(i = 0; i < words.length; i++){
        if(words[i].length>=5){
            words[i] = "Malkovich";
        }
    }
    str = words.join(" ");
    texts.value = str;
}
