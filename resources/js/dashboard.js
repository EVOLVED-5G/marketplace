

require('../plugins/dashboard-skeleton-bs-5/sidebar-menu-compostrap/dist/js/sidebar.menu.js');



	$(function() {
		new Nanobar().go(100);
		new PerfectScrollbar('.scrollbar', {
			wheelSpeed: 0.3
		});
	});

