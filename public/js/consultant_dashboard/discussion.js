window.jQuery;

if ("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");

jQuery(function ($)
{

	//handling tabs and loading/displaying relevant messages and forms
	//not needed if using the alternative view, as described in docs
	var prevTab = 'view';
	$('#inbox-tabs a[data-toggle="tab"]').on('show.bs.tab', function (e)
	{
		var currentTab = $(e.target).data('target');
		$('#' + prevTab).first().children().removeClass('active');
		$('#' + currentTab).first().children().addClass('active');
		prevTab = currentTab;
	})

});