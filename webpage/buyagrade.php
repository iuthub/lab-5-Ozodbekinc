<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Buy Your Way to a Better Education!</title>
		<link href="buyagrade.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<!-- GET METHOD -->
	<?php
		if($_SERVER["REQUEST_METHOD"]=="GET") { ?>
	
		<h1>Buy Your Way to a Better Education!</h1>

		<p>
			The rough economy, along with recent changes in University of Washington policy, now allow us to offer grades for money.  That's right!  All you need to get a 4.0 in this course is cold, hard, cash.
		</p>
		
		<hr />
		
		<h2>Give Us Your Money</h2>

		<form method="post">
			
		<dl>
			<dt>Name</dt>
			<dd>
				<input type="text" name="name">
			</dd>
			
			<dt>Section</dt>
			<dd>
				<select name="section">
					<optgroup label="(Select a selection)">
						<?php
							for($x=65; $x<73;$x++){ ?>
								<option value="<?= "M".chr($x) ?>"><?= "M".chr($x) ?></option>
						<?php } ?>
					</optgroup>
				</select>

			</dd>
			
			<dt>Credit Card</dt>
			<dd>
				<input type="text" name="CardNumber"/>
			</dd>
			<fieldset> 
				   <input type="radio" name="cardType" value="Visa"  checked="checked" /> Visa  
				   <input type="radio" name="cardType" value="Mastercard" />  MasterCard  
			</fieldset>
			</dd>
		</dl>

			<input type="submit" value="I am a giant sucker.">
	</form>

	<?php
		}else{ 
		if(($_REQUEST["name"] == "") || ($_REQUEST["section"] == "")||
			($_REQUEST["cardType"] == "")||($_REQUEST["CardNumber"] == "")){ ?>
				<h1>Sorry</h1>
		<p>You didn't fill out the form completely. <a href="buyagrade.php"> Try again?</a></p>

		<?php 
			}else{
			$name = $_REQUEST["name"]; 
			$section = $_REQUEST["section"];
			$typeCard = $_REQUEST["cardType"];
			$numberCard = $_REQUEST["CardNumber"];

			$newtext = $name.";".$section.";".$numberCard.";".$typeCard;
			file_put_contents("suckers.txt", "\r\n".$newtext,FILE_APPEND);
			?>

			<div>
				<h1>Thanks, sucker!</h1>
			</div>
		<p>Your information has been recorded</p>

		<dl>
			<dt>Name</dt>
			<dd><?= $name ?></dd>
			
			<dt>Section</dt>
			<dd><?= $section ?></dd>
			
			<dt>Credit Card</dt>
			<dd><?= $numberCard."(".$typeCard.")" ?></dd>
		</dl>

		<p>Here all the suckers who have submitted here:</p>
		<pre><?= file_get_contents("suckers.txt") ?></pre>

		<?php }
		} ?>
	</body>
</html>