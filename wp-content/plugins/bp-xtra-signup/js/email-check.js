jQuery(document).ready(function(){jQuery(signup_mail_field).wrap("<div id='email_checker'></div> ");jQuery("#email_checker").append("<span class='loading' style='display:none'></span>");jQuery("#email_checker").append("<span id='email-info'></span> ");jQuery(signup_mail_field).bind("blur",function(){jQuery("#email_checker #email-info").css({display:"none"});jQuery("#email_checker span.loading").css({display:"block"});var b=jQuery(signup_mail_field).val();jQuery.post(ajaxurl,{action:"check_email",cookie:encodeURIComponent(document.cookie),email:b},function(c){var d=jQuery.parseJSON(c);if(d.code=="success"){a(d.message,0)}else{a(d.message,1)}})});function a(c,b){jQuery("#email_checker #email-info").removeClass().css({display:"block"});jQuery("#email_checker span.loading").css({display:"none"});jQuery("#email_checker #email-info").empty().html(c);if(b){jQuery("#email_checker #email-info").addClass("error")}else{jQuery("#email_checker #email-info").addClass("available")}}});