<?php
$styleCol =' style=" border: 1px solid black; padding: 5px;"';


if ($_SERVER['REQUEST_METHOD']== "POST") 
{
<<<<<<< HEAD
	
=======
	$from ="sumsigns@gmail.com";
>>>>>>> fd3e6b90be243263da84943a043f6968d77f5fec
	


	if(isset($_POST['datas']))  
	{
		
		$data = json_decode( $_POST['datas'], true);
		$customerName = $data[0];
		$invoiceNo = $data[1];
		$date = $data[2];
		
		$subtotal = $data[3];
		$total =$data[4];
		$tax =$data[5];
		$amount =$data[6];
		$due =$data[7];
		
		$subject = "Sumsigns Invoice";

		$headerHtml = '
						<h1>INVOICE</h1>
						<div style="float: left">		
							<h2>SumSigns</h2>
							263 Barkly st<br/>
							Footscray, 3011, Melbourne, Victoria<br/>
							<br/>
							Phone: 0426 874 908<br/>
							A.B.N 163 382 778<br/>
						</div>
						
						<div id="logo" style="float: right">
						<img id="image" src="http://invoice.sumsigns.com.au/images/logosum.png" alt="logo" />
						
						</div>
						<div style="clear:both"></div>';
		
		$info = '<div id="customer">

					<div id="customer-title" ><h2>'.$customerName.'</h2></div>
					
					<table id="meta" style=" border-collapse: collapse; border: 1px solid black;">
						<tr>
							<td '.$styleCol.'><strong>Invoice #</strong></td>
							<td'.$styleCol.'>'.$invoiceNo.'</td>
						</tr>
						<tr >
							<td '.$styleCol.'><strong>Date</strong></td>
							<td  '.$styleCol.'>'.$date.'</td>
						</tr>
						<tr >
							<td '.$styleCol.'><strong>Amount Due</strong></td>
							<td'.$styleCol.'><div class="due">'.$due.'</div></td>
						</tr>
					
					</table>
					
				</div>
					<br/>';
		$totalRow = count($data[8]);
		
		$rowTable ='<table id="items"  style=" border-collapse: collapse; border: 1px solid black;" >
		
					<tr>
					<th'.$styleCol.'>Item</th>
					<th'.$styleCol.'>Description</th>
					<th'.$styleCol.'>Unit Cost</th>
					<th'.$styleCol.'>Quantity</th>
					<th'.$styleCol.'>Discount</th>
					<th'.$styleCol.'>Price</th>
					
					</tr>';
	//array here

		
		for( $i = 0 ;$i< $totalRow ; $i++)
		{
			//$rowData = $data[8][$i];
			$name = $data[8][$i]['_item_name'];
			$description = $data[8][$i]['_description'];;
			$cost = $data[8][$i]['_cost'];
			$qty = $data[8][$i]['_qty'];;
			$discount = $data[8][$i]['_discount'];;
			$price = $data[8][$i]['_price'];;
			
		
			$rowTable .= ' <tr>';
						$rowTable .= '<td '.$styleCol.'>'. $name .'</td>';
						$rowTable .= '<td style=" width: 300px; border: 1px solid black; padding: 5px;">'.$description.'</td>';
						$rowTable .= '<td '.$styleCol.'>'.$cost.'</td>';
						$rowTable .= '<td '.$styleCol.'>'.$qty.'</td>';
						$rowTable .= '<td '.$styleCol.'>'.$discount.'</td>';
						$rowTable .= '<td '.$styleCol.'>'.$price.'</td>';
						$rowTable .= '</tr>';
					   
		}
		
		$rowTable .='<tr>
			  <td colspan="2" > </td>
			  <td colspan="3" '.$styleCol.'>Subtotal:</td>
			  <td '.$styleCol.'>'.$subtotal.'</td>
		  </tr>';
		$rowTable .='<tr >
		      <td colspan="2"> </td>
		      <td colspan="3"'.$styleCol.'>Total:</td>
		      <td '.$styleCol.'>'.$total.'</td>
		  </tr>';
		  $rowTable .='<tr><td colspan="2" > </td><td colspan="3" '.$styleCol.'>Tax:</td><td '.$styleCol.'>'.$tax.'</td></tr>';
		  $rowTable .='<tr>
		      <td colspan="2" > </td>
		      <td colspan="3" '.$styleCol.'>Total Amount:</td>
		      <td '.$styleCol.'>'.$due.'</td>
		  </tr>';
		 $rowTable .='<tr>
		      <td colspan="2" > </td>
		      <td colspan="3" style="background-color: #CCC; border: 1px solid black; padding: 5px;">Balance Due:</td>
		      <td style="background-color: #CCC; border: 1px solid black; padding: 5px;">'.$due.'</td>
		  </tr>
		</table>';
		
		$rowTable .=' <br/>
		<div id="account">
		  <h5>Account SumSigns</h5>
            <div>
				Name: Sumsings<br/>
				BSB: 063 132<br/>
				ACC: 1105 2684<br/>
			</div>
		</div>
		';
<<<<<<< HEAD
		$from ="info@sumsigns.com.au";
		$cc = $from. ", haiha262@gmail.com";
=======
		$cc = $from . ", haiha262@gmail.com";
>>>>>>> fd3e6b90be243263da84943a043f6968d77f5fec
		$to = $data[9];//email customer
		$message = $headerHtml . $info . $rowTable;
		//send mail
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		
		// More headers
		$headers .= 'From: <'.$from.'>' . "\r\n";
		//$headers .= 'From: <webmaster@example.com>' . "\r\n";
		$headers .= 'Cc: '.$cc . "\r\n";
		
		mail($to,$subject,$message,$headers);
		return "true";
		
	}
	return "false";
}
?>