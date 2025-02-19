  <footer class="main-footer">
    <strong>Copyright &copy; 2024 <a href="https://adminlte.io">AdminLTE</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1
    </div>
  </footer>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
 <!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<!-- <script src="plugins/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });  
  });
</script>
<script>
    // Fungsi untuk membuat pratinjau gambar
    function handleFileInput(inputElement, previewContainerId) {
        const files = inputElement.files;
        const previewContainer = document.getElementById(previewContainerId);

        // Hapus pratinjau sebelumnya
        previewContainer.innerHTML = '';

        Array.from(files).forEach(file => {
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Preview Gambar';
                    img.style.maxWidth = '150px';
                    img.style.maxHeight = '150px';
                    img.style.border = '1px solid #ddd';
                    img.style.borderRadius = '5px';
                    img.style.padding = '5px';
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // Event listener untuk Foto KTP
    document.getElementById('fotoKTPInput').addEventListener('change', function () {
        handleFileInput(this, 'ktpPreviewContainer');
    });

    // Event listener untuk Foto Depan Rumah
    document.getElementById('depanRumahInput').addEventListener('change', function () {
        handleFileInput(this, 'depanRumahPreviewContainer');
    });
</script>
<script>
    function setPaketID() {
        var paketValue = document.getElementById('paket').value;
        
        var idPaket = '';
        var namaPaket = '';
        if (paketValue === '1') {
            idPaket = '1';
            namaPaket = '30 mbps';
        } else if (paketValue === '2') {
            idPaket = '2';
            namaPaket = '50 mbps';
        } else if (paketValue === '3') {
            idPaket = '3';
            namaPaket = '100 mbps';
        }

        document.getElementById('id_paket').value = idPaket;
        document.getElementById('nama_paket').value = namaPaket;
    }
</script>
<script>
  function buatTagihan(id_pelanggan) {
    if (confirm("Apakah Anda yakin ingin membuat tagihan untuk pelanggan ini?")) {
      // Kirim permintaan ke server menggunakan URL
      window.location.href = "index.php?page=buat-tagihan&id_pelanggan="+ id_pelanggan;
    }
  }
</script>
<Script>
  
  function hapus_data_user(iduser){
          Swal.fire({
  title: 'Apakah anda yakin ingin menghapus data pengjuan?',
  //showDenyButton: false,
  showCancelButton: true,
  confirmButtonText: 'Hapus Data',
  confirmButtonColor:'red',
  //denyButtonText: 'No',
  customClass: {
    actions: 'my-actions',
    cancelButton: 'order-1 right-gap',
    confirmButton: 'order-2',
    denyButton: 'order-3',
  },}).then((result) => {
    if (result.isConfirmed) {
      window.location = "index.php?page=delete-user&id_user=" + iduser;
  } })}

  function hapus_data_pengajuan(idpengajuan){
          Swal.fire({
  title: 'Apakah anda yakin ingin menghapus data pengjuan?',
  //showDenyButton: false,
  showCancelButton: true,
  confirmButtonText: 'Hapus Data',
  confirmButtonColor:'red',
  //denyButtonText: 'No',
  customClass: {
    actions: 'my-actions',
    cancelButton: 'order-1 right-gap',
    confirmButton: 'order-2',
    denyButton: 'order-3',
  },}).then((result) => {
    if (result.isConfirmed) {
      window.location = "index.php?page=delete-pengajuan&id_pengajuan=" + idpengajuan;
  } })}
  
  function hapus_data_pelanggan(idpelanggan){
          Swal.fire({
  title: 'Apakah anda yakin ingin menghapus data?',
  //showDenyButton: false,
  showCancelButton: true,
  confirmButtonText: 'Hapus Data',
  confirmButtonColor:'red',
  //denyButtonText: 'No',
  customClass: {
    actions: 'my-actions',
    cancelButton: 'order-1 right-gap',
    confirmButton: 'order-2',
    denyButton: 'order-3',
  },}).then((result) => {
    if (result.isConfirmed) {
      window.location = "index.php?page=delete-pelanggan&id_pelanggan=" + idpelanggan;
  } })}


  function hapus_data_tagihan(idtagihan){
          Swal.fire({
  title: 'Apakah anda yakin ingin menghapus data?',
  //showDenyButton: false,
  showCancelButton: true,
  confirmButtonText: 'Hapus Data',
  confirmButtonColor:'red',
  //denyButtonText: 'No',
  customClass: {
    actions: 'my-actions',
    cancelButton: 'order-1 right-gap',
    confirmButton: 'order-2',
    denyButton: 'order-3',
  },}).then((result) => {
    if (result.isConfirmed) {
      window.location = "index.php?page=delete-tagihan&id_tagihan=" + idtagihan;
  } })}

  function hapus_data_pembayaran(idpembayaran){
          Swal.fire({
  title: 'Apakah anda yakin ingin menghapus data?',
  //showDenyButton: false,
  showCancelButton: true,
  confirmButtonText: 'Hapus Data',
  confirmButtonColor:'red',
  //denyButtonText: 'No',
  customClass: {
    actions: 'my-actions',
    cancelButton: 'order-1 right-gap',
    confirmButton: 'order-2',
    denyButton: 'order-3',
  },}).then((result) => {
    if (result.isConfirmed) {
      window.location = "index.php?page=delete-pembayaran&id_pembayaran=" + idpembayaran;
  } })}


</Script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11">
</script>
<script>
  function ubahPaket(id_pelanggan, paket, id_paket) {
  console.log("Mengirim status:", id_pelanggan, paket, id_paket); // Debug log untuk mengecek data yang dikirim
  
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "http://localhost:8080/backendpk/database/update/update_paket_pelanggan.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      console.log("Response:", xhr.responseText); // Log respons dari server untuk debugging
      if (xhr.status === 200) {
        Swal.fire('Berhasil!', 'Paket berhasil diperbarui.', 'success');
        // window.location.reload(); 
      } else {
        Swal.fire('Gagal!', 'Tidak dapat memperbarui paket.', 'error');
      }
    }
  };
  
  xhr.send("id_pelanggan=" + id_pelanggan + "nama_paket=" + paket + "&id_paket" + id_paket);
}


function ubahStatusPelanggan(id_pelanggan, Status) {
  console.log("Mengirim status:", id_pelanggan, Status); // Debug log untuk mengecek data yang dikirim
  
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "http://localhost:8080/backendpk/database/update/update_status_pelanggan.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      console.log("Response:", xhr.responseText); // Log respons dari server untuk debugging
      if (xhr.status === 200) {
        Swal.fire('Berhasil!', 'Status berhasil diperbarui.', 'success');
        // window.location.reload(); 
      } else {
        Swal.fire('Gagal!', 'Tidak dapat memperbarui status.', 'error');
      }
    }
  };
  
  xhr.send("id_pelanggan=" + id_pelanggan + "&Status=" + Status);
}

function ubahStatusPembayaran(id_pembayaran, Status) {
  console.log("Mengirim status:", id_pembayaran, Status); // Debug log untuk mengecek data yang dikirim
  
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "http://localhost:8080/backendpk/database/update/update_status_pembayaran.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      console.log("Response:", xhr.responseText); // Log respons dari server untuk debugging
      if (xhr.status === 200) {
        Swal.fire('Berhasil!', 'Status berhasil diperbarui.', 'success');
        // window.location.reload(); 
      } else {
        Swal.fire('Gagal!', 'Tidak dapat memperbarui status.', 'error');
      }
    }
  };
  
  xhr.send("id_pembayaran=" + id_pembayaran + "&Status=" + Status);
}
</script>
