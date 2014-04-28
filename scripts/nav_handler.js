$(document).ready(function(e) {
	$('#homenav').click(function (){
		$('body').attr('id','home');
		$('#cOver,#cEncrypt,#cObjas,#cDecrypt,#cContact').hide('fast');
		$('#cHome').show('slow');
		$('title').text('nCode::Скриј ја твојата порака!');
    })
    $('#overnav').click(function (){
		$('body').attr('id','over');
		$('#cHome,#cObjas,#cEncrypt,#cDecrypt,#cContact').hide('fast');
		$('#cOver').show('slow');
		$('title').text('nCode::Криптографија');
    })
	$('#objnav').click(function (){
		$('body').attr('id','obj');
		$('#cHome,#cOver,#cEncrypt,#cDecrypt,#cContact').hide('fast');
		$('#cObjas').show('slow');
		$('title').text('nCode::Објаснување');
    })
    $('#encnav').click(function (){
		$('body').attr('id','encrypt');
		$('#cHome,#cOver,#cObjas,#cDecrypt,#cContact').hide('fast');
		$('#cEncrypt').show('slow');
		$('title').text('nCode::Скриј ја пораката');
		$('#encode').val(0);
    })
    $('#decnav').click(function (){
		$('body').attr('id','decrypt');
		$('#cHome,#cOver,#cObjas,#cEncrypt,#cContact').hide('fast');
		$('#cDecrypt').show('slow');
		$('title').text('nCode::Пробиј ја пораката');
		$('#decode').val(0);
    })
    $('#connav').click(function (){
		$('body').attr('id','contact');
		$('#cHome,#cOver,#cObjas,#cEncrypt,#cDecrypt').hide('fast');
		$('#cContact').show('slow');
		$('title').text('nCode::Контактирај ме!');
    })
});