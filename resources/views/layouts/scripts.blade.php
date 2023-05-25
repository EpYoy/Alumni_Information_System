 <!--   Core JS Files   -->
 <script src="{{ asset('js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('js/core/popper.min.js') }}"></script>
  <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!--  Google Maps Plugin    -->
  <script src="{{ asset('https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE') }}"></script>
  <!-- Chart JS -->
  <script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('js/now-ui-dashboard.min.js?v=1.5.0') }}"type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('demo/demo.js') }}"></script>
  
  @livewireScripts
  
 <script> import Swal from 'sweetalert2';</script>

  <script>
    $(document).ready(function() {
      demo.initDashboardPageCharts();
    });
  </script>
<script>
  var path = window.location.pathname;
  if (path.includes("layouts/table")) {
    document.querySelector(".nav li.active").classList.add("active");
  }

  @section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Livewire.on('openModal', () => {
                $('#alumniModal').modal('show');
            });
        });
    </script>
@endsection

<script>
    Livewire.on('alumniSaved', () => {
        // Update the count of saved alumni
        let savedAlumniCount = parseInt(document.querySelector('#savedAlumniCount').textContent);
        document.querySelector('#savedAlumniCount').textContent = savedAlumniCount + 1;
    });

    Livewire.on('alumniRemoved', () => {
        // Update the count of removed alumni
        let removedAlumniCount = parseInt(document.querySelector('#removedAlumniCount').textContent);
        document.querySelector('#removedAlumniCount').textContent = removedAlumniCount + 1;
    });
</script>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('fileUploaded', function (uploadedFile) {
            window.livewire.find('file-upload').set('uploadedFile', uploadedFile);
        });
    });
</script>

<script>
        Livewire.on('alumniUpdated', () => {
            $('#editModal').modal('hide');
        });
    </script>



 