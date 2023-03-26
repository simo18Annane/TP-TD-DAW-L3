$(document).ready(function() {
    $.getJSON("Etud.json", function(data) {
      $.each(data, function(i, text){
        $("#demo").append(text+" ");
      });
      
      });
});
