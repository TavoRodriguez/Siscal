</div>
<!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>
<div class="row">
  <div class="col" id="footer">
    <p>© <script type="text/javascript">
        var fecha = new Date();
        var ano = fecha.getFullYear();
        document.write(ano);
      </script> Scc inc Dev</p>
  </div>
</div>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Listo para salir?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
        <a class="btn btn-primary" href="../../bd/logout.php">Cerrar sesión</a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>


<!-- datatables JS -->
<script type="text/javascript" src="vendor/datatables/datatables.min.js"></script>
<!-- código propio JS -->
<script type="text/javascript" src="main.js"></script>
<script type="text/javascript" src="main_pay.js"></script>
<script type="text/javascript">
  function calcular() {
    try {
      var a = parseFloat(document.getElementById("amount").value) || 0,
        b = parseFloat(document.getElementById("interest").value) || 0;

      document.getElementById("interest_payment").value = a * b;
    } catch (error) {

    }
  }

  function plazo() {
    try {
      var a = parseFloat(document.getElementById("amount").value),
        b = parseFloat(document.getElementById("interest_payment").value);

      document.getElementById("term").value = a / b;
    } catch (error) {

    }
  }

  $("#boton").on("click", function() {

    $(".acciones").toggle();
    
  });
</script>


</body>

</html>