<?php
function caesar_cipher($poraka,$pomestuvanje)
{
	$sifra = '';
	$length = strlen($poraka);
	// шифрирај го секој карактер од пораката
	for($i = 0; $i < $length; $i++)
	{
		//најди ја позицијата на буквата во абецедата
		$check = ord($poraka[$i]) - ord('a')-1;
		// пресметај ја новата поцизија
		$shifted = ($check + $pomestuvanje) % 26;//key
		// додај го карактерот на шифрираната порака
		$sifra .= chr($shifted + ord('a')-1);
	}
	return $sifra;
}
?>