jQuery(document).ready(function($){
	$('.header_top a[href^="tel:"]').click(function(){
		yaCounter47243199.reachGoal('clicktel_sh');
		ga('send', 'pageview','/clicktel_sh/');
		console.log('clicktel_sh');
	});
	$('.telkont').click(function(){
		yaCounter47243199.reachGoal('clicktel_cont');
		ga('send', 'pageview','/clicktel_cont/');
		console.log('clicktel_cont');
	});
	$('a[href^="mailto:"]').click(function(){
		yaCounter47243199.reachGoal('clickmail_sh');
		ga('send', 'pageview','/clickmail_sh/');
		console.log('clickmail_sh');
	});
	$('.img-circleblock,.JS-open-get-call-popup').click(function(){
		yaCounter47243199.reachGoal('clickform_zak');
		ga('send', 'pageview','/clickform_zak/');
		console.log('clickform_zak');
	});
	$('body').on('click','#wpcf7-f16382-o1 input[type="submit"]',function(){
		if ($('#wpcf7-f16382-o1 input[name="your-name"]').val()!='' && $('#wpcf7-f16382-o1 input[name="phone"]').val()!='' && $('#wpcf7-f16382-o1 input[name="your-email"]').val()!='' ){
			yaCounter47243199.reachGoal('submitform_zak');
			ga('send', 'pageview','/submitform_zak/');
			console.log('submitform_zak');
		}
	});
	$('#wpcf7-f93-p88-o1 input[type="submit"]').click(function(){
		if ($('#wpcf7-f93-p88-o1 input[name="your-name"]').val()!='' && $('#wpcf7-f93-p88-o1 input[name="your-email"]').val()!=''){
		yaCounter47243199.reachGoal('submitform_os');
		ga('send', 'pageview','/submitform_os/');
		console.log('submitform_os');
	}
	});
});
