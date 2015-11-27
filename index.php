<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Editable Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>

</head>

<body>

	<div id="page-wrap">

		<textarea id="header">INVOICE</textarea>
		
		<div id="identity">
		
            <textarea id="address">SumSigns
263 Barkly st
Footscray, 3011, Melbourne, Victoria

Phone: 0426 874 908
A.B.N 163 382 778

			</textarea>

            <div id="logo">

              <div id="logoctr">
                <a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
                <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
                |
                <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
                <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
              </div>

              <div id="logohelp">
                <input id="imageloc" type="text" size="50" value="" /><br />
                (max width: 540px, max height: 100px)
              </div>
              <img id="image" src="images/logosum.png" alt="logo" />
            </div>
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

            <textarea id="customer-title">Widget Corp.
c/o Steve Widget</textarea>

            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><textarea id="invoiceNo">000123</textarea></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td><textarea id="date">December 15, 2009</textarea></td>
                </tr>
                <tr>
                    <td class="meta-head">Amount Due</td>
                    <td><div class="due">$1000.00</div></td>
                </tr>

            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Item</th>
		      <th>Description</th>
		      <th>Unit Cost</th>
		      <th>Quantity</th>
		      <th>Discount</th>
			   <th>Price</th>
			    <th>Tax</th>
		  </tr>
		  
		  <tr class="item-row">
                <td class="item-name"><div class="delete-wpr"><textarea>Item Name</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
		      <td class="description"><textarea>description</textarea></td>
		      <td><textarea class="cost">$1000.00</textarea></td>
		      <td><textarea class="qty">1</textarea></td>
			  <td><textarea class="discount">0%</textarea></td>
		      <td><span class="price">$1000.00</span></td>
			  <td><textarea class="tax">GST 10%</textarea></td>
		  </tr>
		  
		  		  
		  <tr id="hiderow">
		    <td colspan="7"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
		  </tr>
		  
		  <tr>
		      <td colspan="3" class="blank"> </td>
		      <td colspan="3" class="total-line">Subtotal:</td>
		      <td class="total-value"><div id="subtotal">$1000.00</div></td>
		  </tr>
		  <tr>

		      <td colspan="3" class="blank"> </td>
		      <td colspan="3" class="total-line">Total:</td>
		      <td class="total-value"><div id="total">$1000.00</div></td>
		  </tr>
		  <tr>
		      <td colspan="3" class="blank"> </td>
		      <td colspan="3" class="total-line">Tax:</td>

		      <td class="total-value"><textarea id="paidTax">$100.00</textarea></td>
		  </tr>
		  <tr>
		      <td colspan="3" class="blank"> </td>
		      <td colspan="3" class="total-line totalAmount">Total Amount:</td>
		      <td class="total-value balance"><div class="amount">$1100.00</div></td>
		  </tr>
		 <tr>
		      <td colspan="3" class="blank"> </td>
		      <td colspan="3" class="total-line balance">Balance Due:</td>
		      <td class="total-value balance"><div class="due">$1100.00</div></td>
		  </tr>
		</table>
		
		<br/>
		<div id="account">
		  <h5>Account SumSigns</h5>

            <textarea id="account">
Name: Sumsings
BSB: 063 132
ACC: 1105 2684
			</textarea>
		</div>
	<br/>
		<div id="functions">
		    <input type="button" name="send" id="sendmail" value="Send Email"  />
		  </div>
	</div>
	
</body>

</html>