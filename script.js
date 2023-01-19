$(document).ready(function(){
  $("#mySelect").change(function(){
    var selectedValue = $(this).val();
    if(selectedValue != ""){
        $.ajax({
          type: "POST",
          url: "Weather.php",
          data: {param: selectedValue},
          success: function(response){
            $("#response").html(response);
          }
        });
    }else{
      $("#response").html("");
    }
  });
});
