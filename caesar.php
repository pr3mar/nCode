<?php
	/**
	  * In this file there are functions
	  * used for enciphering/deciphering
	  * using the caesar cipher
	  *
	  */

	/* ===================================================
	 * encipcher text using caesar cipher
	 * with n rotation 
	 */
	function caesar_cipher($word,$rotate)
	{
		$word = preg_replace('/[^a-zA-Z]/s', '', $word);//remove special chars
		$cipher = '';
		$length = strlen($word);
		$rotate = intval($rotate);
		// check every char of the string
		for($i = 0; $i < $length; $i++)
		{
			// check case of char
			if(ctype_upper($word[$i]))
			{
				$chr = '@';
			}
			else
			{
				$chr = '`';
			}
			// get plain char position
			$check = ord($word[$i]) - ord($chr);
			// calculate shifted char position
			$shifted = ($check + $rotate) % 26;//key
			// determine char
			if(($shifted > 0) && ($shifted <= 26))
			{
				$cipher .= chr($shifted + ord($chr));
			}
			else
			{
				// handle negative value of rotation
				if($shifted <= 0)
				{
					$cipher .= chr(26 + $shifted + ord($chr));
				}
				else
				{
					$cipher .= chr($shifted + ord($chr));
				}
			}
		}
		return $cipher;
	}
	// ===================================================
	
	/* ===================================================
	 * decipcher text using caesar cipher
	 * with n rotation
	 */
	function caesar_decipher($word,$rotate)
	{
		$word = preg_replace('/[^a-zA-Z]/s', '', $word);//remove special chars
		$cipher = '';
		$length = strlen($word);
		$rotate = intval($rotate);
		// check every char of the string
		for($i = 0; $i < $length; $i++)
		{
			// check case of char
			if(ctype_upper($word[$i]))
			{
				$chr = '@';
			}
			else
			{
				$chr = '`';
			}
			// get plain char position
			$check = ord($word[$i]) - ord($chr);
			// calculate shifted char position
			$shifted = ($check - $rotate) % 26;//key
			// determine char
			if(($shifted > 0) && ($shifted <= 26))
			{
				$cipher .= chr($shifted + ord($chr));
			}
			else
			{
				// handle negative value of rotation
				if($shifted <= 0)
				{
					$cipher .= chr(26 + $shifted + ord($chr));
				}
				else
				{
					$cipher .= chr($shifted + ord($chr));
				}
			}
		}
		return $cipher;
	}
	// ===================================================
	
	//echo strtoupper(caesar_cipher('Mozis da go jadis cokoladoto sega!',3));
?>