$(document).ready(function(e) {
	//ajax function for encoding using caesar's method
	$('#en_caes_plain').keyup(function(){
		var x = $(this).val();
		var rot = $('#en_rotate').val();
		$.post('magic.php',{
			method:1,
			word:x,
			rotate:rot
		},function (data){
			$('#en_caes_ciph').empty().append(data);
		});
	});
	//ajax function for encoding using four matrix method
	$('#en_fmat_plain').keyup(function(){
		
		var x = $(this).val(),
		enkeyword1 = $('#en_keyword1').val(),
		enkeyword2 = $('#en_keyword2').val();
		
		if ( (x != '') && (enkeyword1!= '') && (enkeyword2 != '') )
		{
			$.post('magic.php',{
				method:2,
				word:x,
				keyword1:enkeyword1,
				keyword2:enkeyword2
			},function (data){
				$('#en_fmat_ciph').empty().append(data);
			});
		}
	});
	//ajax function for decoding using caesar's method
	$('#de_caes_ciph').keyup(function(){
		var x = $(this).val();
		var rot = $('#de_rotate').val();
		$.post('magic.php',{
			method:3,
			word:x,
			rotate:rot
		},function (data){
			$('#de_caes_plain').empty().append(data);
		});
	});
	//ajax function for decoding using four matrix method
	$('#de_fmat_ciph').keyup(function(){
		
		var x = $(this).val(),
		enkeyword1 = $('#de_keyword1').val(),
		enkeyword2 = $('#de_keyword2').val();
		
		if ( (x != '') && (enkeyword1!= '') && (enkeyword2 != '') )
		{
			$.post('magic.php',{
				method:4,
				word:x,
				keyword1:enkeyword1,
				keyword2:enkeyword2
			},function (data){
				$('#de_fmat_plain').empty().append(data);
			});
		}
	});
});