function displayValsCode()
{
	var selected = $('#encode').val();
	if( selected == 1)
	{
		$('#en_fmatrix').hide('fast');
		$('#en_caesar').show('slow');
	} 
	else if( selected == 2)
	{
		$('#en_caesar').hide('fast');
		$('#en_fmatrix').show('slow');
	}
	else
	{
		$('#en_fmatrix').hide('fast');
		$('#en_caesar').hide('fast');
	}
}
function displayValsDecode()
{
	var selected = $('#decode').val();
	if( selected == 1)
	{
		$('#de_fmatrix').hide('fast');
		$('#de_caesar').show('slow');
	} 
	else if( selected == 2)
	{
		$('#de_caesar').hide('fast');
		$('#de_fmatrix').show('slow');
	}
	else
	{
		$('#de_fmatrix').hide('fast');
		$('#de_caesar').hide('fast');
	}
}
$('#encode').change(displayValsCode);
$('#decode').change(displayValsDecode);