$(function () {
	$(document).pjax("a[data-pjax]", "#main_container"), $(document).on("pjax:send", function () {
		topbar.show()
	}).on("pjax:complete", function () {
		topbar.hide()
	});
	var sideBar = $("#site_nav_left_wrap");
	sideBar.find("a").each(function () {
		$(this).attr("class").indexOf("list-group-item-header") == -1 && $(this).on("click", function () {
			sideBar.find("a").removeClass("active"), $(this).addClass("active")
		})
	})
});