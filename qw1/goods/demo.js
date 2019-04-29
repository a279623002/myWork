var h_show = false;
var h_time = 5;
var pj_diquname = new Array("�Ϻ�","�ӱ� �ȷ�","����","���� ����","�Ĵ� �ɶ�","���� ����","���� ����","�㶫 ����","�½� ��³ľ��","���","�ຣ ����","���� ����","�Ĵ� ����","���� ����","���� ����","���� ��ˮ","�㽭 ����","���� ��ɽ","���� �˴�","���� ��ƽ","���� ����","���� ��Ϫ","���� ����","���� ����","���� ����","���� ʮ��","���� �人","���ɹ� ��ͷ","ɽ�� ̫ԭ","ɽ�� ��Ȫ","���� �Ͼ�","ɽ�� ����","ɽ�� Ϋ��","�㶫 ����","�㶫 ï��","�㶫 տ��","���� ����","���� ����","�Ĵ� �ϳ�","�½� ��³��","���� ����","�㶫 ��ݸ","���� ����","���� Ȫ��","���� ����","�㽭 ̨��","���� ���Ƹ�","���� ��Ϫ","���� ����","���� ����","ɽ�� ̩��","���� ��̶","���� ��Ϫ","���� ����","���� ����","���� ����","���� μ��","���� ����","���� ����");
var pj_username = new Array("��","Ǯ","��","��","��","��","֣","��","��","ʩ","��","��","��","��","��","��","��","��","��","��","��","��","��","��");


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
			$('#info_hint').html('���� ' + getpj_diquname().replace(" ","") + ' ��' + getpj_username() + '**�ոն����ɹ��ˣ�');
			showHint();
			h_show = true;
			h_time = 10;
		}
	}
}

