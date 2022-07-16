jQuery(document).ready(function() {
	if($('body div.container').length == 0) {
		$('body').find(":not(iframe)").addBack().contents().filter(function() {
			if(this.nodeType == 3 && /\n/.test(this.nodeValue)) {
				$(this).replaceWith(this.nodeValue.replace(/(?:\n|\t)-/g, '<br />-').replace(/([._!?:;{])\n/g, '$1<br/><br/>').replace(/\n\n/g, '<br /><br />'));
			}
		});
		$('body').wrapInner('<div class="container text-justify"></div>');
	}
	$('.aw').addClass('alert alert-warning');
	$('.ai').addClass('alert alert-info');
	$('a').attr('target', '_blank').css('color', '#fa0');
	$('figure').addClass('text-center');
	$('b').not('.alert b').css('background-color', '#dee').css('border-radius', '3px').css('padding', '5px');
	$('img').each(function() {
		var src = this.src;
		if(/\/img\//.test(src) == false) {
			src = src.substr(0, src.lastIndexOf('/') + 1) + 'img' + src.substr(src.lastIndexOf('/'));
			this.src = src;
		}
	});
	$('table').addClass('table-bordered').find('td').css('border-width', '2px');
	$('.popover').popover({placement: 'top', trigger: 'hover'});
});