$("pre code").each(function(){
    var lines = $(this).text().split('\n').length ;
    //获取代码的语言并转大写
    var codename = $(this).attr("class").split('-')[1].toUpperCase();
    var str ="<div class='hljs' style='border-top-left-radius: 5px;border-top-right-radius: 8px;padding: 3px'>" +
        "<div class='tools' style='background-color: red'></div>" +
        "<div class='tools' style='background-color: yellow'></div>" +
        "<div class='tools' style='background-color:green'></div>" +
        codename + "</div>";
    $(this).parent().prepend(str);
    $(this).css('padding-top','0');
    $(this).css('border-bottom-right-radius','5px');
    $(this).css('border-bottom-left-radius','5px');
    $(this).css('opacity','0.95');
});