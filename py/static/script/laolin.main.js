var laolin={};

  laolin.fnTemplate=function(to,from,data){
    $(to).html(data);//_.template($(from),data));
  };
  
  laolin.fnTemplateRest=function(to,from,url){
    $.getJSON(url,function(data){
      
      laolin.fnTemplate(to,from,data);
    });
  };
  
$(function(){
  laolin.data={};//放一些变量的地方
  
});