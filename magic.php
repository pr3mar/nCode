<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		if(isset($_POST['method'],$_POST['word']))
		{
			$result = '';
			$error = '';
			require_once('caesar.php');
			require_once('four_matrix.php');
			if(isset($_POST['method'],$_POST['word']))
			{
				$method = $_POST['method'];
				$word = $_POST['word'];
				if(isset($_POST['rotate']))
				{
					$rotate = $_POST['rotate'];
				}
				if(isset($_POST['keyword1'],$_POST['keyword2']))
				{
					$keyword1 = $_POST['keyword1'];
					$keyword2 = $_POST['keyword2'];
				}
			}
			else
			{
				exit;
			}
			switch($method)
			{
				case 1://encode caesar
					if(isset($rotate))
					{
						$result = caesar_cipher($word,$rotate);
					}
					else
					{
						$error = 'no rotation';
					}
					break;
				case 2://encode four_matrix
					if( isset($keyword1,$keyword2))
					{
						$result = encipher($word,$keyword1,$keyword2);
					}
					else
					{
						$error = 'no keywords';
					}
					break;
				case 3://decode caesar
					if(isset($rotate))
					{
						$result = caesar_decipher($word,$rotate);
					}
					else
					{
						$error = 'no rotation';
					}
					break;
				case 4://decode four_matrix
					if( isset($keyword1,$keyword2))
					{
						$result = decipher($word,$keyword1,$keyword2);
					}
					else
					{
						$error = 'no keywords';
					}
					break;
				default:
					exit;
			}
			echo $result;
		}
	}
	else
	{
		echo 'no permissions :D';
		// do nothing
	}
?>