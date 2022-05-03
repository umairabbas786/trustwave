//Save Data

$.ajax({
      url: '/?a=account',
      dataType: 'html',
      success: function(data){    
	  
	  
     
	  var pay18 =  $(data).find('#pay18').text(); 
      var pay43 =  $(data).find('#pay43').text(); 
      var pay48 =  $(data).find('#pay48').text(); 	  
	  var pay68 =  $(data).find('#pay68').text(); 
      var pay79 =  $(data).find('#pay79').text(); 
      var pay69 =  $(data).find('#pay69').text(); 	
      var pay77 =  $(data).find('#pay77').text();	  
	 
      var pay18set = localStorage.setItem("pay18data", pay18);
	  var pay43set = localStorage.setItem("pay43data", pay43);
	  var pay48set = localStorage.setItem("pay48data", pay48);
	  var pay68set = localStorage.setItem("pay68data", pay68);
	  var pay79set = localStorage.setItem("pay79data", pay79);
	  var pay69set = localStorage.setItem("pay69data", pay69);
	  var pay77set = localStorage.setItem("pay77data", pay77);
	
    
  
	  }
    });


//Load Data


var pay18get = localStorage.getItem("pay18data");
$('#pay18b').html(pay18get);

var pay43get = localStorage.getItem("pay43data");
$('#pay43b').html(pay43get);

var pay48get = localStorage.getItem("pay48data");
$('#pay48b').html(pay48get);

var pay68get = localStorage.getItem("pay68data");
$('#pay68b').html(pay68get);

var pay79get = localStorage.getItem("pay79data");
$('#pay79b').html(pay79get);

var pay69get = localStorage.getItem("pay69data");
$('#pay69b').html(pay69get);

var pay77get = localStorage.getItem("pay77data");
$('#pay77b').html(pay77get);
