var h_show = false;
var h_time = 5;
var pj_diquname = new Array("上海","河北 廊坊","北京","辽宁 沈阳","四川 成都","江苏 苏州","湖南 岳阳","广东 广州","新疆 乌鲁木齐","天津","青海 西宁","宁夏 银川","四川 崇州","贵州 遵义","西藏 拉萨","甘肃 天水","浙江 宁波","安徽 马鞍山","江西 宜春","吉林 四平","吉林 长春","辽宁 本溪","辽宁 沈阳","陕西 西安","云南 大理","湖北 十堰","湖北 武汉","内蒙古 包头","山西 太原","山西 阳泉","江苏 南京","山东 济南","山东 潍坊","广东 深圳","广东 茂名","广东 湛江","广西 梧州","广西 桂林","四川 南充","新疆 吐鲁番","广西 南宁","广东 东莞","福建 莆田","福建 泉州","福建 龙岩","浙江 台州","江苏 连云港","辽宁 本溪","甘肃 兰州","甘肃 白银","山东 泰安","湖南 湘潭","云南 玉溪","陕西 西安","陕西 商洛","陕西 榆林","陕西 渭南","陕西 汉中","陕西 宝鸡");
var pj_username = new Array("赵","钱","孙","李","周","吴","郑","王","张","施","吕","何","许","尤","秦","朱","杨","韩","沈","蒋","卫","刘","陈","冯");


$(function(){

	function scollDown(id,time){
          var liHeight=$("#"+id+" ul li").height();
          var time=time||2500;
          setInterval(function(){
          $("#"+id+" ul").prepend($("#"+id+" ul li:last").css("height","0px").animate({
          	height:liHeight+"px"
          },"slow"));
          },time);
        

	}

	scollDown("pingjia",3000);
	scollDown("fahuo",3000);

});



function PCAS() {
	this.SelP = document.getElementsByName(arguments[0])[0];
	this.SelC = document.getElementsByName(arguments[1])[0];
	this.SelA = document.getElementsByName(arguments[2])[0];
	this.DefP = this.SelA ? arguments[3] : arguments[2];
	this.DefC = this.SelA ? arguments[4] : arguments[3];
	this.DefA = this.SelA ? arguments[5] : arguments[4];
	this.SelP.PCA = this;
	this.SelC.PCA = this;
	this.SelP.onchange = function() {
		PCAS.SetC(this.PCA)
	};
	if (this.SelA) this.SelC.onchange = function() {
		PCAS.SetA(this.PCA)
	};
	PCAS.SetP(this)
};
PCAS.SetP = function(PCA) {
	for (i = 0; i < PCAP.length; i++) {
		PCAPT = PCAPV = PCAP[i];
		if (PCAPT == SPT) PCAPV = "";
		PCA.SelP.options.add(new Option(PCAPT, PCAPV));
		if (PCA.DefP == PCAPV) PCA.SelP[i].selected = true
	}
	PCAS.SetC(PCA)
};
PCAS.SetC = function(PCA) {
	PI = PCA.SelP.selectedIndex;
	PCA.SelC.length = 0;
	for (i = 1; i < PCAC[PI].length; i++) {
		PCACT = PCACV = PCAC[PI][i];
		if (PCACT == SCT){
			PCACV = "";
			if(i == 1)PCA.SelC.options.add(new Option(PCACT, PCACV));
		}else{
			PCA.SelC.options.add(new Option(PCACT, PCACV));
		}
		PCA.SelC[0].selected = true
		if (PCA.DefC == PCACV) PCA.SelC[i - 1].selected = true;
		if(PCA.SelC.options.length == 2) PCA.SelC[1].selected = true;
	}
	if (PCA.SelA) PCAS.SetA(PCA)
};
PCAS.SetA = function(PCA) {
	PI = PCA.SelP.selectedIndex;
	CI = PCA.SelC.selectedIndex;
	PCA.SelA.length = 0;
	for (i = 1; i < PCAA[PI][CI].length; i++) {
		PCAAT = PCAAV = PCAA[PI][CI][i];
		if (PCAAT == SAT) {
			PCAAV = "";
			if(i == 1)PCA.SelA.options.add(new Option(PCAAT, PCAAV));
		}else{
			PCA.SelA.options.add(new Option(PCAAT, PCAAV));
		}
		
		PCA.SelA[0].selected = true;
		if (PCA.DefA == PCAAV) PCA.SelA[i - 1].selected = true;
		if(PCA.SelA.options.length == 2) PCA.SelA[1].selected = true;
	}
}

function getpj_username(){
	return pj_username[Math.floor((Math.random()*pj_username.length))];
}

function getpj_diquname(){
	return pj_diquname[Math.floor((Math.random()*pj_diquname.length))];
}



function m_Timer(){
	if(h_time > 0){
		h_time--;
	}else{
		if(h_show){
			hideHint();
			h_show = false;
			h_time = Math.floor((Math.random()*200));
		}else{
			$('#info_hint').html('来自 ' + getpj_diquname().replace(" ","") + ' 的' + getpj_username() + '**刚刚订购成功了！');
			showHint();
			h_show = true;
			h_time = 10;
		}
	}
}

