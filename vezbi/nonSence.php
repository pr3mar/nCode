<?php
for($i; $i < $count; $i++)
		{
			$n = (integer) ($i/5);//rows
			$m = $i % 5;//collumns
			for($k = 0; $k < $count; $k++)
			{
				for($j = 0; $j < strlen($key);$j++)
				{
					$char = chr($k+ord('A'));
					$char2 = chr($k+ord('a'));
					echo $char2.' ';
					if(!($key[$j] === $char2 ))
					{
						$GLOBALS['upper_matrix'][$n][$m] = $char;
					}
				}
			}
			/*
			 * KAKO DA SE PROVERI?
			 */
			//$GLOBALS['upper_matrix'][$n][$m];
		}
		//so shiftiranje
		for($i = 4; $i >= 0; $i--)
		{
			for($j = 4; $j >= 0; $j--)
			{
				if( $GLOBALS['upper_matrix'][$i][$j] === 0)
				{
					$pomesti++;
					echo 'yes';
				}
				else
				{
					if($pomesti === 0)
					{
						continue;
					}
					else
					{
						$pos = 5*$i + $j + $pomesti;
						$n = (integer) ($pos/5);//rows
						$m = $pos % 5;//collumns 
						$GLOBALS['upper_matrix'][$i][$j];
					}
				}
			}
		}
        ?>