var wsFormField={add:function(f,d,b){var c=jQuery("#element_"+f.field+"_"+f.subField);f.value=c.attr("value");if(b==f.compare){this.action(f,d,true)}else{this.action(f,d,false)}c.bind("change",this,function(e){e.data.change(e,f,d)})},change:function(b,f,d){var c=jQuery(b.target);f.value=c.attr("value");this.ajax(f,d)},ajax:function(rule,field){var that=this;new jQuery.ajax({url:zfAppsUrl+"ajax/form_field.php",type:"post",data:{cms:wsCms,wpabspath:wpabspath,wsData:rule},success:function(request){a=eval("("+request+")");if(a.error==0){if(a.result==rule.compare){that.action(rule,field,true)}else{that.action(rule,field,false)}}}})},action:function(d,c,b){if(d.action=="hide"&&b){jQuery("#zf_"+c).hide()}else{if(d.action=="hide"&&!b){jQuery("#zf_"+c).show()}else{if(d.action=="show"&&b){jQuery("#zf_"+c).show()}else{if(d.action=="show"&&!b){jQuery("#zf_"+c).hide()}}}}}};