try{	
	var thissrc = document.getElementById("yzm").src;
	function refreshCode(){
		document.getElementById("yzm").src=thissrc+"?"+Math.random(); 
	}
}
catch(ex){
} 	
function setnot3guanlian(s){
    var not3guanlianHTML='';
    var guanlians=not3guanlian[s].split("|");
    for(var i=0;i<guanlians.length;i++){
    if (guanlians[0] != ''){
        not3guanlianHTML=not3guanlianHTML+"<div class=\"bdbox\">";
        var guanlian=guanlians[i].split("#");
        not3guanlianHTML=not3guanlianHTML+"     <label class=\"bdxx\"><em>*</em>"+guanlian[0]+"</label>";
        not3guanlianHTML=not3guanlianHTML+"     <div class=\"dxbox red chanpin not3chanpin"+i+"\">";
        for(var j=1;j<guanlian.length;j++){
            if (not3peizhi[5]=='new' && guanlian[j].indexOf("[tu]")>0){
            not3guanlianHTML=not3guanlianHTML+"<label><input type=\"radio\" name=\"chanpin"+i+"\" id=\"chanpin"+i+j+"\" value=\""+guanlian[j].split("[tu]")[0]+"\" datatype=\"*\" errormsg=\"请选择"+guanlian[0]+"！\" nullmsg=\"请选择"+guanlian[0]+"！\"><p><img src='"+guanlian[j].split("[tu]")[1]+"'></p>"+guanlian[j].split("[tu]")[0]+"</label>";
            }else if(not3peizhi[5]=='old' && guanlian[j].indexOf("[tu]")>0){
            not3guanlianHTML=not3guanlianHTML+"<label><input type=\"radio\" name=\"chanpin"+i+"\" id=\"chanpin"+i+j+"\" value=\""+guanlian[j].split("[tu]")[0]+"\" datatype=\"*\" errormsg=\"请选择"+guanlian[0]+"！\" nullmsg=\"请选择"+guanlian[0]+"！\">"+guanlian[j].split("[tu]")[0]+"</label><br>";
            }else if(not3peizhi[5]=='old' && guanlian[j].indexOf("[tu]")<0){
            not3guanlianHTML=not3guanlianHTML+"<label><input type=\"radio\" name=\"chanpin"+i+"\" id=\"chanpin"+i+j+"\" value=\""+guanlian[j]+"\" datatype=\"*\" errormsg=\"请选择"+guanlian[0]+"！\" nullmsg=\"请选择"+guanlian[0]+"！\">"+guanlian[j]+"</label><br>";
            }else{
            not3guanlianHTML=not3guanlianHTML+"<label><input type=\"radio\" name=\"chanpin"+i+"\" id=\"chanpin"+i+j+"\" value=\""+guanlian[j]+"\" datatype=\"*\" errormsg=\"请选择"+guanlian[0]+"！\" nullmsg=\"请选择"+guanlian[0]+"！\">"+guanlian[j]+"</label>";
            }
        }
        not3guanlianHTML=not3guanlianHTML+"     </div>";
        not3guanlianHTML=not3guanlianHTML+"</div>";
    }}
    document.getElementById("not3guanlian").innerHTML=not3guanlianHTML;
    not3chanpin();
}
setnot3guanlian(0);
function not3jiage(){
	var productalt = document.not3orderform.product.alt;
	for(var i=0;i<document.not3orderform.product.length;i++){
		if(document.not3orderform.product[i].checked==true){
		    var productalt = document.not3orderform.product[i].alt;
			document.getElementById("not3chanpin").value=document.not3orderform.product[i].value;
			setnot3guanlian(i);
			break;
		}
	}
	var not3other = productalt.split("###");
	var product=not3other[0];
    if(document.not3orderform.mun.value=="" || document.not3orderform.mun.value==0){	
		var mun=1;
	}
	else{
		var mun=document.not3orderform.mun.value;
	}	
	var price=product*mun;
    document.getElementById("b1").checked='checked';
	document.not3orderform.price.value=price;
	document.not3orderform.zfbprice.value=price;
	document.not3orderform.zfbewm.value=not3other[1];
	document.not3orderform.wxewm.value=not3other[2];
	//document.getElementById("showprice").innerHTML=price;
	document.getElementById("zfbyh").innerHTML='';
}

try{	
   var productalt = document.getElementById("a0").alt;
   var not3other = productalt.split("###");
   document.not3orderform.zfbewm.value=not3other[1];
   document.not3orderform.wxewm.value=not3other[2];
}
catch(ex){
}

