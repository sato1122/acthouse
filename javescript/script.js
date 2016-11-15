var p1 = document.getElementById("p1");
console.log(p1);
var clz=document.getElementsByClassName("p")
console.log(clz[1].innerHTML);
var tags=document.getElementsByTagName("p")
console.log(tags[2].innerHTML);

var oldColor;
var div1=document.getElementById("div1");
	div1.addEventListener("mouseover",function(){
		/*var div=document.getElementById("div1");*/
		oldColor=this.style.backgroundColor;
		this.style.backgroundColor="red";
	});
div1.addEventListener("mouseout",function(){
 this.style.backgroundColor=oldColor;
});

document.getElementById("remove-child")
 .addEventListener("click",function(){
 	var container=
 	document.getElementById("container");
 	var children=container.children;
 	//console.log(children);
 	//container.removeChild(children[2]);
 	var firstChild=container.firstChild;
 	var lastChild=container.lastChild;
 	if(lastChild){
 	container.removeChild(lastChild);
  }
 });

document.getElementById("add-class")
.addEventListener("click",function(){
 	var e=document.createElement("div");
 	e.setAttribute("class","child");
 	document.getElementById("container")
 	 .appendChild(e);
 });

document.getElementById("add-child")
 .addEventListener("click",function(){
 	var e=document.createElement("div");
 	document.getElementById("container")
 	 .appendChild(e);
 });

var timerId,time=0;
document.getElementById("start")
 .addEventListener("click",function(){
 	if(!timerId){
	 	timerId=setInterval(function(){
	 		document.getElementById("timer").innerHTML=time;
	 		time++;
	 	},1000);
 	}
 });
document.getElementById("stop")
	.addEventListener("click",function(){
		clearInterval(timerId);
		timerId=null;
	});

document.getElementById("interval")/*色の変化*/
	.addEventListener("click",function(){
		setInterval(function(){
			var div=document.getElementById("div3");
			if(div.style.backgroundColor==""){
				div.style.backgroundColor="blue";
			}else{
				div.style.backgroundColor="";
			}
		},3000)
	});

document.getElementById("delay")
 .addEventListener("click",function(){
 	setTimeout(function(){
 		alert("maayon buntag")
 	},5000);
 });

var imageIndex=0;
document.getElementById("image")
	.addEventListener("click",function(){
		var images=
		["aaa.jpeg","bbb.jpeg","ccc.jpeg","ddd.jpeg"];
		this.src=images[imageIndex];
		if (imageIndex<3){
			imageIndex++;
		}else{
			imageIndex=0;
		}
});

document.getElementById("div2");
	div2.addEventListener("click",function(){
	if(this.style.width=="300px"){
		this.style.width="100px";
	}else{
		this.style.width="300px";
	}
	if(this.style.fontSize=="8px"){
		this.style.fontSize="20px";
	}else{
		this.style.fontSize="8px";
	}
	if(!this.style.borderRadius){
		this.style.borderRadius="100px";
	}else{
		this.style.borderRadius=null;
	}	
});

	
document.getElementById("btn1")
	.addEventListener("click",function(){
		var val=document.getElementById("text1").value;
		if (val==''){
		alert("告白の言葉は？");
		}else if(val=="好きです"){
		alert("一般的な回答ですねw");
		}else{
		alert("個性的な告白ですね");
		}
	});
document.getElementById("btn2")
	.addEventListener("click",function(){
		var val=document.getElementById("text1").value;
		switch(val){
		case '0':
			alert("0");
			break;
		case '1':
			alert("1");
			break;
		case '2':
		  alert("2");
		  break;
		default:
			alert("0,1,2,以外");
		}
	});

document.getElementById("open-self")
 .addEventListener('click',function(){
 	location.href="http://www.yahoo.co.jp";
 });
 document.getElementById("open-new")
 	.addEventListener("click",function(){
 		window.open("http://www.apple.com/ph");
 	});

	document.getElementById("btn-while")
		.addEventListener('click',function(){
			var from=document.getElementById("from").value;
			var to=document.getElementById("to").value;
			if (from==""|| to ==""){
				alert("数値を入力してください");
				return;
			}
			var num=+from;
			var total=0;
			while(num<=+to){
				total=total+num;
				num++;
			}
			alert(from+"から"+to+"までの合計は"+total+"です");
		});

document.getElementById("btn-array")
	.addEventListener('click',function(){
		var gender=new Array();
		gender[0]="男";
		gender[1]="女";
		gender[2]="不明";
    document.getElementById("array").innerHTML=gender[2];
    var month=["Jan","Feb","Mar","Apr","May","June",
    "july","Aug","Sep","Oct","Nov","Dec"];
    document.getElementById("array").innerHTML=month[4]
    for(var i=0; i<month.length; i++){
    	console.log(month[i]);
    }
  });
  document.getElementById("btn-array1")
	.addEventListener('click',function(){
 var team=["カープ","ジャイアンツ","ベイスターズ","タイガース","スワローズ","ドラゴンズ",
    "ファイターズ","ホークス","マーリンズ","ライオンズ","イーグルス","バッファローズ"];
    document.getElementById("array1").innerHTML=team[7]
    for(var i=0; i<team.length; i++){
    	console.log(team[i]);
    }
  });

document.getElementById("alert")
	.addEventListener("click",function(){
		alert("Hello JaveScript!");
	});

	document.getElementById("confirm")
	.addEventListener('click',function(){
		var result=confirm("リスカの跡はありますか？");
		if(result==true){
		alert("精神科をお勧めします");
		}else{
		alert("順風満帆の人生ですね");
		}
	});

	document.getElementById("prompt")
	.addEventListener("click",function(){
		var response=prompt("リスカの原因はなんですか？");
		alert("大変でしたね。"+response+"さん、生きていて楽しいですか？");
	});

function showP1(message,message2){
	var p1=document.getElementById("p1");
	p1.innerHTML=message;
	document.getElementById("p2").innerHTML=message2;
}
function showP2(){
	var p4=document.getElementById("p4");
	p4.innerHTML="とても眠いw"
}
function showP3(){
	var p3=document.getElementById("p3");
	p3.innerHTML="精神的疲労MAXw"
}
document.getElementById("change-p1").addEventListener('click',function(){
document.getElementById("p1").innerHTML="イベントリスナから変更";
});

var btn=document.getElementById("wanima")
btn.addEventListener('click',function(){
	var paragragh1=document.getElementById("p1")
	paragragh1.innerHTML="引数で変更"
	var paragragh2=document.getElementById("p2")
	paragragh2.innerHTML="毎日課題が多くて"
});