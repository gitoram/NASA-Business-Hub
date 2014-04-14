(function($){
  $.fn.jgtextdefault = function(settings){
    var jElements = this;
    var settings = $.extend({}, $.fn.jgtextdefault.defaults, settings);
    return jElements.each(function(){
      if($(jElements).is("input")){ jgTextDefault( $(jElements) ); }
    });
    
    function jgTextDefault(jInput){
      if (jInput.val().length==0) jInput.val(settings.text);
      jInput.focus(function () {
        if (jInput.val()==settings.text) jInput.val('');
      });
      jInput.blur(function () {
        if (jInput.val().length==0) jInput.val(settings.text);
      });
    }
  };
  
  $.fn.jgtextdefault.defaults = {
    text: 'Defecto'
  };
  
})(jQuery);