$(document).ready(function()
  {
  	function toogleActive(id)
  	{
  		$("#navHome").removeClass("active");
  		$("#navHabDia").removeClass("active");
  		$("#navHabMenu").removeClass("active");
  		//$("#navABMDias").removeClass("active");
  		$("#navABMMenu").removeClass("active");
  		$("#navABMUser").removeClass("active");
      $("#navListMenu").removeClass("active");
      $("#navABMPedidos").removeClass("active");
	    $("#"+id).addClass("active");
  	}
    $('#navHome').click(function()
    {
      $.ajax({
      type: "POST",
      url: "index.php",
      success: function(a) {
              $('#central').html(a);
              toogleActive("navHome");
                }
        });
    });

   $('#navHabDia').click(function()
    {
    	$.ajax({
    	type: "POST",
    	url: "habilitarDias.php",
    	success: function(a) {
              $('#central').html(a);
              toogleActive("navHabDia");
    						}
     		});
    });

    $('#navHabMenu').click(function()
    {
      $.ajax({
      type: "POST",
      url: "habilitarMenu.php",
      success: function(a)
    						{
              $('#central').html(a);
              toogleActive("navHabMenu");
    						}
     		});
    });
   /* $('#navABMDias').click(function()
   {
    	$.ajax({
    	type: "POST",
    	url: "ABMDias.php",
    	success: function(a)
    	{
    	    $('#central').html(a);
          toogleActive("navABMDias");
    	}
      });
   });*/
    $('#navABMMenu').click(function()
    {
    	$.ajax({
    	type: "POST",
    	url: "ABMMenu.php",
    	success: function(a)
    	{
    	    $('#central').html(a);
          toogleActive("navABMMenu");
    	}
      });
    });
    $('#navABMUser').click(function()
    {
    	$.ajax({
    	type: "POST",
    	url: "ABMUser.php",
    	success: function(a)
    	{
    	    $('#central').html(a);
          toogleActive("navABMUser");
    	}
      });
    });
    $('#navListMenu').click(function()
    {
      $.ajax({
      type: "POST",
      url: "listadoMenues.php",
      success: function(a) {
              $('#central').html(a);
              toogleActive("navListMenu");
                }
      });
    });
    $('#navABMPedidos').click(function()
    {
      $.ajax({
      type: "POST",
      url: "ABMPedidos.php",
      success: function(a) {
              $('#central').html(a);
              toogleActive("navABMPedidos");
                }
      });
    });

  });
