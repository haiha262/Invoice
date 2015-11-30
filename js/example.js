var xHRObject = false;

if (window.XMLHttpRequest)
	xHRObject = new XMLHttpRequest();
else if (window.ActiveXObject)
	xHRObject = new ActiveXObject("Microsoft.XMLHTTP");

function print_today() {
  // ***********************************************
  // AUTHOR: WWW.CGISCRIPT.NET, LLC
  // URL: http://www.cgiscript.net
  // Use the script, just leave this message intact.
  // Download your FREE CGI/Perl Scripts today!
  // ( http://www.cgiscript.net/scripts.htm )
  // ***********************************************
  var now = new Date();
  var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
  var date = ((now.getDate()<10) ? "0" : "")+ now.getDate();
  function fourdigits(number) {
    return (number < 1000) ? number + 1900 : number;
  }
  var today =  months[now.getMonth()] + " " + date + ", " + (fourdigits(now.getYear()));
  return today;
}

// from http://www.mediacollege.com/internet/javascript/number/round.html
function roundNumber(number,decimals) {
  var newString;// The new rounded number
  decimals = Number(decimals);
  if (decimals < 1) {
    newString = (Math.round(number)).toString();
  } else {
    var numString = number.toString();
    if (numString.lastIndexOf(".") == -1) {// If there is no decimal point
      numString += ".";// give it one at the end
    }
    var cutoff = numString.lastIndexOf(".") + decimals;// The point at which to truncate the number
    var d1 = Number(numString.substring(cutoff,cutoff+1));// The value of the last decimal place that we'll end up with
    var d2 = Number(numString.substring(cutoff+1,cutoff+2));// The next decimal, after the last one we want
    if (d2 >= 5) {// Do we need to round up at all? If not, the string will just be truncated
      if (d1 == 9 && cutoff > 0) {// If the last digit is 9, find a new cutoff point
        while (cutoff > 0 && (d1 == 9 || isNaN(d1))) {
          if (d1 != ".") {
            cutoff -= 1;
            d1 = Number(numString.substring(cutoff,cutoff+1));
          } else {
            cutoff -= 1;
          }
        }
      }
      d1 += 1;
    } 
    if (d1 == 10) {
      numString = numString.substring(0, numString.lastIndexOf("."));
      var roundedNum = Number(numString) + 1;
      newString = roundedNum.toString() + '.';
    } else {
      newString = numString.substring(0,cutoff) + d1.toString();
    }
  }
  if (newString.lastIndexOf(".") == -1) {// Do this again, to the new string
    newString += ".";
  }
  var decs = (newString.substring(newString.lastIndexOf(".")+1)).length;
  for(var i=0;i<decimals-decs;i++) newString += "0";
  //var newNumber = Number(newString);// make it a number if you like
  return newString; // Output the result to the form field (change for your purposes)
}

  function update_total() {
	var total = 0;
	$('.price').each(function(i){
	  price = $(this).html().replace("$","");
	  if (!isNaN(price)) total += Number(price);
	});
  
	total = roundNumber(total,2);
  
	$('#subtotal').html("$"+total);
	$('#total').html("$"+total);
	update_tax();
	update_balance();
  }

