<script type="text/javascript">
  $(document).ready(function() 
      {
        $('#BtnAltaMenu').click(function()
        {
        $.ajax({        
        type: "POST",
        url: "FormAltaMenu.html",
        success: function(a) {
                $('#central').html(a);
                  }
          });
        });
         $('#BtnModiMenu').click(function()
        {
        $.ajax({        
        type: "POST",
        url: "FormModiMenu.html",
        success: function(a) {
                $('#central').html(a);
                  }
          });
        });
          $('#BtnBajaMenu').click(function()
        {
        $.ajax({        
        type: "POST",
        url: "FormBajaMenu.html",
        success: function(a) {
                $('#central').html(a);
                  }
          });
        });

        $('#BtnListMenu').click(function()
        {
        $.ajax({        
        type: "POST",
        url: "ConsultaMenu.php",
        success: function(a) {
                $('#central').html(a); 
                  }
          });
        });
      });
</script>

<table border="0" cellspacing="0" cellpadding="0" align="left">
  <tr> 
    <td> 
      <div align="center">Menú Menú</div>
    </td>
  </tr>
  <tr> 
    <td> <li id="BtnAltaMenu"><a href="#">Alta</a></li></td>
  </tr>
  <tr>  
    <td> <li id="BtnModiMenu"><a href="#">Modificación</a></li></td>
  </tr>
  <tr> 
    <td><li id="BtnBajaMenu"><a href="#">Baja</a></li></td>
  </tr>
  <tr>
    <td><li id="BtnListMenu"><a href="#">Listado Completo</a></li></td>
  </tr>
  <tr>
  </tr>
</table>
