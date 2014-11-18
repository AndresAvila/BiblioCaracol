function addSearchParam() {
	var r = $($('#searchParams .row')[0]).clone();
		var s=r.find('select')[0];
		var i=r.find('input')[0];
		var n = parseInt($('#entradas').val());
		n = n + 1;
		$('#entradas').val(n);
		s.setAttribute('name', "tipo" + n );
		i.setAttribute('name', "texto" + n );
	var e = $($('#searchParams .row')[1]).clone();
	r.find('.searchParamText').val("");
	$('#searchParams').append(r);
	$('#searchParams').append(e);
	$('.addParam').off('click');
	$('.addParam').click(addSearchParam);
}

$(function() {
	$('.addParam').click(addSearchParam);
});
