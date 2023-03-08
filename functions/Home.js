function BtnLoadingTrue(){            
	// $("#btnSearch").attr("disabled", true);
	$('#btnSearch').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...');
}
function BtnLoadingFalse(){            
	// $("#btnSearch").attr("disabled", false);
	$('#btnSearch').html('Serach  ');
}
function Searching(){
 
	var Search = $('#Search').val();
	if(Search == '' || Search == null){
		alert('please type something here');
		$('#Search').focus();
	}else {
		$.ajax({
			url: "api/getCust.php",
			method: "POST",
			data: {
				Search : Search
			},
			dataType: "JSON",
			beforeSend: function(){
				BtnLoadingTrue();
			},
			success: function (data) 
			{ 
				BtnLoadingFalse();
				// $("#custid").val(data.custid);
				$("#custname").val(data.custname);
				$("#custphone").val(data.custphone);
				$("#custvehicle").val(data.custvehicle);
				// $("#VehicleType").val(data.vehicletype);
				// $('#VehicleType').select2().trigger('change'); 
				return data;
			}
		});
	}
}
 

function Submitting(){

	var custvehicle = $('#custvehicle').val();
	var custname = $('#custname').val();
	var custphone = $('#custphone').val();
	var Product = $('#Product').val();
	var Liters = $('#Liters').val(); 

var CouponCode = "Taj-CC-001";
var Coupon = "Yes";

if(custvehicle == null || custvehicle == '')  {
alert("Please Select Customer First");
 $('#Search').focus();
}else  if(Coupon == 'Yes'){


     Swal.fire({
                title: "Congratulations, You got a coupon!",
                type: "success",
                timer: 4000,
                showConfirmButton: true,
            }) .then(function () {
                window.location.href = "invoice.php?CouponCode="+CouponCode;
            });


} 
	// var Search = $('#Search').val();
	// if(Search == '' || Search == null){
	// 	alert('please type something here');
	// 	$('#Search').focus();
	// }else {
	// 	$.ajax({
	// 		url: "api/getCust.php",
	// 		method: "POST",
	// 		data: {
	// 			Search : Search
	// 		},
	// 		dataType: "JSON",
	// 		beforeSend: function(){
	// 			BtnLoadingTrue();
	// 		},
	// 		success: function (data) 
	// 		{ 
	// 			BtnLoadingFalse();
	// 			// $("#custid").val(data.custid);
	// 			$("#custname").val(data.custname);
	// 			$("#custphone").val(data.custphone);
	// 			$("#custvehicle").val(data.custvehicle);
	// 			// $("#VehicleType").val(data.vehicletype);
	// 			// $('#VehicleType').select2().trigger('change'); 
	// 			return data;
	// 		}
	// 	});
// 	}
}