//***************************  支付宝价格  ***************************
function zfbprize(){
         var sprice=document.not3orderform.zfbprice.value;
         document.not3orderform.price.value=(sprice*not3peizhi[0]*0.1).toFixed(0)
}
/*///////////////////////////////////////// ORDERJSFGX /////////////////////////////////////////*/
function changeItem(i){

if (i==1) {
  if (not3peizhi[0] != 0){
     zfbprize();
     document.getElementById("zfbyh").innerHTML='<font color=red><b><s>&nbsp;原价：'+document.not3orderform.zfbprice.value+'元&nbsp;</s>&nbsp;'+not3peizhi[0]+'折优惠</b></font>';
  }
}else{
//oprize1();
document.getElementById("zfbyh").innerHTML='';
document.not3orderform.price.value=document.not3orderform.zfbprice.value;
}
}

function addnumber(){
    if(not3peizhi[1] == 0 || $('#mun').val()<not3peizhi[1] ){
	    $('#mun').val(parseInt($('#mun').val())+1);
	    not3jiage();
	}else{
	    alert("该商品限购 "+not3peizhi[1]+" 件");
	}
}

function minnumber(){
	if($('#mun').val()>1){
	$('#mun').val(parseInt($('#mun').val())-1);
	not3jiage();
	}
}
function inputnumber(){
	var number=parseInt($('#mun').val());
	if(isNaN(number)||number<1){
		$('#mun').val('1');
	    not3jiage();
	}else{
		$('#mun').val(number);
        not3jiage();
	}
}


$("#not3ssx").citySelect({
    nodata:"none",required:false
});
$(document).ready(function(){
    if("1"=="1"){
	
      if ("undefined" != typeof remote_ip_info){
        var zhixiashi="北京|天津|上海|重庆"
        if (zhixiashi.indexOf(remote_ip_info['province']) > -1) {
           var myprovince = remote_ip_info['province']+'市'; 
           var mycity = remote_ip_info['city']+'市'; 
           var mydistrict = remote_ip_info['district']; 
        }else{
           var myprovince = remote_ip_info['province']+''; 
           var mycity = remote_ip_info['city']+''; 
           var mydistrict = remote_ip_info['district']; 
        }
        $("#not3ssx").citySelect({
            prov:myprovince,  
            city:mycity,
            nodata:"none",required:false
        });
      }
    }
})



$.Tipmsg.tit="系统提示";
var demo=$("#not3orderform").Validform({
		beforeSubmit:function(curform){
	    if("undefined" != typeof not3ad){not3ad();}
    }}
);
demo.tipmsg.s="error! 有必填信息未填写或者选中.";

