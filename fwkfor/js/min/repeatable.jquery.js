appsRepeatable={j:{},n:{},html:Array(),init:function(b){var d="zf_"+b+"_sf";var a=1;this.html[b]=new Array();that=this;jQuery("#"+d).children().each(function(e,f){if(f.id){divTag=jQuery("#"+f.id);if(divTag.hasClass("zfsub")){divTag.children(".element").each(function(h,g){inputTag=jQuery("#"+g.id);that.html[b][e]=inputTag.html();inputTag.attr("data-pos",h+1);if((h+1)>a){a=h+1}if(inputTag.attr("name")&&inputTag.attr("name").indexOf("[]")<0){inputTag.attr("name",inputTag.attr("name")+"[]")}inputTag.bind("keydown",that,function(i){return i.data.tab(i)})})}}});if(this.j.id==null){this.j.id=new Array()}if(this.n.id==null){this.n.id=new Array()}this.j.id[b]=this.n.id[b]=a},del:function(a,d){var b="zf_"+a+"_sf";if(this.n.id[a]==1){alert("You can't remove this element");return}this.n.id[a]--;item=jQuery("#"+b);jQuery("#"+b).children().each(function(e,f){if(f.id){divTag=jQuery("#"+f.id);c=divTag.children(".element").size();if(divTag.hasClass("zfsub")){divTag.children(".element").each(function(h,g){inputTag=jQuery("#"+g.id);if(inputTag.attr("data-pos")==d||(d==1&&h==0)){inputTag.remove()}})}if(divTag.hasClass("zftablecontrol")){divTag.children("input").each(function(h,g){inputTag=jQuery("#"+g.id);if(inputTag.attr("data-pos")==d||(d==1&&h==0)){inputTag.remove()}})}}})},add:function(x,pos){var id="zf_"+x+"_sf";this.j.id[x]++;this.n.id[x]++;that=this;var html="";item=jQuery("#"+id);jQuery("#"+id).children().each(function(k,itemin){if(itemin.id){divTag=jQuery("#"+itemin.id);if(divTag.hasClass("zfsub")){divTag.children(".element").each(function(i,input){inputTag=jQuery("#"+input.id);if(inputTag.attr("data-pos")==pos||(pos==1&&i==0)){type=inputTag.get(0).tagName;if(type=="TEXTAREA"){newInputTag=jQuery("<textarea>");newInputTag.attr("rows",inputTag.attr("rows"));newInputTag.attr("cols",inputTag.attr("cols"))}else{if(type=="SELECT"){newInputTag=jQuery("<select>")}else{if(type=="select-one"){newInputTag=jQuery("<select>")}else{if(type=="INPUT"){newInputTag=jQuery("<input>");newInputTag.attr("type",inputTag.attr("type"));if(inputTag.attr("type")=="button"){newInputTag.val(inputTag.val())}}else{if(type=="DIV"){newInputTag=jQuery("<div>")}else{alert("unidentied tag in repeatable.jquery.js")}}}}}key=divTag.attr("id")+"_"+that.j.id[x];if(inputTag.attr("onclick")){newInputTag.attr("onclick",inputTag.attr("onclick"))}newInputTag.attr("id",divTag.attr("id")+"_"+that.j.id[x]);newInputTag.attr("data-pos",that.j.id[x]);newInputTag.attr("class",inputTag.attr("class"));newInputTag.removeClass("hasDatepicker");newInputTag.removeClass("hasTimepicker");if(type!="DIV"){newInputTag.html(that.html[x][k])}newInputTag.bind("keydown",that,function(event){return event.data.tab(event)});name=inputTag.attr("name");newInputTag.attr("name",name);if(inputTag.attr("size")>0){newInputTag.attr("size",inputTag.attr("size"))}if(inputTag.attr("maxlength")>0){newInputTag.attr("maxlength",inputTag.attr("maxlength"))}inputTag.after(newInputTag);if(inputTag.attr("data-js")){var evalStr=inputTag.attr("data-js");eval(evalStr)}if(inputTag.attr("data-jq")){var evalStr="newInputTag."+inputTag.attr("data-jq");eval(evalStr)}if(k==0){newInputTag.focus()}if(type=="textarea"){tinyMCE.addMCEControl(document.getElementById(newInputTag.attr("id")),newInputTag.attr("id"))}}})}if(divTag.hasClass("zftablecontrol")){divTag.children("input").each(function(i,input){inputTag=jQuery("#"+input.id);if(inputTag.attr("data-pos")==pos||(pos==1&&i==0)){newInputTag=jQuery("<input>");newInputTag.attr("id",divTag.attr("id")+"_"+that.j.id[x]);if(inputTag.attr("value")=="+"){action="appsRepeatable.add('"+x+"',"+that.j.id[x]+")"}else{action="appsRepeatable.del('"+x+"',"+that.j.id[x]+")"}newInputTag.attr("onclick",action);newInputTag.attr("data-pos",that.j.id[x]);newInputTag.attr("class",inputTag.attr("class"));newInputTag.attr("value",inputTag.attr("value"));newInputTag.attr("type",inputTag.attr("type"));inputTag.after(newInputTag)}})}}})},tab:function(b){var a=jQuery(b.target);pos=a.attr("data-pos");if(b.keyCode=="9"&&!b.shiftKey){p=a.parent();s=p.next();if(s.hasClass("zfsub")){s.children("input").each(function(e,d){c=jQuery("#"+d.id);if(c.attr("data-pos")==pos){c.focus()}})}else{s=p.parent().children().eq(0);s.children("input").each(function(e,d){c=jQuery("#"+d.id);if(c.attr("data-pos")==pos){if(c.next()&&c.next().next()){c.next().next().focus()}else{return true}}})}return false}if(b.keyCode=="9"&&b.shiftKey){p=a.parent();s=p.prev();if(s.hasClass("zfsub")){s.children("input").each(function(e,d){c=jQuery("#"+d.id);if(c.attr("data-pos")==pos){c.focus()}})}else{s=p.parent().children().eq(-4);s.children("input").each(function(e,d){c=jQuery("#"+d.id);if(c.attr("data-pos")==pos){if(c.next()&&c.prev().prev()){c.prev().prev().focus()}else{return true}}})}return false}}};