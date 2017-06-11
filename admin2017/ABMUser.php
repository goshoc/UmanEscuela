<script type="text/javascript">
  $(document).ready(function()
      {
        $('#BtnAltaUser').click(function()
        {
        $.ajax({
        type: "POST",
        url: "FormAltaUser.html",
        success: function(a) {
                $('#central').html(a);
                  }
          });
        });
         $('#BtnModiUser').click(function()
        {
        $.ajax({
        type: "POST",
        url: "FormModiUser.php",
        success: function(a) {
                $('#central').html(a);
                  }
          });
        });
          $('#BtnBajaUser').click(function()
        {
        $.ajax({
        type: "POST",
        url: "FormDeleteUser.html",
        success: function(a) {
                $('#central').html(a);
                  }
          });
        });

        $('#BtnListUser').click(function()
        {
        $.ajax({
        type: "POST",
        url: "ConsultaUser.php",
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
    <td> <li id="BtnAltaUser"><a href="#">Alta</a></li></td>
  </tr>
  <tr>
    <td> <li id="BtnModiUser"><a href="#">Modificación</a></li></td>
  </tr>
  <tr>
    <td><li id="BtnBajaUser"><a href="#">Baja</a></li></td>
  </tr>
  <tr>
    <td><li id="BtnListUser"><a href="#">Listado Completo</a></li></td>
  </tr>
  <tr>
  </tr>
</table>
