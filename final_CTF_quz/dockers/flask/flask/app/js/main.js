var originTitle = document.title; var titleTime; document.addEventListener("visibilitychange", function() { if (document.hidden) { document.title = "(つェ⊂) 我藏好了哦~ " + originTitle; clearTimeout(titleTime); } else { document.title = "(*´∇｀*) 被你發現拉~ " + originTitle; titleTime = setTimeout(function() { document.title = originTitle; }, 2000); } });
//把http改成<a>
jQuery(document).ready(function() {
$.fn.replaceUrl = function() {
      var regexp = /((ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?)/gi;

         this.each(function() {
           $(this).html( $(this).html().replace(regexp, '<a href="$1">$1</a>')); });
          return $(this); }
          $('td').replaceUrl();
        });
