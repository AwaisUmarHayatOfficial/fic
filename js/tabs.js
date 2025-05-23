var inSwitch = false;
  function setCookie(c_name,value,expiredays)
  {
   var exdate=new Date();
   exdate.setDate(exdate.getDate()+expiredays);
   document.cookie=c_name+ "=" +escape(value)+
   ((expiredays==null) ? "" : ";expires="+exdate.toUTCString());
  }
  /*function getCookie(c_name)
  {
   if (document.cookie.length>0)
   {
    c_start=document.cookie.indexOf(c_name + "=");
    if (c_start!=-1)
    {
      c_start=c_start + c_name.length+1;
      c_end=document.cookie.indexOf(";",c_start);
      if (c_end==-1) c_end=document.cookie.length;
      return unescape(document.cookie.substring(c_start,c_end));
    }
   }
   return "";
   }*/

  $(document).ready(function() {
    //var lastSupportTab = getCookie("lastSupportTab");
    var lastSupportTab = 1;
    var point = document.location.hash;

    if(lastSupportTab.length > 0 && jQuery("a[rel='" + lastSupportTab + "']").length > 0)
    {
      jQuery(".tabcontent").each(function() { jQuery(this).hide(); });
      jQuery(".tablink").each(function(e) { jQuery(this).parent().removeClass("current"); });
      var c = jQuery("a[rel='" + lastSupportTab + "']");
      jQuery(lastSupportTab).show();
      c.parent().addClass("current");
      c.find(".tabLeftOff").removeClass("tabLeftOff").addClass("tabLeftOn");
      c.find(".tabMiddleOff").removeClass("tabMiddleOff").addClass("tabMiddleOn");
      c.find(".tabRightOff").removeClass("tabRightOff").addClass("tabRightOn");
    }
    $('.tablink').mouseover(function() {
      if(!$(this).parent().hasClass('current'))
      {
        $(this).find(".tabLeftOff").removeClass("tabLeftOff").addClass("tabLeftOn");
        $(this).find(".tabMiddleOff").removeClass("tabMiddleOff").addClass("tabMiddleOn");
        $(this).find(".tabRightOff").removeClass("tabRightOff").addClass("tabRightOn");
      }
    });
    
    $('.tablink').mouseout(function() {
      if(!$(this).parent().hasClass('current'))
      {
         $(this).find(".tabLeftOn").removeClass("tabLeftOn").addClass("tabLeftOff");
         $(this).find(".tabMiddleOn").removeClass("tabMiddleOn").addClass("tabMiddleOff");
         $(this).find(".tabRightOn").removeClass("tabRightOn").addClass("tabRightOff");
      }
    });
    
     $(".tablink").live("click", function(e) {
      e.preventDefault();
      if(inSwitch == false)
      {
        inSwitch = true;
        $(".tabcontent:visible").each(function() { $(this).hide(); });
        $(".tablink").each(function() { $(this).parent().removeClass("current"); });
        if(!$(this).parent().hasClass('current'))
        {
          $(".tabLeftOn").removeClass("tabLeftOn").addClass("tabLeftOff");
          $(".tabMiddleOn").removeClass("tabMiddleOn").addClass("tabMiddleOff");
          $(".tabRightOn").removeClass("tabRightOn").addClass("tabRightOff");
        }
        var c = jQuery(this);
        var rel = c.attr("rel").toLowerCase();
        var tabrel = "#tab" + rel.slice(1);
        
        // Fixes a strange overlay issue with text in ie6
        if ($.browser.msie && $.browser.version.substr(0,1)<7) {
          jQuery(tabrel).show();
          inSwitch = false;
        } else {
          $(tabrel).fadeIn(600, function() { inSwitch = false; });
        }
        
        c.find(".tabLeftOff").removeClass("tabLeftOff").addClass("tabLeftOn");
        c.find(".tabMiddleOff").removeClass("tabMiddleOff").addClass("tabMiddleOn");
        c.find(".tabRightOff").removeClass("tabRightOff").addClass("tabRightOn");
        c.parent().addClass("current");
        setCookie("lastSupportTab", rel, 7);
      }
      return false;
    });
    
    var firstTab = $(".current");
    firstTab.find(".tabLeftOff").removeClass("tabLeftOff").addClass("tabLeftOn");
    firstTab.find(".tabMiddleOff").removeClass("tabMiddleOff").addClass("tabMiddleOn");
    firstTab.find(".tabRightOff").removeClass("tabRightOff").addClass("tabRightOn");
  });





