<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>SIPKK</title>

  @include('core.stylesheet')
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      @include('layouts.navbar')
      @include('layouts.sidebar')


      <!-- Main Content -->
      <div class="main-content">
        <section class="section">


         @yield('section')
        </section>

      </div>
      @include('layouts.footer')
    </div>
  </div>
</body>
@include('core.script')
<script>
    $('.swal-6').on('click', function (event) {
            event.preventDefault();
            const url = $(this).attr('href');
  swal({
      title: 'Apakah anda yakin ingin menghapus?',
      text: 'Data yang sudah dihapus tidak dapat dikembalikan lagi!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location.href = url;
      swal('Data Anda Sudah Terhapus!', {
        timer: 9000,
        icon: 'success',
      });
      } else {
      swal('Data tidak jadi dihapus!');
      }
    });
});
</script>
@stack('custom-script')

@stack('modal')
@method('sweetalert')
</html>
