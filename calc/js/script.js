//この上に何も書かない
jQuery(function($){
	var maxLength = 6;//ケタ数の上限
	var memory = "";//メモリーを空にする
	$("#calc").on("click", ".num", function(){
		var num = $(this).text();
		var current = $(".result").text();
		var newVal;
		//次に表示する値を判定する
		if (current == "0"){
			newVal = num;
		} else if (
			memory.length == 0 ||
			memory.match(/[\+\-\*\/\%]$/)){
			newVal = num;
		} else {
			newVal = current + num;
		}
		//newValで新しい数字の表示
		if (newVal.length > maxLength) {
				return;//６桁以上で処理が終わる
			}
		$(".result").text(newVal);
		memory = memory + num;
	}).on("click",".clear",function(){
		$(".result").text(0);
		memory = "";
	}).on("click", ".ope", function(){
		if(!isEndOpe()){
			//下でvarを作ったからmemory.match(/[\+\-\*\/\%]$/)){
			if (checkOverflow()){
				return;
			} else {
				showResult(eval(memory));
			}
		}
		var ope = $(this).text();
		if (memory.length == 0){
			memory = $(".result").text() + ope;
		} else if (isEndOpe()){
		//下でvarを作ったから(memory.match(/[\+\-\*\/\%]$/)){
			memory = memory.replace(/[\+\-\*\/\%]$/, ope);
			//↑最後の演算子に置き換える
		} else {
			memory = memory + ope;
		}
	}).on("click", ".eq", function(){
		new Audio("images/porson.mp3").play();
		if(isEndOpe()){
			return;
		}
				//evalは文字列を数字列に変える
		//var result = eval(memory);
				//↓数字の「１」を文字という認識をさせる（toString）
		//lengthは文字列のみ認識する
		if (!checkOverflow()){
			//var result = eval(memory);
		//if (result.toString().length >= maxLength){
			//alert("ケタ数オーバー")
			//memory = "";
			//showResult(0);
		//} else {
		showResult(eval(memory));
		//$(".result").text(eval(memory));
		memory = "";
		}
	}).on("click",".switch",function(){
			var current = $(".result").text();
			if (current == "0") {
				return;
			}
			var newValue;
			if(current.startsWith("-")){
				newValue = current.replace(/^\-?/,"");
			} else {
				newValue = "-" + current;
			}
				showResult(newValue);
			})
		.on("click", ".button", function(){
		new Audio("images/dog.mp3").play();
		console.log(memory);
	});

	var isEndOpe = function(){
		return memory.match(/[\+\-\*\/\%]$/);
	};
	var checkOverflow = function(){
		var result = eval(memory);
		if (result &&//resultに何か入っていてresult.toString().lengthがmaxLengthより大きい時
				result.toString().length > maxLength){
			alert("ケタ数オーバーフロー")
			showResult(0);
			memory = "";
			return true;
		}
		return false;
	};
	function showResult(value){
		$(".result").text(value);
	}
});
//この下に何も書かない