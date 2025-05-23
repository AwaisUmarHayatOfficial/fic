$(document).ready(function () {
  
  var currentSelection;
  var currentSelectionVer;
  var allowVer;
  var verListSize;
  var listSize = $("#topnav > li").size() - 1;
  var currentUrl = '';
  var widthDiff = 15;
  
  // = Image Preload ===================================================================
  $.fn.preload = function() { this.each(function(){ $('<img/>')[0].src = this; }); }
  $(['images/nav_dropdown_arrow_off.png']).preload();
  // ===================================================================================
  
  function allowVertical() {
    if ($("#topnav > li").eq(currentSelection).children("div").hasClass("sub") == true) {
      allowVer = true;
      $("#test").html("allowVir: " + allowVer);
      $("#topnav > li").eq(currentSelection).children("a").children("img").attr("src","images/nav_dropdown_arrow_on.png");
    } else {
      allowVer = false;
      $("#test").html("allowVir: " + allowVer);
    }
    
    currentSelectionVer = null;
    verListSize = null;
    $("#topnav > li").eq(currentSelection).children("div").find(".itemhover").stop().removeClass("itemhover");
    $(".subnavHover").removeClass("subnavHover");
  }
  
  function allULs (menu) {
    (function($) {
      jQuery.fn.calcSubWidth = function() {
        rowWidth = 0;
        //Calculate row
        menu.find("ul").each(function() {          
          rowWidth += $(this).width()+(parseInt($(this).css("margin-left").replace("px", ""))*2);
        });
      };
    })(jQuery);
    
    if ( menu.find(".row").length > 0 ) { //If row exists...
      var biggestRow = 0;  
      //Calculate each row
      menu.find(".row").each(function() {                 
        $(this).calcSubWidth();
        //Find biggest row
        if(rowWidth > biggestRow) {
          biggestRow = rowWidth;
        }
      });
      //Set width
      menu.find(".sub").css({'width' :biggestRow});
      menu.find(".row:last").css({'margin':'0'});
      
    } else { //If row does not exist...
      
      menu.calcSubWidth();
      //Set Width
      menu.find(".sub").css({'width' : rowWidth+widthDiff});
      
    }
  }
    
  $(document).keydown(function (event) {
    
    // Prevent page scrolling
    if(allowVer == true) {
        event.preventDefault();
    }
    
    // Left Arrow ---------------------------------------------------------------------------------------------------
    if (event.keyCode == 37) {
      if (currentSelection != null) {
        currentSelection--;
      } else {
        currentSelection = 0;
      }
      
      if (currentSelection == -1) {
        currentSelection = listSize-1;
        $("#topnav > li").eq(currentSelection).find(".sub").stop().fadeTo('fast', 1).show();
        allULs($("#topnav > li").eq(currentSelection));
        $("#topnav > li").eq(currentSelection).addClass("itemhover");
        $("#topnav > li").eq(currentSelection).children("a").css({"color":"#333333","line-height":"33px"});
        
        $("#topnav > li").eq(0).find(".sub").stop().fadeTo('fast', 0, function() { $(this).hide(); });
        $("#topnav > li").eq(0).removeClass("itemhover");
        $("#topnav > li").eq(0).children("a").removeAttr("style");
        $("#topnav > li").eq(0).children("a").children("img").attr("src","images/nav_dropdown_arrow_off.png");
      } else {
        $("#topnav > li").eq(currentSelection).find(".sub").stop().fadeTo('fast', 1).show();
        allULs($("#topnav > li").eq(currentSelection));
        $("#topnav > li").eq(currentSelection).addClass("itemhover");
        $("#topnav > li").eq(currentSelection).children("a").css({"color":"#333333","line-height":"33px"});
        
        $("#topnav > li").eq(currentSelection+1).find(".sub").stop().fadeTo('fast', 0, function() { $(this).hide(); });
        $("#topnav > li").eq(currentSelection+1).removeClass("itemhover");
        $("#topnav > li").eq(currentSelection+1).children("a").removeAttr("style");
        $("#topnav > li").eq(currentSelection+1).children("a").children("img").attr("src","images/nav_dropdown_arrow_off.png");
      }
      
      currentUrl = $("#topnav > li").eq(currentSelection).find("a").stop().attr("href");
      allowVertical();
      
    // Right Arrow ---------------------------------------------------------------------------------------------      
    } else if (event.keyCode == 39) {
      if (currentSelection != null) {
        currentSelection++;
      } else {
        currentSelection = 0;
      }
      
      if (currentSelection == listSize) {
        currentSelection = 0;
        $("#topnav > li").eq(currentSelection).find(".sub").stop().fadeTo('fast', 1).show();
        allULs($("#topnav > li").eq(currentSelection));
        $("#topnav > li").eq(currentSelection).addClass("itemhover");
        $("#topnav > li").eq(currentSelection).children("a").css({"color":"#333333","line-height":"33px"});
        
        $("#topnav > li").eq(listSize-1).find(".sub").stop().fadeTo('fast', 0, function() { $(this).hide(); });
        $("#topnav > li").eq(listSize-1).removeClass("itemhover");
        $("#topnav > li").eq(listSize-1).children("a").removeAttr("style");
        $("#topnav > li").eq(listSize-1).children("a").children("img").attr("src","images/nav_dropdown_arrow_off.png");
      } else {
        $("#topnav > li").eq(currentSelection).find(".sub").stop().fadeTo('fast', 1).show();
        allULs($("#topnav > li").eq(currentSelection));
        $("#topnav > li").eq(currentSelection).addClass("itemhover");
        $("#topnav > li").eq(currentSelection).children("a").css({"color":"#333333","line-height":"33px"});
      
        $("#topnav > li").eq(currentSelection-1).find(".sub").stop().fadeTo('fast', 0, function() { $(this).hide(); });
        $("#topnav > li").eq(currentSelection-1).removeClass("itemhover");
        $("#topnav > li").eq(currentSelection-1).children("a").removeAttr("style");
        $("#topnav > li").eq(currentSelection-1).children("a").children("img").attr("src","images/nav_dropdown_arrow_off.png");
      }
      
      currentUrl = $("#topnav > li").eq(currentSelection).find("a").stop().attr("href");
      allowVertical();
      
    // Up Arrow -------------------------------------------------------------------------------------------------
    } else if (event.keyCode == 38) {
      if (allowVer == true) {
        verListSize = $("#topnav > li").eq(currentSelection).children("div").find("li").stop().size();
        if (currentSelectionVer != null) {
          currentSelectionVer--;
        } else {
          currentSelectionVer = 0;
        }
        
        if (currentSelectionVer == -1) {
          currentSelectionVer = verListSize-1;
          $("#topnav > li").eq(currentSelection).children("div").find("a").eq(currentSelectionVer).stop().addClass("subnavHover");
          $("#topnav > li").eq(currentSelection).children("div").find("a").eq(0).stop().removeClass("subnavHover");  
        } else {
          $("#topnav > li").eq(currentSelection).children("div").find("a").eq(currentSelectionVer).stop().addClass("subnavHover");
          $("#topnav > li").eq(currentSelection).children("div").find("a").eq(currentSelectionVer+1).stop().removeClass("subnavHover");
        }
        
        currentUrl = $("#topnav > li").eq(currentSelection).children("div").find("a").eq(currentSelectionVer).stop().attr("href");
        $("#test").html("currentSelectionVer: " + currentSelectionVer);
      }
      
    // Down Arrow -------------------------------------------------------------------------------------------------
    } else if (event.keyCode == 40) {
      if (allowVer == true) {
        verListSize = $("#topnav > li").eq(currentSelection).children("div").find("li").stop().size();
        if (currentSelectionVer != null) {
          currentSelectionVer++;
        } else {
          currentSelectionVer = 0;
        }
        
        if (currentSelectionVer == verListSize) {
          currentSelectionVer = 0;
          $("#topnav > li").eq(currentSelection).children("div").find("a").eq(currentSelectionVer).stop().addClass("subnavHover");
          $("#topnav > li").eq(currentSelection).children("div").find("a").eq(verListSize-1).stop().removeClass("subnavHover");  
        } else {
          $("#topnav > li").eq(currentSelection).children("div").find("a").eq(currentSelectionVer).stop().addClass("subnavHover");
          $("#topnav > li").eq(currentSelection).children("div").find("a").eq(currentSelectionVer-1).stop().removeClass("subnavHover");
        }
        
        currentUrl = $("#topnav > li").eq(currentSelection).children("div").find("a").eq(currentSelectionVer).stop().attr("href");
        $("#test").html("currentSelectionVer: " + currentSelectionVer);
      }
    } else if (event.keyCode == 13) {
      if(currentUrl != '') {
        window.location = currentUrl;
      }
    } else if (event.keyCode == 27) {
       escapeNav();
    }
  });
    
    $(document).click(function() {
      if(allowVer == true) {
         escapeNav();
      }
    });
    
    function escapeNav() {
      $(".itemhover").children("a").removeAttr("style");
      $(".itemhover").removeClass("itemhover");
      $("#topnav > li").eq(currentSelection).find(".sub").stop().fadeTo('fast', 0, function() {
        $(this).hide();
      });
      
      currentUrl = null;
      currentSelection = null;
      currentSelectionVer = null;
      allowVer = null;
    }
  
  //---------------------------------------------------------------------------
  
  function megaHoverOver(){
    $(".itemhover").children("a").removeAttr("style");
    $(".itemhover").removeClass("itemhover");
    $(".subnavHover").removeClass("subnavHover");
    if (currentSelection != null) {
      $("#topnav > li").eq(currentSelection).find(".sub").stop().hide();
      currentSelection = null;
      currentSelectionVer = null;
    }
    $("#topnav").mouseover(function() {
      $("#topnav li .sub").hide();
    });
                                         
    $(this).find(".sub").stop().fadeTo('fast', 1).show();
      
    //Calculate width of all ul's
    (function($) {
      jQuery.fn.calcSubWidth = function() {
        rowWidth = 0;
        //Calculate row
        $(this).find("ul").each(function() {          
          rowWidth += $(this).width()+(parseInt($(this).css("margin-left").replace("px", ""))*2);
        });  
      };
    })(jQuery);
    
    if ( $(this).find(".row").length > 0 ) { //If row exists...
      var biggestRow = 0;  
      //Calculate each row
      $(this).find(".row").each(function() {                 
        $(this).calcSubWidth();
        //Find biggest row
        if(rowWidth > biggestRow) {
          biggestRow = rowWidth;
        }
      });
      //Set width
      $(this).find(".sub").css({'width' :biggestRow});
      $(this).find(".row:last").css({'margin':'0'});
      //$("#content").css("position","relative").css("z-index","-1");
    } else { //If row does not exist...
      
      $(this).calcSubWidth();
      //Set Width
      $(this).find(".sub").css({'width' : rowWidth+widthDiff});
    }
  }
  
  function megaHoverOut(){
    $(this).find(".sub").stop().fadeTo('fast', 0, function() {
      $(this).hide();
    });
  }
    
  $("#topnav").hover(
    function () { $("#content").css("position","relative").css("z-index","-1"); }, 
    function () { $("#content").css("z-index","1"); }
  );


  var config = {    
     sensitivity: 5, // number = sensitivity threshold (must be 1 or higher)    
     interval: 1, // number = milliseconds for onMouseOver polling interval    
     over: megaHoverOver, // function = onMouseOver callback (REQUIRED)    
     timeout: 100, // number = milliseconds delay before onMouseOut    
     out: megaHoverOut // function = onMouseOut callback (REQUIRED)    
  };

  $("ul#topnav li .sub").css({'opacity':'0'});
  $("ul#topnav// li").hoverIntent(config);
  
  $("ul#topnav// li").hover(
    function () { $(this).children("a").children("img").attr("src","images/nav_dropdown_arrow_on.png"); }, 
    function () { $(this).children("a").children("img").attr("src","images/nav_dropdown_arrow_off.png"); }
  );
  
  //---------------------------------------------------------------------------
  
  
});
