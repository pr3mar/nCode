<?php
	/**
	  * In this file there are functions
	  * used for enciphering/deciphering
	  * using the 4-matrix cipher
	  */
	
	//keywords
	$first_keyword = '';
	$second_keyword = '';
	
	//upper left - lower right
	$master_matrix = array(
		array('a','b','c','d','e'),
		array('f','g','h','i','j'),
		array('k','l','m','n','o'),
		array('p','r','s','t','u'),
		array('v','w','x','y','z')
	);
	
	//upper right matrix
	$lower_matrix = array(
		array('a','b','c','d','e'),
		array('f','g','h','i','j'),
		array('k','l','m','n','o'),
		array('p','r','s','t','u'),
		array('v','w','x','y','z')
	);
	
	//lower left matrix
	$upper_matrix = array(
		array('a','b','c','d','e'),
		array('f','g','h','i','j'),
		array('k','l','m','n','o'),
		array('p','r','s','t','u'),
		array('v','w','x','y','z')
	);
	
/*	
	for($i = 0; $i < 5; $i++)
	{
		for($j = 0; $j < 5; $j++)
		{
			echo $master_matrix[$i][$j].' ';
		}
		echo '<br>';
	}
*/	
	/*===================================================
	 * determine the location of the char in a 5x5 matrix
	 * according to the alphabet
	 * return coordinates in array<br>
	 * $i -> row
	 * $j -> column
	 */
	function alph_char_pos($char)
	{
		// determine char case
		if(ctype_upper($char))
		{
			$remove = '@';
		}
		else
		{
			$remove = '`';
		}
		// find the ordinal number of the char, starting at 0
		$char = ord($char) - ord($remove)-1;
		// ignore the 'Q' ('q') letter 
		if( $char ==  16 )
		{
			return false;
		}
		// shift all after 'Q' left for one
		if( $char > (ord('Q') - ord('@')-1) )
		{
			$char--;
		}
		// find the row
		$i = (integer) ($char / 5);
		// find the column
		$j = $char % 5;
		return array($i,$j);
	}
	//===========================================================
	
	
	/*===========================================================
	 * remove all the duplicated chars in a string
	 * return a 'clean' string
	 */
	function remove_duplicate_chars($key)
	{
		$key = preg_replace('/[^a-zA-Z]/s', '', $key);
		$key = strtolower($key);
		$clean = '';
		$bool = false;
		// check every char of the word
		for($i = 0; $i < strlen($key); $i++)
		{
			// check if it's already added
			for($j = 0; $j < strlen($clean); $j++)
			{
				if($key[$i] === $clean[$j])
				{
					$bool = true;
				}
				if(($key[$i] === 'q' or $key[$i] === 'Q')) $bool = true;
			}
			// if not -> add at the end
			if(false == $bool)
			{
				$clean .= $key[$i];
			}
			// reset for the next iterration
			$bool = false;
		}
		return $clean;
	}
	//===========================================================
	
	/*===========================================================
	 * generiraj ja matricata gore levo
	 * 
	 */
	function fill_upper($key)
	{
		if($key === '')
		{
			return NULL;
		}
		// clean the key
		$key = remove_duplicate_chars($key);
		// pomoshna matrica
		$help = array(
			array('a','b','c','d','e'),
			array('f','g','h','i','j'),
			array('k','l','m','n','o'),
			array('p','r','s','t','u'),
			array('v','w','x','y','z')
		);
		// set the first n(length of the key) chars of the matrix
		for($i = 0; $i < strlen($key); $i++)
		{
			$n = (integer) ($i/5);//rows
			$m = $i % 5;//collumns 
			$GLOBALS['upper_matrix'][$n][$m] = $key[$i];
		}
		//pomosna promenliva za generiranje na pozicii		
		$m++;
		
		// setiraj nuli na iskoristenite karakteri
		for( $i = 0; $i < strlen($key); $i++)
		{
			$pos = array();
			$pos = alph_char_pos($key[$i]);
			$help[$pos[0]][$pos[1]] = 0;
		}
		
		//key to success
		//generiraj ja matricata
		for($i = 0; $i < 5; $i++)
		{
			for($j = 0; $j < 5; $j++)
			{
				//proveri dali e prazno mestoto
				if( $help[$i][$j] !== 0 )
				{
					//proveri dali klucniot zbor ima pojke od 5 bukvi
					if((strlen($key) / 5) > 1)
					{
						$n = (integer) ($m/5) +1;
						$c = $m % 5;
					}
					else
					{
						$n = (integer) ($m/5);
						$c = $m % 5;
					}
					//setiraj ja matricata
					$GLOBALS['upper_matrix'][$n][$c]= $help[$i][$j];
					//pomosna promenliva za generiranje na pozicii
					$m++;
				}
				
			}
		}
	}
	//===========================================================
	
	/*===========================================================
	 * generiraj ja matricata dolu desno
	 * 
	 */
	function fill_lower($key)
	{
		if($key === '')
		{
			return NULL;
		}
		// clean the key
		$key = remove_duplicate_chars($key);
		// pomoshna matrica
		$help = array(
			array('a','b','c','d','e'),
			array('f','g','h','i','j'),
			array('k','l','m','n','o'),
			array('p','r','s','t','u'),
			array('v','w','x','y','z')
		);
		// set the first n(length of the key) chars of the matrix
		for($i = 0; $i < strlen($key); $i++)
		{
			$n = (integer) ($i/5);//rows
			$m = $i % 5;//collumns 
			$GLOBALS['lower_matrix'][$n][$m] = $key[$i];
		}
		//pomosna promenliva za generiranje na pozicii		
		$m++;
		
		// setiraj nuli na iskoristenite karakteri
		for( $i = 0; $i < strlen($key); $i++)
		{
			$pos = array();
			$pos = alph_char_pos($key[$i]);
			$help[$pos[0]][$pos[1]] = 0;
		}
		
		//key to success
		//generiraj ja matricata
		for($i = 0; $i < 5; $i++)
		{
			for($j = 0; $j < 5; $j++)
			{
				//proveri dali e prazno mestoto
				if( $help[$i][$j] !== 0 )
				{
					//proveri dali klucniot zbor ima pojke od 5 bukvi
					if((strlen($key) / 5) > 1)
					{
						$n = (integer) ($m/5) +1;
						$c = $m % 5;
					}
					else
					{
						$n = (integer) ($m/5);
						$c = $m % 5;
					}
					//setiraj ja matricata
					$GLOBALS['lower_matrix'][$n][$c]= $help[$i][$j];
					//pomosna promenliva za generiranje na pozicii
					$m++;
				}
				
			}
		}
	}
	//===========================================================
	
	
	/*===========================================================
	 * find the position of a char in the matrix
	 * returns Integer array
	 */
	function find_pos($char,$matrix)
	{
		$return = array();
		for($i = 0; $i< 5;$i++)
		{
			for($j = 0; $j < 5; $j++)
			{
				if($char === $matrix[$i][$j])
				{
					$return[0] = $i;
					$return[1] = $j;
				}
			}
		}
		return $return;
	}
	//===========================================================
	
	/*===========================================================
	 * enciphers given plain text using the four cipher method
	 * input:
	 * plain_text -> string
	 * key1 -> string
	 * key2 -> string
	 */
	function encipher($plain_text,$key1,$key2)
	{
		$ciphered = '';
		$plain_text = preg_replace('/[^a-zA-Z]/s', '', $plain_text);
		$plain_text = strtolower($plain_text);
		fill_upper($key1);
		fill_lower($key2);
		$no_letters = strlen($plain_text);
		if( ($no_letters % 2) !== 0)
		{
			$plain_text.='x';
			$no_letters += 1;
		}
		$limit = $no_letters-1;
		$i = 0;
		while($i <= $limit)
		{
			$res1 = find_pos($plain_text[$i],$GLOBALS['master_matrix']);
			$res2 = find_pos($plain_text[$i+1],$GLOBALS['master_matrix']);
			$tmp1 = $GLOBALS['upper_matrix'][$res1[0]][$res2[1]];
			$tmp2 = $GLOBALS['lower_matrix'][$res2[0]][$res1[1]];
			$ciphered .= $tmp1;
			$ciphered .= $tmp2;
			$i += 2;
		}
		//echo '<br />'.strtoupper($ciphered).'<br />';
		return $ciphered;
	}
	//===========================================================
	
	
	/*
	 *
	 *
	 */
	function decipher($ciphered_text,$key1,$key2)
	{
		$plain_text = '';
		$ciphered_text = preg_replace('/[^a-zA-Z]/s', '', $ciphered_text);
		$ciphered_text = strtolower($ciphered_text);
		fill_upper($key1);
		fill_lower($key2);
		$no_letters = strlen($ciphered_text);
		if( ($no_letters % 2) !== 0)
		{
			$ciphered_text.='x';
			$no_letters += 1;
		}
		$limit = $no_letters-1;
		$i = 0;
		while($i <= $limit)
		{
			$res1 = find_pos($ciphered_text[$i],$GLOBALS['upper_matrix']);
			$res2 = find_pos($ciphered_text[$i+1],$GLOBALS['lower_matrix']);
			$plain_text .= $GLOBALS['master_matrix'][$res1[0]][$res2[1]];
			$plain_text .= $GLOBALS['master_matrix'][$res2[0]][$res1[1]];
			$i += 2;
		}
		//echo '<br />'.$plain_text.'<br />';
		return $plain_text;
	}
	
	
	//encipher('Tea ete so ova sum opsednat vo posledno vreme - kriptografija i mi e mnogu jako!! Patem se ostanato si e standardno.. si slusam uba muzika i si izlegvam na jaki mesta, patem gledam fringe i sum fasciniran Epaa tolku od igrata na bukvi, dosta ti e za sega','word','puzzle');
//	decipher('ogmv','lemon','marko');
	
	
	/*===========================================================
	 * USEFUL!!
	 * pechatenje na matricite edna do druga vo tabeli
	 *
	 */
/*	echo '<table>';
	for($i = 0; $i < 5; $i++)
	{
		echo '<tr><td>';
		for($j = 0; $j < 5; $j++)
		{
			echo $GLOBALS['master_matrix'][$i][$j].' ';
		}
		echo '</td><td style="padding-left:20px;">';
		for($j = 0; $j < 5; $j++)
		{
			echo $GLOBALS['upper_matrix'][$i][$j].' ';
		}
		echo '</td></tr>';
	}
	
	echo '</table><br /><table>';

	for($i = 0; $i < 5; $i++)
	{
		echo '<tr><td>';  
		for($j = 0; $j < 5; $j++)
		{
			echo $GLOBALS['lower_matrix'][$i][$j].' ';
		}
		echo'</td><td style="padding-left:20px;">';
		for($j = 0; $j < 5; $j++)
		{
			echo $GLOBALS['master_matrix'][$i][$j].' ';
		}
		echo '</td></tr>';
	}
	echo '</table>';
*/
	//===========================================================
?>