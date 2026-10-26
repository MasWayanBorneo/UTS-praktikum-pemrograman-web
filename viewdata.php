<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AdminLTE 4 | Users</title>

    <!--begin::Theme Init (prevents flash of incorrect theme on load, #6043)-->
    <script>
      (() => {
        'use strict';
        const root = document.documentElement;

        // Applications with their own theming opt out of AdminLTE's color mode
        // entirely, here as well as in the bundle.
        if (root.getAttribute('data-lte-color-mode') === 'off') {
          return;
        }

        const STORAGE_KEY = 'lte-theme';
        let stored = null;
        try {
          stored = localStorage.getItem(STORAGE_KEY);
        } catch {
          // localStorage may be unavailable (private mode, sandboxed iframe).
        }
        // Mirror the precedence in color-mode.ts: the visitor's stored choice
        // wins, then a theme this page declared itself, then the OS preference.
        const authored = root.getAttribute('data-bs-theme');
        let resolved = 'light';
        if (stored === 'dark' || stored === 'light') {
          resolved = stored;
        } else if (authored === 'dark' || authored === 'light') {
          resolved = authored;
        } else if (globalThis.matchMedia('(prefers-color-scheme: dark)').matches) {
          resolved = 'dark';
        }
        root.setAttribute('data-bs-theme', resolved);
        root.style.colorScheme = resolved;
        // Flag values computed here, so the bundle does not mistake them for a
        // theme the page declared and stop following the OS preference.
        if (resolved !== authored) {
          root.setAttribute('data-lte-theme-resolved', '');
        }
      })();
    </script>
    <!--end::Theme Init-->

    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->

    <!--begin::Primary Meta Tags-->
    <meta name="title" content="AdminLTE 4 | Users" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a free Bootstrap 5 admin dashboard template with almost 50 example pages, built with vanilla JS and designed with accessibility in mind."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard, accessible admin panel"
    />
    <!--end::Primary Meta Tags-->

    <!--begin::Accessibility Features-->
    <!-- Skip links will be dynamically added by accessibility.js -->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="./css/adminlte.css" as="style" />
    <!--end::Accessibility Features-->

    <!--begin::Fonts-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
      media="print"
      onload="this.media = 'all'"
    />
    <!--end::Fonts-->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->

    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->

    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="./css/adminlte.css" />
    <!--end::Required Plugin(AdminLTE)-->
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
  
      <!--end::Header-->
      <!--begin::Sidebar-->
      
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6">
                <h1 class="mb-0 fs-3">Rekap Nilai Mahasiswa</h1>
              </div>
              <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb float-sm-end">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Nilai</li>
                  </ol>
                </nav>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-12">
                <!--begin::Card-->
                <div class="card mb-4">
                  <!--begin::Card Header-->
                  <div class="card-header">
                    <div class="row g-2 align-items-center">
                      <div class="col-12 col-md-4">
                        <h3 class="card-title">Direktori Nilai</h3>
                      </div>
                      <div class="col-12 col-md-8">
                        <div class="d-flex flex-wrap justify-content-md-end gap-2">
                          <div class="input-group input-group-sm w-auto">
                            <span class="input-group-text">
                              <i class="bi bi-search" aria-hidden="true"></i>
                            </span>
                            <input
                              type="search"
                              id="user-search"
                              class="form-control"
                              placeholder="Search Berdasarkan Nama"
                              aria-label="Cari Data"
                              style="width: 190px"
                            />
                          </div>
                          <select
                            id="user-role-filter"
                            class="form-select form-select-sm w-auto"
                            aria-label="Filter by role"
                          >
                            <option value="all" selected>Semua Predikat</option>
                            <option value="sangat memuaskan">Sangat Memuaskan</option>
                            <option value="memuaskan">Memuaskan</option>
                            <option value="cukup memuaskan">Cukup Memuaskan</option>
                            <option value="kurang memuaskan">Kurang Memuaskan</option>
                            <option value="tidak lulus">Tidak Lulus</option>

                          </select>
                          <button
                            type="button"
                            class="btn btn-sm btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#modal-add-user"
                          >
                            <i class="bi bi-person-plus-fill me-1" aria-hidden="true"> </i>
                            Tambah Data Nilai
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--end::Card Header-->
                  <?php
                    require_once __DIR__ . "/koneksi.php"; 

                    //membuat tombol untuk tambah data
                    $sql = "SELECT * from mahasiswa order by nilai_akhir asc";    
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                      ?>
                  <!--begin::Card Body-->
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-hover align-middle m-0">
                        <thead>
                          <tr>
                            <th>Foto</th>
                            <th>NIM</th>
                            <th>Nama Lengkap</th>
                            <th id="th-nilai-akhir" aria-sort="ascending">
                              <button
                                type="button"
                                id="sort-nilai-akhir"
                                class="btn btn-link p-0 fw-bold text-reset text-decoration-none text-nowrap"
                                title="Urutkan Nilai Akhir"
                              >
                                Nilai Akhir
                                <i id="sort-nilai-akhir-icon" class="bi bi-sort-numeric-down ms-1" aria-hidden="true"></i>
                              </button>
                            </th>
                            <th>Nilai Huruf</th>
                            <th>Predikat</th>
                            <th>Tanggal Dibuat</th>
                            <th>Tanggal Diubah</th>
                            <th class="text-end">Aksi</th>
                          </tr>
                        </thead>

                        <tbody id="tabel-mahasiswa">
                        <?php
                          while($row = mysqli_fetch_assoc($result)) {
                        ?>
                          <tr
                            class="baris-mahasiswa"
                            data-nama="<?php echo htmlspecialchars(strtolower($row['Nama_lengkap'])); ?>"
                            data-nilai="<?php echo htmlspecialchars($row['nilai_akhir']); ?>"
                          >
                            <td>
                              <?php if (!empty($row['foto'])) { ?>
                                <img src="<?php echo htmlspecialchars($row['foto']); ?>" class="rounded-circle" width="40" height="40" style="object-fit: cover" alt="Foto <?php echo htmlspecialchars($row['Nama_lengkap']); ?>" />
                              <?php } else { ?>
                                <i class="bi bi-person-circle fs-2 text-body-secondary" aria-hidden="true"></i>
                              <?php } ?>
                            </td>
                            <td>
                              <div class="d-flex align-items-center">
                                <span class="fw-medium"><?php echo $row['Nim']; ?> </span>
                              </div>
                            </td>
                            <td>
                              <span class="fw-medium"><?php echo $row['Nama_lengkap']; ?></span></td>
                            <td>
                              <span class="fw-medium"> <?php echo $row['nilai_akhir']; ?> </span>
                            </td>
                            <td>
                              <span class="fw-medium"><?php echo $row['nilai_huruf']; ?></span>
                            </td>
                            <td>
                              <span class="fw-medium"><?php echo $row['predikat']; ?></span>
                            </td>
                            <td>
                              <span class="fw-medium"><?php echo $row['entry_date']; ?></span>
                            </td>
                            <td>
                              <span class="fw-medium"><?php echo $row['modified_at']; ?></span>
                            </td>
                            <td class="text-end">
                              <div class="btn-group btn-group-sm">
                                <button
                                  type="button"
                                  class="btn btn-outline-secondary"
                                  data-bs-toggle="modal"
                                  data-bs-target="#modal-edit-user"
                                  data-nim="<?php echo htmlspecialchars($row['Nim']); ?>"
                                  data-nama="<?php echo htmlspecialchars($row['Nama_lengkap']); ?>"
                                  data-nilai="<?php echo htmlspecialchars($row['nilai_akhir']); ?>"
                                  aria-label="Edit <?php echo htmlspecialchars($row['Nama_lengkap']); ?>"
                                >
                                  <i class="bi bi-pencil" aria-hidden="true"> </i>
                                </button>
                                <button
                                  type="button"
                                  class="btn btn-outline-danger"
                                  data-bs-toggle="modal"
                                  data-bs-target="#modal-delete-user"
                                  data-nim="<?php echo htmlspecialchars($row['Nim']); ?>"
                                  data-nama="<?php echo htmlspecialchars($row['Nama_lengkap']); ?>"
                                  aria-label="Hapus <?php echo htmlspecialchars($row['Nama_lengkap']); ?>"
                                >
                                  <i class="bi bi-trash" aria-hidden="true"> </i>
                                </button>
                              </div>
                            </td>
                          </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                      <p id="search-kosong" class="text-center text-body-secondary py-3 m-0 d-none">
                        Mahasiswa dengan nama tersebut tidak ditemukan
                      </p>
                    </div>
                    <!-- /.table-responsive -->
                     <?php
                     } else {
                        echo "0 results - Data Not Found!";
                     } 
                     mysqli_close($conn);
                     ?>
                  </div>
                  <!--end::Card Body-->
                  <!--begin::Card Footer-->
                  <div class="card-footer clearfix">
                    <div class="float-start pt-1 fs-7 text-body-secondary">
                      Showing 1 to 9 of 42 users
                    </div>
                    <ul class="pagination pagination-sm m-0 float-end">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" aria-label="Previous"> &laquo; </a>
                      </li>
                      <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">4</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">5</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next"> &raquo; </a>
                      </li>
                    </ul>
                  </div>
                  <!--end::Card Footer-->
                </div>
                <!--end::Card-->
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->

            <!--begin::Add User Modal-->
            <div
              class="modal fade"
              id="modal-add-user"
              tabindex="-1"
              aria-labelledby="modal-add-user-label"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action='inputnilai.php' method='post' enctype="multipart/form-data">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modal-add-user-label">Add new user</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="new-user-name" class="form-label"> NIM </label>
                        <input
                          type="text" minlength=10 maxlength=10
                          class="form-control"
                          id="new-nim"
                          name="Nim"
                          placeholder="e.g. 3202416080"
                          required
                        />
                      </div>
                      <div class="mb-3">
                        <label for="new-namalengkap" class="form-label"> Nama Lengkap </label>
                        <input
                          type="text"
                          class="form-control" 
                          id="new-namalengkap"
                          name="Nama_lengkap"
                          placeholder="Masukkan Nama Lengkap"
                          required
                        />
                        <div class="form-text">Masukkan Nama Lengkap Sesuai KTP</div>
                      </div>
                      <div class="mb-3">
                        <label for="new-nilaiakhir" class="form-label"> Nilai Akhir </label>
                        <input
                          type="number"
                          class="form-control"
                          id="new-nilaiakhir"
                          name="nilai_akhir"
                          placeholder="Masukkan Nilai Akhir"
                          required
                        />
                      </div>
                      <div class="mb-3">
                        <label for="new-foto" class="form-label"> Foto Profil </label>
                        <input
                          type="file"
                          class="form-control"
                          id="new-foto"
                          name="foto"
                          accept=".jpg,.jpeg,.png,.gif"
                        />
                        <div class="form-text">Opsional. Format JPG, JPEG, PNG, atau GIF, maksimal 1 MB</div>
                        <img id="new-foto-preview" class="rounded-circle mt-2 d-none" width="80" height="80" style="object-fit: cover" alt="Pratinjau foto profil" />
                      </div>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Batal
                      </button>
                      <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!--end::Add User Modal-->

            <!--begin::Edit User Modal-->
            <div
              class="modal fade"
              id="modal-edit-user"
              tabindex="-1"
              aria-labelledby="modal-edit-user-label"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="editnilai.php" method="post">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modal-edit-user-label">Edit Data Nilai</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="edit-nim" class="form-label"> NIM </label>
                        <input
                          type="text"
                          class="form-control"
                          id="edit-nim"
                          name="Nim"
                          readonly
                        />
                        <div class="form-text">NIM tidak dapat diubah</div>
                      </div>
                      <div class="mb-3">
                        <label for="edit-namalengkap" class="form-label"> Nama Lengkap </label>
                        <input
                          type="text"
                          class="form-control"
                          id="edit-namalengkap"
                          name="Nama_lengkap"
                          required
                        />
                      </div>
                      <div class="mb-3">
                        <label for="edit-nilaiakhir" class="form-label"> Nilai Akhir </label>
                        <input
                          type="number" min="0" max="100" step="0.01"
                          class="form-control"
                          id="edit-nilaiakhir"
                          name="nilai_akhir"
                          required
                        />
                        <div class="form-text">Nilai huruf & predikat dihitung ulang otomatis</div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Batal
                      </button>
                      <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!--end::Edit User Modal-->

            <!--begin::Delete User Modal-->
            <div
              class="modal fade"
              id="modal-delete-user"
              tabindex="-1"
              aria-labelledby="modal-delete-user-label"
              aria-hidden="true"
            >
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="hapusnilai.php" method="post">
                    <div class="modal-header">
                      <h5 class="modal-title" id="modal-delete-user-label">Hapus Data Nilai</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <div class="modal-body">
                      <input type="hidden" name="Nim" id="delete-nim" />
                      <p class="mb-0">
                        Yakin ingin menghapus data mahasiswa
                        <strong id="delete-nama"></strong> (NIM <strong id="delete-nim-text"></strong>)?
                        Data yang dihapus tidak dapat dikembalikan.
                      </p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Batal
                      </button>
                      <button type="submit" class="btn btn-danger">
                        Hapus Data
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!--end::Delete User Modal-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
      <!--begin::Footer-->
      <footer class="app-footer">
        <!--begin::To the end-->
        <div class="float-end d-none d-sm-inline">Web Programming Semester 5</div>
        <!--end::To the end-->
        <!--begin::Copyright-->
        <strong>
          Copyright &copy; 2014-2026&nbsp;
          <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
        </strong>
        All rights reserved.
        <!--end::Copyright-->
      </footer>
      <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->
    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script
      src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
      crossorigin="anonymous"
    ></script>
    <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
    <script src="./js/adminlte.js"></script>
    <!--end::Required Plugin(AdminLTE)-->
    <!--begin::OverlayScrollbars Configure-->
    <script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);

        // Disable OverlayScrollbars on mobile devices to prevent touch interference
        const isMobile = window.innerWidth <= 992;

        if (
          sidebarWrapper &&
          OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined &&
          !isMobile
        ) {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
    </script>
    <!--end::OverlayScrollbars Configure-->

    <!--begin::Delete Modal Configure-->
    <script>
      // isi NIM & nama ke modal hapus sesuai baris yang tombolnya diklik
      document.getElementById('modal-delete-user').addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const nim = button.getAttribute('data-nim');
        const nama = button.getAttribute('data-nama');

        document.getElementById('delete-nim').value = nim;
        document.getElementById('delete-nim-text').textContent = nim;
        document.getElementById('delete-nama').textContent = nama;
      });
    </script>
    <!--end::Delete Modal Configure-->

    <!--begin::Edit Modal Configure-->
    <script>
      // isi data lama ke modal edit sesuai baris yang tombolnya diklik
      document.getElementById('modal-edit-user').addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        document.getElementById('edit-nim').value = button.getAttribute('data-nim');
        document.getElementById('edit-namalengkap').value = button.getAttribute('data-nama');
        document.getElementById('edit-nilaiakhir').value = button.getAttribute('data-nilai');
      });
    </script>
    <!--end::Edit Modal Configure-->

    <!--begin::Search Configure-->
    <script>
      // sembunyikan baris yang namanya tidak mengandung kata kunci pencarian
      document.getElementById('user-search').addEventListener('input', function () {
        const keyword = this.value.trim().toLowerCase();
        let jumlahTampil = 0;

        document.querySelectorAll('.baris-mahasiswa').forEach(function (baris) {
          const cocok = baris.getAttribute('data-nama').includes(keyword);
          baris.classList.toggle('d-none', !cocok);
          if (cocok) jumlahTampil++;
        });

        const pesanKosong = document.getElementById('search-kosong');
        if (pesanKosong) {
          pesanKosong.classList.toggle('d-none', jumlahTampil > 0);
        }
      });
    </script>
    <!--end::Search Configure-->

    <!--begin::Sort Nilai Akhir Configure-->
    <script>
      // data awal dari database sudah urut ascending, klik header untuk membalik urutan
      let urutanNilai = 'asc';

      // tombol sort hanya ada kalau tabel berisi data
      document.getElementById('sort-nilai-akhir')?.addEventListener('click', function () {
        urutanNilai = urutanNilai === 'asc' ? 'desc' : 'asc';

        const tbody = document.getElementById('tabel-mahasiswa');
        const daftarBaris = Array.from(tbody.querySelectorAll('.baris-mahasiswa'));

        daftarBaris.sort(function (a, b) {
          const selisih = parseFloat(a.getAttribute('data-nilai')) - parseFloat(b.getAttribute('data-nilai'));
          return urutanNilai === 'asc' ? selisih : -selisih;
        });
        daftarBaris.forEach(function (baris) {
          tbody.appendChild(baris);
        });

        document.getElementById('sort-nilai-akhir-icon').className =
          'bi ms-1 ' + (urutanNilai === 'asc' ? 'bi-sort-numeric-down' : 'bi-sort-numeric-up-alt');
        document.getElementById('th-nilai-akhir').setAttribute(
          'aria-sort',
          urutanNilai === 'asc' ? 'ascending' : 'descending'
        );
      });
    </script>
    <!--end::Sort Nilai Akhir Configure-->

    <!--begin::Foto Preview Configure-->
    <script>
      // tampilkan pratinjau foto profil sebelum diunggah
      document.getElementById('new-foto').addEventListener('change', function () {
        const preview = document.getElementById('new-foto-preview');
        const file = this.files[0];

        if (file) {
          preview.src = URL.createObjectURL(file);
          preview.classList.remove('d-none');
        } else {
          preview.classList.add('d-none');
        }
      });
    </script>
    <!--end::Foto Preview Configure-->

    <!--begin::Color Mode Toggle-->
    <!-- The light/dark/auto switcher ships in adminlte.js as the ColorMode
     module (since 4.1) — no page script needed. Only the no-flash snippet
     in <head> stays inline, because it must run before first paint. -->
    <!--end::Color Mode Toggle-->

    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>
