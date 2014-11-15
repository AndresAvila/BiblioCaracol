function addSearchParam() {
	var r = $($('#searchParams .row')[0]).clone();
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