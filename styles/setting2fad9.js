$(document).ready(function(){
	wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();

	var percent =  parseFloat(document.getElementById("Ultra").value); 

	$("#money").val("20");
	
	//Calculator
	function calc(){
		var money = parseFloat($("#money").val());

		switch (percent) {
		    case 0:
				if ( money >= 20 && money <= 1000){

					var profitTotal = money / 100 * 103;
					var profitTotal = profitTotal.toFixed(2);

					$("#profitTotal").text(profitTotal);

		        } if (money >= 1001 && money <= 5000) {

					var profitTotal = money / 100 * 104;
					var profitTotal = profitTotal.toFixed(2);

					$("#profitTotal").text(profitTotal);
					
		        } if (money >= 5001 && money <= 10000) {

					var profitTotal = money / 100 * 107;
					var profitTotal = profitTotal.toFixed(2);
					
					$("#profitTotal").text(profitTotal);
					
				} if (money >= 10001 && money <= 20000) {

					var profitTotal = money / 100 * 114;
					var profitTotal = profitTotal.toFixed(2);

					$("#profitTotal").text(profitTotal);	
					
				} if (money >= 20001 && money <= 50000) {

					var profitTotal = money / 100 * 130;
					var profitTotal = profitTotal.toFixed(2);
	
					$("#profitTotal").text(profitTotal);		
					
				//} else if(isNaN(money) == true) {
				} if (money < 20) {
					$("#profitDaily").text("Min: $20");
					$("#profitTotal").text("Min: $20");
				}
		        break;
			case 1:
				if ( money >= 20 && money <= 1000){

					var profitTotal = money / 100 * 117;
					var profitTotal = profitTotal.toFixed(2);

					
					$("#profitTotal").text(profitTotal);

		        } if (money >= 1001 && money <= 5000) {

					var profitTotal = money / 100 * 122;
					var profitTotal = profitTotal.toFixed(2);

					$("#profitTotal").text(profitTotal);
					
		        } if (money >= 5001 && money <= 10000) {

					var profitTotal = money / 100 * 140;
					var profitTotal = profitTotal.toFixed(2);
					
					$("#profitTotal").text(profitTotal);
					
				} if (money >= 10001 && money <= 20000) {

					var profitTotal = money / 100 * 180;
					var profitTotal = profitTotal.toFixed(2);
					

					$("#profitTotal").text(profitTotal);	
					
				} if (money >= 20001 && money <= 50000) {
		
					var profitTotal = money / 100 * 290;
					var profitTotal = profitTotal.toFixed(2);
					
					$("#profitTotal").text(profitTotal);		
					
				//} else if(isNaN(money) == true) {
				} if (money < 20) {
					$("#profitDaily").text("Min: $20");
					$("#profitTotal").text("Min: $20");
				}
		        break;
		    case 2:
		    	if ( money >= 20 && money <= 1000){


					var profitTotal = money / 100 * 155;
					var profitTotal = profitTotal.toFixed(2);

					$("#profitTotal").text(profitTotal);

		        } if (money >= 1001 && money <= 5000) {

					var profitTotal = money / 100 * 180;
					var profitTotal = profitTotal.toFixed(2);

					$("#profitTotal").text(profitTotal);
					
		        } if (money >= 5001 && money <= 10000) {

					var profitTotal = money / 100 * 250;
					var profitTotal = profitTotal.toFixed(2);
					
					$("#profitTotal").text(profitTotal);
					
				} if (money >= 10001 && money <= 20000) {

					var profitTotal = money / 100 * 450;
					var profitTotal = profitTotal.toFixed(2);
					

					$("#profitTotal").text(profitTotal);	
					
				} if (money >= 20001 && money <= 50000) {
	
					var profitTotal = money / 100 * 950;
					var profitTotal = profitTotal.toFixed(2);
					
					$("#profitTotal").text(profitTotal);		
					
				//} else if(isNaN(money) == true) {
				} if (money < 20) {
					$("#profitDaily").text("Min: $20");
					$("#profitTotal").text("Min: $20");
				}
		        break;
		    case 3:
		    	if ( money >= 200 && money <= 1000){

					var profitTotal = money / 100 * 300;
					var profitTotal = profitTotal.toFixed(2);


					$("#profitTotal").text(profitTotal);

		        } if (money >= 1001 && money <= 5000) {
	
					var profitTotal = money / 100 * 400;
					var profitTotal = profitTotal.toFixed(2);

					$("#profitTotal").text(profitTotal);
					
		        } if (money >= 5001 && money <= 10000) {

					var profitTotal = money / 100 * 800;
					var profitTotal = profitTotal.toFixed(2);
	
					$("#profitTotal").text(profitTotal);
					
				} if (money >= 10001 && money <= 20000) {

					var profitTotal = money / 100 * 1300;
					var profitTotal = profitTotal.toFixed(2);
					
					$("#profitTotal").text(profitTotal);	
					
				} if (money >= 20001 && money <= 50000) {

					var profitTotal = money / 100 * 2400;
					var profitTotal = profitTotal.toFixed(2);

					$("#profitTotal").text(profitTotal);		
					
				//} else if(isNaN(money) == true) {
				} if (money < 200) {
					$("#profitDaily").text("Min: $200");
					$("#profitTotal").text("Min: $200");
				}
		        break;
		    case 4:
		    	if ( money >= 300 && money <= 1000){

					var profitTotal = money / 100 * 600;
					var profitTotal = profitTotal.toFixed(2);
					$("#profitTotal").text(profitTotal);

		        } if (money >= 1001 && money <= 5000) {

					var profitTotal = money / 100 * 900;
					var profitTotal = profitTotal.toFixed(2);

					$("#profitTotal").text(profitTotal);
					
		        } if (money >= 5001 && money <= 10000) {

					var profitTotal = money / 100 * 1300;
					var profitTotal = profitTotal.toFixed(2);
	
					$("#profitTotal").text(profitTotal);
					
				} if (money >= 10001 && money <= 20000) {

					var profitTotal = money / 100 * 2100;
					var profitTotal = profitTotal.toFixed(2);
				
					$("#profitTotal").text(profitTotal);	
					
				} if (money >= 20001 && money <= 50000) {

					var profitTotal = money / 100 * 4600;
					var profitTotal = profitTotal.toFixed(2);
					
					$("#profitTotal").text(profitTotal);		
					
				//} else if(isNaN(money) == true) {
				} if (money < 300) {
					$("#profitDaily").text("Min: $300");
					$("#profitTotal").text("Min: $300");
				}
		        break;
		    case 5:
		    	if ( money >= 600 && money <= 1000){

					var profitTotal = money / 100 * 1300;
					var profitTotal = profitTotal.toFixed(2);

					$("#profitTotal").text(profitTotal);

		        } if (money >= 1001 && money <= 5000) {
		
					var profitTotal = money / 100 * 2000;
					var profitTotal = profitTotal.toFixed(2);

					
					$("#profitTotal").text(profitTotal);
					
		        } if (money >= 5001 && money <= 10000) {

					var profitTotal = money / 100 * 3100;
					var profitTotal = profitTotal.toFixed(2);
					

					
					$("#profitTotal").text(profitTotal);
					
				} if (money >= 10001 && money <= 20000) {

					var profitTotal = money / 100 * 4600;
					var profitTotal = profitTotal.toFixed(2);
					

					
					$("#profitTotal").text(profitTotal);	
					
				} if (money >= 20001 && money <= 50000) {

					var profitTotal = money / 100 * 7200;
					var profitTotal = profitTotal.toFixed(2);
					

					
					$("#profitTotal").text(profitTotal);		
					
				//} else if(isNaN(money) == true) {
				} if (money < 600) {
					$("#profitDaily").text("Min: $600");
					$("#profitTotal").text("Min: $600");
				}
		        break;
		    case 6:
			if ( money >= 5000 && money <= 99000){

					var profitTotal = money / 100 * 1900;
					var profitTotal = profitTotal.toFixed(2);

					
					$("#profitTotal").text(profitTotal);

					
				//} else if(isNaN(money) == true) {
				} if (money < 5000) {
					$("#profitDaily").text("Min: $5000");
					$("#profitTotal").text("Min: $5000");
				}
		        break;
		        
		        
		    case 7:
			if(money >= 2500 && money <= 99000)
			{
				var profitTotal = money / 100 * 4300;
				var profitTotal = profitTotal.toFixed(2);
	
				$("#profitTotal").text(profitTotal);

				} if (money < 2500) {
					$("#profitDaily").text("Min: $2500");
					$("#profitTotal").text("Min: $2500");
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
