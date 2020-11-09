<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>copyright &copy; <script>
          document.write(new Date().getFullYear());
        </script> - developed by
        <b><a href="https://indrijunanda.gitlab.io/" target="_blank">Microbyte.id</a></b>
      </span>
    </div>
  </div>
</footer>
<!-- Footer -->
</div>
</div>

<!-- Scroll to top -->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>





<script src="<?= base_url('vendor/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
<script src="<?= base_url('js/ruang-admin.min.js'); ?>"></script>


<script src="https://code.jquery.com/jquery-3.5.1.js" ></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js" ></script>

<script>
  $('custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClas("selected").html(filename)
  });
</script>

<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>






</body>

</html>