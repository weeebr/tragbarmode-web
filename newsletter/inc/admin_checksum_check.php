<?php

function checksum_check($domain, $code, $script)
{
	$code_domain	= substr($code, 0, 8);
	$code			= substr($code, 8);
	
	if(strlen($code) == 16)
	{
		$checksum	= "";
		for($i=0; $i<strlen($code); $i++)
		{
			$checksum += $code[$i];
			
			if($i==4)
				$leftovercheck1 = $checksum;
			if($i==7)
				$leftovercheck2 = $checksum;		
		}
				
		if($checksum == 84 && $leftovercheck1%3 == 0 && $leftovercheck2%7 == 0 && $script==substr($code, 0, 1) && substr(md5($domain), 0, 8) == $code_domain)
			return true;
	}
	return false;
}

?>