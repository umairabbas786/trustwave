$(document).ready(function(){

	var percent =  parseFloat(document.getElementById("Ultra").value); 
	var minMoney 	= [5,500,5000,15000];
	var maxMoney	= [5000,5000,15000,200000];
	$("#money").val(minMoney[0]);
	console.log($("#money").val(minMoney[0]));
	
	//Calculator
	function calc(){
		var money = parseFloat($("#money").val());
		switch (percent) {
		    case 0:
		       if ( money >= 5 && money < 5000){

		        	var profitHourly = money / 100 * 1;
					var profitHourly = profitHourly.toFixed(3);
					var profitDaily = profitHourly * 24;
					var profitDaily = profitDaily.toFixed(3);
					var profitTotal = money / 100 * 120;
					var profitTotal = profitTotal.toFixed(3);

					$("#profitHourly").text(profitHourly);
					$("#profitDaily").text(profitDaily);
					$("#profitTotal").text(profitTotal);

		       
				}
		        break;
			case 1:
		        if ( money >= 500 && money < 5000){

		        	var profitHourly = money / 100 * 1;
					var profitHourly = profitHourly.toFixed(3);
					var profitDaily = profitHourly * 24;
					var profitDaily = profitDaily.toFixed(3);
					var profitTotal = money / 100 * 130;
					var profitTotal = profitTotal.toFixed(3);

					$("#profitHourly").text(profitHourly);
					$("#profitDaily").text(profitDaily);
					$("#profitTotal").text(profitTotal);

		    
				}
		        break;
		    case 2:
		    	if ( money >= 5000 && money < 15000){

		        	var profitHourly = money / 100 * 1;
					var profitHourly = profitHourly.toFixed(3);
					var profitDaily = profitHourly * 24;
					var profitDaily = profitDaily.toFixed(3);
					var profitTotal = money / 100 * 130;
					var profitTotal = profitTotal.toFixed(3);

					$("#profitHourly").text(profitHourly);
					$("#profitDaily").text(profitDaily);
					$("#profitTotal").text(profitTotal);

		       
				}
		   
		        break;
		    case 3:
		    	if ( money >= 15000 && money < 200000){

		         	var profitHourly = money / 100 * 1;
					var profitHourly = profitHourly.toFixed(3);
					var profitDaily = profitHourly * 24;
					var profitDaily = profitDaily.toFixed(3);
					var profitTotal = money / 100 * 140;
					var profitTotal = profitTotal.toFixed(3);

					$("#profitHourly").text(profitHourly);
					$("#profitDaily").text(profitDaily);
					$("#profitTotal").text(profitTotal);

				} 
		        break;
		    
		}
	}
	if($("#money").length){
		calc();
	}
	$("#money").keyup(function(){
		calc();
	});

	$("#Ultra").on('change', function() {
		percent = parseFloat(this.value);
		calc();
	})
});