function update_tax()
{
	var total = $('#total').text().replace("$","");
	var taxType = $('#taxType').val();
	var taxPercent;
	console.log ("taxType" + taxType);
	if(taxType == "GST")
		taxPercent = 10;
	else
		taxPercent = 0;
	$('#paidTax').text("$"+total*taxPercent/100);
}
  function update_balance() {
	var due = parseFloat($("#total").html().replace("$","")) + parseFloat($("#paidTax").text().replace("$",""));
	due = roundNumber(due,2);
	
	$('.amount').html("$"+due);
	$('.due').html("$"+due);
  }

  function update_price() {
	var row = $(this).parents('.item-row');
	var cost = row.find('.cost').val().replace("$","");
	var qty = row.find('.qty').val();
	var discount =row.find('.discount').val().replace("%","");
	var price =  (cost*qty) - percentage((cost*qty),discount) ;
	price = roundNumber(price,2);
	isNaN(price) ? row.find('.price').html("N/A") : row.find('.price').html("$"+price);
  
  update_total();
}
function percentage(number, percent)
{
	return (number * percent) / 100;
}
function bind() {
  $(".cost").blur(update_price);
  $(".qty").blur(update_price);
  $(".discount").blur(update_price);
  update_tax()
  
}
function validateEmail(email) {
	var regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
	return regex.test(email);
}
$(document).ready(function() {

  $('input').click(function(){
    $(this).select();
  });

  
   
  $("#addrow").click(function(){
	var row = '<tr class="item-row">';
        row += '<td class="item-name"><div class="delete-wpr"><textarea>Item Name</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>';
		row += '<td class="description"><textarea>description</textarea></td>';
		row += '<td><textarea class="cost">$100.00</textarea></td>';
		row += '<td><textarea class="qty">1</textarea></td>';
		row += '<td><textarea class="discount">0%</textarea></td>';
		row += '<td><span class="price">$100.00</span></td>';
		//row += '<td><textarea class="tax">GST 10%</textarea></td>';
		row += '</tr>';
    $(".item-row:last").after(row);
    if ($(".delete").length > 0) $(".delete").show();
    bind();
  });
  
  bind();
  
  $("#taxType").click(function(){
	  update_tax()
  });
  $(".delete").live('click',function(){
    $(this).parents('.item-row').remove();
    update_total();
    if ($(".delete").length < 2) $(".delete").hide();
  });
  
  $("#cancel-logo").click(function(){
    $("#logo").removeClass('edit');
  });
  $("#delete-logo").click(function(){
    $("#logo").remove();
  });
  $("#change-logo").click(function(){
    $("#logo").addClass('edit');
    $("#imageloc").val($("#image").attr('src'));
    $("#image").select();
  });
  $("#save-logo").click(function(){
    $("#image").attr('src',$("#imageloc").val());
    $("#logo").removeClass('edit');
  });
  
  $("#date").val(print_today());
  $("#sendmail").click(function(e) 
  {
	 	var email=$("#customer_email").val();
		if(email.length==0 || !validateEmail(email)) 
		{
			alert("Please check customer email.");
			return;	
		}
		
		var data = [];
		var aRow = {}; // my object
		var arrayList =  []; // my array
		
		data.push($('#customer-title').val());
		data.push($('#invoiceNo').val());
		data.push($('#date').val());
		
		data.push($('#subtotal').text());
		data.push($('#total').text());
		data.push($('#paidTax').text());
		data.push($('.amount').text());
		data.push($('.due:last').text());
	
		$(".item-row").each(function(i){
			var name= $(this).find('.item-name textarea').val();
			var description= $(this).find('.description textarea').val();
			var cost= $(this).find('.cost').val();
			var qty= $(this).find('.qty').val();
			var discount= $(this).find('.discount').val();
			var price= $(this).find('.price').text();
			
			//		 var qty= document.getElementsByClassName('qty')[i].value;
			aRow = {
			_item_name : name,
			_description : description,
			_cost: cost,
			_qty: qty,
			_discount:discount,
			_price: price
			};
			arrayList.push(aRow);
		//alert(name + " " + description);
		});//end each 
	
		data.push(arrayList);
		//debug
		for (var i =0; i<arrayList.length ; i++)
		{
			aRow = arrayList[i];		
			console.log('row :' + aRow['_item_name'] + " "+ aRow['_description'] + " "+ aRow['_cost'] + " "+ aRow['_qty'] + " "+ aRow['_price'] + " ");
		}
		data.push($("#customer_email").val());
		// send ajax
		$.ajax({
			url: 'sendMail.php',
			data: {datas: JSON.stringify(data)},
			type: 'POST',
			dataType: 'JSON',
			success: function(result) {
				alert("Has been sent.");
				
			},
			error: function() {
            	alert('Server busy');
        	}
		});		
	});//end send mail click
});//end document ready
