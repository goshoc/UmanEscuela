<script type="text/javascript">
  $(document).ready(function()
      {
        $('#BtnAltaPedido').click(function()
        {
        $.ajax({
        type: "POST",
        url: "FormAltaPedido.php",
        success: function(a) {
                $('#central').html(a);
                  }
          });
        });
         $('#BtnModiPedido').click(function()
        {
        $.ajax({
        type: "POST",
        url: "FormModiPedido.php",
        success: function(a) {
                $('#central').html(a);
                  }
          });
        });
          $('#BtnBajaPedido').click(function()
        {
        $.ajax({
        type: "POST",
        url: "FormBajaPedido.php",
        success: function(a) {
                $('#central').html(a);
                  }
          });
        });

        $('#BtnListPedido').click(function()
        {
        $.ajax({
        type: "POST",
        url: "ConsultaPedido.php",
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
      <div align="center">Menú pedidos</div>
    </td>
  </tr>
  <tr>
    <td><li id="BtnAltaPedido"><a href="#">Alta</a></li></td>
  </tr>
  <tr>
    <td><li id="BtnModiPedido"><a href="#">Modificación</a></li></td>
  </tr>
  <tr>
    <td><li id="BtnBajaPedido"><a href="#">Baja</a></li></td>
  </tr>
  <tr>
    <td><li id="BtnListPedido"><a href="#">Listado Completo</a></li></td>
  </tr>
  <tr>
  </tr>
</table>
