//getting id from url
var getUrlParameter = function getUrlParameter(sParam) {
  var sPageURL = window.location.search.substring(1),
  sURLVariables = sPageURL.split('&'),
  sParameterName,
  i;
  for (i = 0; i < sURLVariables.length; i++) {
    sParameterName = sURLVariables[i].split('=');
    if (sParameterName[0] === sParam) {
      return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
    }
  }
};



function settingvalues(){
  var CouponCode = getUrlParameter('CouponCode');
 


  $.ajax( {
    url: "api/invoicedetails.php",
    method: "POST",
    data: {CouponCode:CouponCode},
    dataType: "JSON",
    success: function (data) 
    {
     var custname = data.custname; 
     var custvehicle = data.custvehicle; 
     var custphone = data.custphone; 
     var custid = data.custid; 
     var rewardid = data.rewardid; 
      var couponcode = data.couponcode; 
     var cashreward = data.cashreward; 
     var status = data.status; 
     var doc = data.doc; 
    var staff = data.staff; 


 
     $("#user").html(staff);
     $("#vehicleno").html(custvehicle);
     $("#contactno").html(custphone);
     $("#customername").html(custname); 
     $("#customercode").html(couponcode);
     $("#doc").html(doc); 

      $("#user1").html(staff);
     $("#vehicleno1").html(custvehicle);
     $("#contactno1").html(custphone);
     $("#customername1").html(custname); 
     $("#customercode1").html(couponcode);
     $("#doc1").html(doc); 

 
    
window.print();




    return data;
  }
});

}


$(document).ready(function()
{

  settingvalues();

});

