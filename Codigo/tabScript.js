<script type="text/javascript">
$(document).ready(function() {
	$(".contentBox").hide();
	$(".contentBox:first").show();

	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active");
		$(this).addClass("active");
		$(".contentBox").hide();
		var activeTab = $(this).attr("rel"); 
		$("#"+activeTab).fadeIn();
	});
});
</script> 