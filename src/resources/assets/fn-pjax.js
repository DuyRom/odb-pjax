jQuery(document).ready(function($) {
	// var containerElement = $('.pjx-container').attr('id');
	$('li').pjax('a[data-pjax]', '#pjax-container');
    // $('.breadcrumb-item').pjax('a','.content-body');
  $('li').on('click', 'a[data-pjax]', function(event) {
    $.pjax.submit(event, '#pjax-container')
  });
  if ($.support.pjax) {
      $.pjax.defaults.timeout = 9000; 
	}
});