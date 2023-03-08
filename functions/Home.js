function BtnLoadingTrue(){            
	// $("#btnSearch").attr("disabled", true);
	$('#btnSearch').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...');
}
function BtnLoadingFalse(){            
	// $("#btnSearch").attr("disabled", false);
	$('#btnSearch').html('Serach  ');
}

function reset(){
	$('#Search').val('');

	  $('#custvehicle').val('');
 $('#custid').val('');
	 $('#custname').val('');
	 $('#custphone').val('');
 $('#Product').val('null');
 $('#Liters').val(''); 
	 $('#custid').val(''); 

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
				$("#custid").val(data.custid);
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
	var custid = $('#custid').val();
	var custname = $('#custname').val();
	var custphone = $('#custphone').val();
	var Product = $('#Product').val();
	var Liters = $('#Liters').val(); 
	var custid = $('#custid').val(); 





// var CouponCode = "Taj-CC-001";
// var Coupon = "Yes";

// if(custvehicle == null || custvehicle == '')  {
// alert("Please Select Customer First");
//  $('#Search').focus();
// }else  if(Coupon == 'Yes'){


//      Swal.fire({
//                 title: "Congratulations, You got a coupon!",
//                 type: "success",
//                 timer: 4000,
//                 showConfirmButton: true,
//             }) .then(function () {
//                 window.location.href = "invoice.php?CouponCode="+CouponCode;
//             });


// } 

 
		$.ajax({
			url: "api/submit-Home.php",
			method: "POST",
			data: {
				custvehicle : custvehicle,
				Liters:Liters,
				custvehicle:custvehicle,
				custname:custname,
				custphone:custphone,
				Product:Product,
				custid:custid
			},
			dataType: "JSON",
			beforeSend: function(){
				BtnLoadingTrue();
			},
			success: function (data) 
			{ 
				BtnLoadingFalse(); 
			 var CouponCode =data.couponCode; 
			 var Couponcheck =data.Couponcheck; 
			 var litersleft =data.litersleft; 


			  if(Couponcheck == 'Yes'){


     Swal.fire({
                title: "Congratulations, You got a coupon!",
                type: "success",
                timer: 4000,
                showConfirmButton: true,
            }) .then(function () {
                window.location.href = "invoice.php?CouponCode="+CouponCode;
            });


}  
else  if(Couponcheck == 'No'){

reset();

     Swal.fire({
                title: litersleft+ " Liters Left for Coupon!",
                type: "success",
                timer: 4000,
                showConfirmButton: true,
            }) 


}  




				return data;
			}
		});
 

}