function not3guanlianchanpin(){
  var not3guanlianV=$('input:radio[name="product"]:checked').val();
  if($('input:radio[name="chanpin0"]:checked').val() == null){}else{not3guanlianV=not3guanlianV+' ['+$('input:radio[name="chanpin0"]:checked').val()+']' }
  if($('input:radio[name="chanpin1"]:checked').val() == null){}else{not3guanlianV=not3guanlianV+' ['+$('input:radio[name="chanpin1"]:checked').val()+']' }
  if($('input:radio[name="chanpin2"]:checked').val() == null){}else{not3guanlianV=not3guanlianV+' ['+$('input:radio[name="chanpin2"]:checked').val()+']' }
  if($('input:radio[name="chanpin3"]:checked').val() == null){}else{not3guanlianV=not3guanlianV+' ['+$('input:radio[name="chanpin3"]:checked').val()+']' }
  if($('input:radio[name="chanpin4"]:checked').val() == null){}else{not3guanlianV=not3guanlianV+' ['+$('input:radio[name="chanpin4"]:checked').val()+']' }
  if($('input:radio[name="chanpin5"]:checked').val() == null){}else{not3guanlianV=not3guanlianV+' ['+$('input:radio[name="chanpin5"]:checked').val()+']' }
  if($('input:radio[name="chanpin6"]:checked').val() == null){}else{not3guanlianV=not3guanlianV+' ['+$('input:radio[name="chanpin6"]:checked').val()+']' }
  if($('input:radio[name="chanpin7"]:checked').val() == null){}else{not3guanlianV=not3guanlianV+' ['+$('input:radio[name="chanpin7"]:checked').val()+']' }
  if($('input:radio[name="chanpin8"]:checked').val() == null){}else{not3guanlianV=not3guanlianV+' ['+$('input:radio[name="chanpin8"]:checked').val()+']' }
  if($('input:radio[name="chanpin9"]:checked').val() == null){}else{not3guanlianV=not3guanlianV+' ['+$('input:radio[name="chanpin9"]:checked').val()+']' }
  $("#not3chanpin").val(not3guanlianV);
}
function not3chanpin(){
	 $(".not3chanpin label").bind("click",function(){
			var o = $(this);
			if(!o.hasClass("now")){
				$(".not3chanpin label").removeClass("now");
				o.addClass("now");
			}
		});
	 $(".not3chanpin0 label").bind("click",function(){
			var o = $(this);
			if(!o.hasClass("now")){
				 $(".not3chanpin0 label").removeClass("now");
				o.addClass("now");
			}
			$(o.find("input")).attr("checked","checked");
			not3guanlianchanpin();
		});
	 $(".not3chanpin1 label").bind("click",function(){
			var o = $(this);
			if(!o.hasClass("now")){
				$(".not3chanpin1 label").removeClass("now");
				o.addClass("now");
			}
			$(o.find("input")).attr("checked","checked");
			not3guanlianchanpin();
		});
	 $(".not3chanpin2 label").bind("click",function(){
			var o = $(this);
			if(!o.hasClass("now")){
				$(".not3chanpin2 label").removeClass("now");
				o.addClass("now");
			}
			$(o.find("input")).attr("checked","checked");
			not3guanlianchanpin();
		});
	 $(".not3chanpin3 label").bind("click",function(){
			var o = $(this);
			if(!o.hasClass("now")){
				$(".not3chanpin3 label").removeClass("now");
				o.addClass("now");
			}
			$(o.find("input")).attr("checked","checked");
			not3guanlianchanpin();
		});
	 $(".not3chanpin4 label").bind("click",function(){
			var o = $(this);
			if(!o.hasClass("now")){
				$(".not3chanpin4 label").removeClass("now");
				o.addClass("now");
			}
			$(o.find("input")).attr("checked","checked");
			not3guanlianchanpin();
		});
	 $(".not3chanpin5 label").bind("click",function(){
			var o = $(this);
			if(!o.hasClass("now")){
				$(".not3chanpin5 label").removeClass("now");
				o.addClass("now");
			}
			$(o.find("input")).attr("checked","checked");
			not3guanlianchanpin();
		});
	 $(".not3chanpin6 label").bind("click",function(){
			var o = $(this);
			if(!o.hasClass("now")){
				$(".not3chanpin6 label").removeClass("now");
				o.addClass("now");
			}
			$(o.find("input")).attr("checked","checked");
			not3guanlianchanpin();
		});
	 $(".not3chanpin7 label").bind("click",function(){
			var o = $(this);
			if(!o.hasClass("now")){
				$(".not3chanpin7 label").removeClass("now");
				o.addClass("now");
			}
			$(o.find("input")).attr("checked","checked");
			not3guanlianchanpin();
		});
	 $(".not3chanpin8 label").bind("click",function(){
			var o = $(this);
			if(!o.hasClass("now")){
				$(".not3chanpin8 label").removeClass("now");
				o.addClass("now");
			}
			$(o.find("input")).attr("checked","checked");
			not3guanlianchanpin();
		});
	 $(".not3chanpin9 label").bind("click",function(){
			var o = $(this);
			if(!o.hasClass("now")){
				$(".not3chanpin9 label").removeClass("now");
				o.addClass("now");
			}
			$(o.find("input")).attr("checked","checked");
			not3guanlianchanpin();
		});
}
not3chanpin();

function checktel(){
		if (document.getElementById("notchecktel").value==""){
			alert('请输入要查询的手机号码！');
			document.getElementById("notchecktel").focus();
			return false;
		}
		var form = /^1[3,4,5,7,8]\d{9}$/;
		if (!form.test(document.getElementById("notchecktel").value)){
			alert('手机号码格式不正确，请重新填写！');
			document.getElementById("notchecktel").focus();
			return false;
		}
		document.getElementById("notcheckif").src=not3peizhi[2]+'app/checkorder/index.asp?rand='+parseInt(100000*Math.random()+1)+'&tel='+document.getElementById("notchecktel").value;
}

var wait=60;
function time(o) {
   if (document.not3orderform.mob.value.length != 11){
   alert("请输入11位手机号码")
   }else{
       if (wait == 0) {
            o.removeAttribute("disabled");            
            o.value="获取验证码";
            wait = 60;
        } else {
        if (wait==60){
        //alert("验证码已经发送");
        $.getScript(not3peizhi[2]+'app/sms/not_yzm.asp?mob='+document.not3orderform.mob.value);
        }
            o.setAttribute("disabled", true);
            o.value="重新发送(" + wait + ")";
            wait--;
            setTimeout(function() {
                time(o)
            },
            1000)
        }
}}
try{	
document.getElementById("not3sms").onclick=function(){time(this);}
}
catch(ex){
}
if(not3peizhi[3]=="True"){$.getScript("http://getos.not3.com/?format=js");}