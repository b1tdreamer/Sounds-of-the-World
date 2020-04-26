var state = 0;

$( document ).ready(function() {

  $('#closeInfo').click(function(){
    if(state==0){
      var x = $("#sideInfo").position();
      x.right="250px";
      state = 1;
    }else{
      var x = $("#sideInfo").position();
      x.right="0px";
      state = 0;
    }
    return false;
  });
});
