<?php
	//get contain of current web
	//

$customerEmail="haiha262@gmail.com";
$to =$customerEmail;
$subject = "Invoice";
$styleCol =' style=" border: 1px solid black; padding: 5px;"';
$headerHtml = '


		<h1>INVOICE</h1>
		<div style="float: left">		
          <h3>SumSigns</h3>
263 Barkly st<br/>
Footscray, 3011, Melbourne, Victoria<br/>
<br/>
Phone: 0426 874 908<br/>
A.B.N 163 382 778<br/>
</div>
			
			<div id="logo" style="float: right">
            <img id="image" src="images/logosum.png" alt="logo" />
            
			</div>
			<div style="clear:both"></div>';

$customerName="Widget Corp.
c/o Steve Widget";
$subtotal = "$1000";
$total ="$1000";
$tax ="100";
$amount ="1100";
$due ="1100";

$invoiceNo = "000123";
$date = "December 15, 2009";
$customerRow = '<div id="customer">

            <div id="customer-title" ><h3>'.$customerName.'</h3></div>

            <table id="meta" style=" border-collapse: collapse;">
                <tr style=" border: 1px solid black; padding: 5px;">
                    <td class="meta-head">Invoice #</td>
                    <td>'.$invoiceNo.'</td>
                </tr>
                <tr style=" border: 1px solid black; padding: 5px;">

                    <td class="meta-head">Date</td>
                    <td  id="date">'.$date.'</td>
                </tr>
                <tr style=" border: 1px solid black; padding: 5px;">
                    <td class="meta-head">Amount Due</td>
                    <td><div class="due">'.$due.'</div></td>
                </tr>

            </table>
		
		</div>
		<br/>';

$row ='<table id="items"  style=" border-collapse: collapse;" >
		
		  <tr  style=" border: 1px solid black; padding: 5px;">
		      <th>Item</th>
		      <th>Description</th>
		      <th>Unit Cost</th>
		      <th>Quantity</th>
		      <th>Discount</th>
			   <th>Price</th>
			    <th>Tax</th>
		  </tr>';
	//array here


//for( $i = 0 ;$i< 1 ; $i++)
{
	$name = "Item name";
	$description = "Desc";
	$cost = "$1000";
	$qty = "1";
	$discount = "0";
	$price = '$0';
	$tax = "GST 10%";

	$row .= ' <tr class="item-row"  style=" border: 1px solid black; padding: 5px;">';
				$row .= '<td class="item-name">'. $name .'</td>';
				$row .= ' <td class="description" style=" width: 300px; ">'.$description.'</td>';
				$row .= '<td class="cost">'.$cost.'</td>';
				$row .= '<td class="qty">'.$qty.'</td>';
				$row .= '<td class="discount">'.$discount.'</td>';
				$row .= '<td><span class="price">'.$price.'</span></td>';
				$row .= '<td class="tax">'.$tax.'</td></tr>';
			   
}



$footerHtml =' 
<tr>
		      <td colspan="3" class="blank" > </td>
		      <td colspan="3" class="total-line"'.$styleCol.'>Subtotal:</td>
		      <td class="total-value"'.$styleCol.'><div id="subtotal">'.$subtotal.'</div></td>
		  </tr>
		  <tr >

		      <td colspan="3" class="blank"> </td>
		      <td colspan="3" class="total-line"'.$styleCol.'>Total:</td>
		      <td class="total-value"'.$styleCol.'><div id="total">'.$total.'</div></td>
		  </tr>
		  <tr>
		      <td colspan="3" class="blank"> </td>
		      <td colspan="3" class="total-line"'.$styleCol.'>Tax:</td>

		      <td class="total-value" id="paidTax"'.$styleCol.'>'.$tax.'</td>
		  </tr>
		  <tr>
		      <td colspan="3" class="blank"> </td>
		      <td colspan="3" class="total-line totalAmount"'.$styleCol.'>Total Amount:</td>
		      <td class="total-value balance"'.$styleCol.'><div class="amount">'.$due.'</div></td>
		  </tr>
		 <tr>
		      <td colspan="3" class="blank"> </td>
		      <td colspan="3" class="total-line balance"'.$styleCol.'>Balance Due:</td>
		      <td class="total-value balance"'.$styleCol.'><div class="due">'.$due.'</div></td>
		  </tr>
		</table>
		
		<br/>
		<div id="account">
		  <h5>Account SumSigns</h5>
            <div>
				Name: Sumsings<br/>
				BSB: 063 132<br/>
				ACC: 1105 2684<br/>
			</div>
		</div>
		';
		
		

$message=$headerHtml .$customerRow. $row . $footerHtml;
echo $message;
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <sumsigns@gmail.com>' . "\r\n";
//$headers .= 'From: <webmaster@example.com>' . "\r\n";
$headers .= 'Cc: haiha262@gmail.com' . "\r\n";

//mail($to,$subject,$message,$headers);



?>