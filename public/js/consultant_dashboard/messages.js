window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>" + "<" + "/script>");

if ("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");

jQuery(function ($)
{

	//handling tabs and loading/displaying relevant messages and forms
	//not needed if using the alternative view, as described in docs
	var prevTab = 'inbox'
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

	$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
	function tooltip_placement(context, source)
	{
		var $source = $(source);
		var $parent = $source.closest('table')
		var off1 = $parent.offset();
		var w1 = $parent.width();

		var off2 = $source.offset();
		var w2 = $source.width();

		if (parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2)) return 'right';
		return 'left';
	}

});