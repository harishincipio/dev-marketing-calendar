	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://use.fontawesome.com/b54301e670.js"></script>
	<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery(this).attr("title", "<?=$title;?>");

		// var url = window.location.href;

		// if(url === 'http://projects.incipio.com/dev_marketing_calendar/' || url === 'http://projects.incipio.com/dev_marketing_calendar/index.php') {
		// 	jQuery('.the-header').hide();
		// }

		jQuery('.user-greet').on('mouseenter', function(){
			jQuery('.user-name').hide();
			jQuery('.logout-btn').show();
		});

		jQuery('.user-greet').on('mouseleave', function(){
			jQuery('.logout-btn').hide();
			jQuery('.user-name').show();
		});

		// jQuery(window).scroll(function(){
		// 	var ScrollTop = $("body").scrollTop();

		// 	if(ScrollTop > 0) {
		// 	    jQuery('.the-header').addClass('header-bg');
		// 	} else {
		// 		jQuery('.the-header').removeClass('header-bg');
		// 	}
		// });
	});

	</script>
</body>
</html>