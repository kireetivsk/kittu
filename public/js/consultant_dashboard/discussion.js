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
		if (currentTab == 'write') {
			Inbox.show_form();
		}
		else {
			if (prevTab == 'write')
				Inbox.show_list();

			//load and display the relevant messages
			$('#' + prevTab).first().children().removeClass('active');
			$('#' + currentTab).first().children().addClass('active');
			//hide the message form
			$('#id-message-form').hide();
		}
		prevTab = currentTab;
	})

});