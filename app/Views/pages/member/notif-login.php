<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>
<div class="col-12">
  <div class="card mb-4">
    <div class="card-header pb-0 d-flex justify-content-between">
      <div class="d-lg-flex">
        <div>
          <h5 class="mb-0"><?= $title ?></h5>
          <p class="text-sm mb-0">
            Notifikasi member yang telah melewati batas tidak access kelas
          </p>
        </div>
      </div>
    </div>
    <div class="card-body overflow-auto p-3">
      <div class="row" id="listOfMember">
        <div class="card">
          <div class="">
            <table class="table text-dark table-hover align-items-center mb-0" id="table-member">
              <thead>
                <tr>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder"></th>
                  <!-- <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Status</th> -->
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Notif</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Active</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">NIM</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Nama Member</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Kelas</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Day</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Action</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('modal') ?>
<?= $this->endSection() ?>

<?= $this->section('js-script') ?>
<script>
  // kumpulan function

  document.addEventListener('DOMContentLoaded', () => {
    showData();

    const btnModalFormMember = $(".btnModalFormMember");
    const btnSimpanFormMember = $("#modalFormMember #btnSimpan");
    const btnSimpanFormKelasOfMember = $("#modalFormKelasOfMember #btnSimpan");

    btnModalFormMember.on("click", showModalFormMember);
    btnSimpanFormMember.on("click", tambahMember);
    btnSimpanFormKelasOfMember.on("click", tambahKelasOfMember);

    // form validation only number
    $('#formTambahMember #no_wa').on('keyup', function() {
      this.value = this.value.replace(/[^0-9]/g, '');
    });
  })

  function bersihkanForm() {
    $(`#formTambahMember #id_member`).val('');
    $(`#formTambahMember #nim`).val('');
    $(`#formTambahMember #nama_member`).val('');
    $(`#formTambahMember #alamat`).val('');
    $(`#formTambahMember #t4_lahir`).val('');
    $(`#formTambahMember #tgl_lahir`).val('');
    $(`#formTambahMember #no_wa`).val('');
  }

  function showModalFormMember() {
    $('#modalFormMemberLabel').html('Tambah Member');

    bersihkanForm();

    $('.alert-error').hide();
    $('.alert-sukses').hide();
  }

  // show data from database
  function showData() {
    $('#table-member').DataTable({
      processing: true,
      serverSide: true,
      ajax: `<?= base_url()?>/member/getListMemberNotifLogin`,
      responsive: {
        details: {
            type: 'column'
        }
      },
      order: [[1, 'asc']],
      columns: [
        {
          className: 'dtr-control w-1',
          searchable: false,
          orderable: false,
          data: null,
          defaultContent: '',
        },
        {
          data: 'isSend',
          searchable: true,
          className: 'text-sm w-1 text-center',
          render: function(data, type, row) {
            if (row.isSend == "1") {
              return `
                <a href="javascript:void(0)" class="me-1">
                  <span class="badge bg-gradient-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                  </span>
                </a>
              `
            } else {
              return `
                <a href="javascript:void(0)" class="me-1">
                  <span class="badge bg-gradient-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                      <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                    </svg>
                  </span>
                </a>
              `
            }
          }
        },
        {
          data: 'is_active',
          searchable: true,
          className: 'text-sm w-1 text-center',
          render: function(data, type, row) {
            if (row.is_active != '1') {
              is_active = `
              <a href="javascript:void(0)" data-id= "${row.id_kelas_member}" class="btnToggleIsActiveMember me-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle-off" viewBox="0 0 16 16">
                  <path d="M11 4a4 4 0 0 1 0 8H8a5 5 0 0 0 2-4 5 5 0 0 0-2-4zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8M0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5"/>
                </svg>
              </a>`;
            } else {
              is_active = `
              <a href="javascript:void(0)" data-id= "${row.id_kelas_member}" class="btnToggleIsActiveMember me-1 text-info">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-toggle-on" viewBox="0 0 16 16">
                  <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8"/>
                </svg>
              </a>
              `
            }

            return is_active
          }
        },
        {
          data: 'nim',
          searchable: true,
          className: 'text-sm w-1'
        },
        {
          data: 'nama_member',
          searchable: true,
          className: 'text-sm'
        },
        {
          data: 'nama_kelas',
          searchable: true,
          orderable: true,
          className: 'text-sm w-1'
        },
        {
          data: 'last_access',
          searchable: true,
          orderable: true,
          className: 'text-sm w-1 text-center'
        },
        {
          data: null,
          render: function(data, type, row) {
            return `
            <a href="https://api.whatsapp.com/send?phone=${row.no_wa}&text=${row.message}" target="_blank" data-id="${row.pk_notif_member_id}" class="btnNotif"><span class="badge bg-gradient-success">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6"/>
              </svg>
              </span>
            </a>`;
          },
          searchable: false,
          orderable: false,
          className: 'text-center w-1'
        }
      ],
      language: {
        paginate: {
          first: '<<',
          previous: '<',
          next: '>',
          last: '>>'
        }
      },
      pageLength: 5,
      lengthMenu: [
        [5, 10, 20],
        [5, 10, 20]
      ]
    });
    $.fn.DataTable.ext.pager.numbers_length = 5;
  }

  $(document).on("click", ".btnNotif", function(){
    let id = $(this).data("id");

    $.ajax({
      url: "<?= base_url()?>/member/isNotif/" + id,
      type: "get",
      success: function(hasil) {
        $('#table-member').DataTable().ajax.reload();
      }

    });
  })

  $(document).on("click", ".btnToggleIsActiveMember", function() {
    let id_kelas_member = $(this).data("id");
    
    $.ajax({
        url: `<?= base_url()?>/member/toggleIsActive/${id_kelas_member}`,
        type: "GET",
        success: function(data) {
            data = JSON.parse(data)
            
            Toast.fire({
                icon: 'success',
                title: data.message
            });

            $('#table-member').DataTable().ajax.reload();
        },
        error: function() {
            Toast.fire({
                icon: 'error',
                title: 'An error occurred.'
            });
        }
    });
  });

  function tambahMember(e) {
    e.preventDefault();

    let id_member = $(`#formTambahMember #id_member`).val();
    let nim = $(`#formTambahMember #nim`).val();
    let nama_member = $(`#formTambahMember #nama_member`).val();
    let alamat = $(`#formTambahMember #alamat`).val();
    let t4_lahir = $(`#formTambahMember #t4_lahir`).val();
    let tgl_lahir = $(`#formTambahMember #tgl_lahir`).val();
    let no_wa = $(`#formTambahMember #no_wa`).val();
    let email = $(`#formTambahMember #email`).val();
    let score_toefl = $(`#formTambahMember #score_toefl`).val();
    let score_ielts = $(`#formTambahMember #score_ielts`).val();
    // let $gambar_sampul = $(`#formTambahProgram #gambar_sampul_add`)[0].files;

    $.ajax({
      url: "<?= base_url()?>/member/simpan",
      type: "POST",
      data: {
        id_member: id_member,
        nama_member: nama_member,
        alamat: alamat,
        t4_lahir: t4_lahir,
        tgl_lahir: tgl_lahir,
        no_wa: no_wa,
        email: email,
        score_toefl: score_toefl,
        score_ielts: score_ielts,
      },
      success: function(hasil) {
        var $obj = $.parseJSON(hasil);
        if ($obj.sukses == false) {
          $('.alert-sukses').hide();
          $('.alert-error').show();
          $('.error').html($obj.error);
        } else {
          if ($obj.edit == false) {
            bersihkanForm();
          }

          $("#modalFormMember").modal("hide");

          Toast.fire({
            icon: $obj.icon,
            title: $obj.msg
          })

          $('#table-member').DataTable().ajax.reload();
        }
      }
    });
  }

  function editMember($id_member) {
    $.ajax({
      url: "<?= base_url()?>/member/getMember/" + $id_member,
      type: "get",
      success: function(hasil) {
        var $obj = $.parseJSON(hasil);
        // console.log($obj);
        if ($obj.id_member != '') {
          $('#modalFormMember').modal('show');
          $('#modalFormMemberLabel').html($obj.nama_member);
          $('.alert-error').hide();
          $('.alert-sukses').hide();

          $(`#formTambahMember #id_member`).val($obj.id_member);
          $(`#formTambahMember #nim`).val($obj.nim);
          $(`#formTambahMember #nama_member`).val($obj.nama_member);
          $(`#formTambahMember #alamat`).val($obj.alamat);
          $(`#formTambahMember #t4_lahir`).val($obj.t4_lahir);
          $(`#formTambahMember #tgl_lahir`).val($obj.tgl_lahir);
          $(`#formTambahMember #no_wa`).val($obj.no_wa);
          $(`#formTambahMember #email`).val($obj.email);
          $(`#formTambahMember #score_toefl`).val($obj.score_toefl);
          $(`#formTambahMember #score_ielts`).val($obj.score_ielts);
        }
      }

    });
  }

  function showModalTambahKelasOfMember(id_member, nama_member) {
    $('.alert-error').hide();
    $('.alert-sukses').hide();

    // reset form 
    $('#formTambahKelasOfMember :input').val('');
    $('#formTambahKelasOfMember select').prop('selectedIndex', 0);

    $("#modalFormKelasOfMember").modal('show');
    $("#formTambahKelasOfMember #fk_id_member").val(id_member);
    $("#formTambahKelasOfMember #nama_member").val(nama_member);

  }

  $("#tipe_member").on("change", function(){
    let tipe_member = $(this).val();

    $(".isNotShow").hide();
    if(tipe_member == 'Member Kelas'){
      $(".memberKelas").show();
      $("[nam]")
    } else if(tipe_member == 'Member Subscription'){
      $(".memberSubscription").show();
    }
    
    $(`#formTambahKelasOfMember #fk_id_kelas`).val("");
    $(`#formTambahKelasOfMember #fk_id_program`).val("");
    $(`#formTambahKelasOfMember #tgl_mulai`).val("");
    $(`#formTambahKelasOfMember #tgl_berakhir`).val("");
  })

  function tambahKelasOfMember(e) {
    e.preventDefault();

    var data = {};
    let fk_id_member = $(`#formTambahKelasOfMember #fk_id_member`).val();
    let tipe_member = $(`#formTambahKelasOfMember #tipe_member`).val();
    let fk_id_kelas = $(`#formTambahKelasOfMember #fk_id_kelas`).val();
    let fk_id_program = $(`#formTambahKelasOfMember #fk_id_program`).val();
    let fk_id_pengajar = $(`#formTambahKelasOfMember #fk_id_pengajar`).val();
    let tgl_mulai = $(`#formTambahKelasOfMember #tgl_mulai`).val();
    let tgl_berakhir = $(`#formTambahKelasOfMember #tgl_berakhir`).val();

    data = {
      fk_id_member: fk_id_member,
      tipe_member: tipe_member,
      fk_id_kelas: fk_id_kelas,
      fk_id_program: fk_id_program,
      fk_id_pengajar: fk_id_pengajar,
      tgl_mulai: tgl_mulai,
      tgl_berakhir: tgl_berakhir
    };

    $.ajax({
      url: "<?= base_url()?>/member/tambahKelasOfMember",
      type: "POST",
      data: data,
      success: function(hasil) {
        var $obj = $.parseJSON(hasil);
        if ($obj.sukses == false) {
          $('.alert-sukses').hide();
          $('.alert-error').show();
          $('.error').html($obj.error);
        } else {

          $("#modalFormKelasOfMember").modal('hide');

          Toast.fire({
            icon: $obj.icon,
            title: $obj.msg
          })

          $('#table-member').DataTable().ajax.reload();
        }
      }
    });
  }

  function hapusMember(id, nama_member) {
    Swal.fire({
      title: `Apa Anda yakin akan menghapus member ${nama_member}?`,
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "<?= base_url()?>/member/hapusMember/" + id,
          type: "get",
          success: function(hasil) {
            if (hasil == 'true') {
              Toast.fire({
                icon: 'success',
                title: `Berhasil menghapus member ${nama_member}`
              })

              $('#table-member').DataTable().ajax.reload();
            } else {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: `${nama_member} tidak bisa dihapus karena telah memiliki kelas / waiting list`
              })
            }
          }
        });
      }
    })
  }

  function showKelasOfMember(id_member, nama_member) {
    $.ajax({
      url: "<?= base_url()?>/member/getKelasOfMember/" + id_member,
      type: "get",
      success: function(data) {
        var data = $.parseJSON(data);
        // console.log(data);

        $("#modalListKelasOfMember").modal('show');
        $("#modalListKelasOfMemberLabel").html(nama_member);
        const listKelasOfMember = $("#listKelasOfMember");
        const listWLOfMember = $("#listWLOfMember");
        

        let objKelas = {};
        let objWL = {};
        let htmlKelas = ``;
        let htmlWL = ``;

        if (data.kelas.length > 0) {
          for (var i = 0; i < data.kelas.length; i++) {
            objKelas = data.kelas[i];
            htmlKelas += `
              <tr>
                  <td>
                    <span class="text-sm font-weight-bold mb-0">${i + 1}. ${objKelas.nama_kelas}</span>
                  </td>
                  <td class="text-end">
                    <a href="javascript:void(0)" onclick='hapusKelasOfMember(${objKelas.id_kelas_member}, "${objKelas.nama_kelas}", "${nama_member}", ${id_member})'>
                      <span class="badge bg-gradient-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                          <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                        </svg>
                      </span>
                    </a>
                  </td>
                </tr>`
            // htmlKelas += `
            //   <tr>
            //       <td>
            //         <span class="text-sm font-weight-bold mb-0">${i + 1}. ${objKelas.nama_kelas}</span>
            //       </td>
            //   </tr>`
          }
        } else {
          htmlKelas += `<div class="alert alert-warning" role="alert" style="background-image: none">
                      Data kelas kosong
                  </div>`
        }

        if (data.wl.length > 0) {
          for (var i = 0; i < data.wl.length; i++) {
            objWL = data.wl[i];
            // htmlWL += `
            //   <tr>
            //       <td>
            //         <span class="text-sm font-weight-bold mb-0">${i + 1}. ${objWL.nama_program}</span>
            //       </td>
            //       <td class="text-end">
            //         <a href="javascript:void(0)" onclick='hapusKelasOfMember(${objWL.id_kelas_member}, "${objWL.nama_program}", "${nama_member}", ${id_member})'>
            //           <span class="badge bg-gradient-danger">
            //             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
            //               <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
            //             </svg>
            //           </span>
            //         </a>
            //       </td>
            //     </tr>`
            htmlWL += `
              <tr>
                  <td>
                    <span class="text-sm font-weight-bold mb-0">${i + 1}. ${objWL.nama_program}</span>
                  </td>
              </tr>`
          }
        } else {
          htmlWL += `<div class="alert alert-warning" role="alert" style="background-image: none">
                      Data waiting list kosong
                  </div>`
        }

        listKelasOfMember.html(htmlKelas);
        listWLOfMember.html(htmlWL);
      }
    })
  }

  function showSubscriptionOfMember(id_member, nama_member) {
    $.ajax({
      url: "<?= base_url()?>/member/getSubscriptionOfMember/" + id_member,
      type: "get",
      success: function(data) {
        var data = $.parseJSON(data);
        // console.log(data);

        $("#modalListSubscriptionOfMember").modal('show');
        $("#modalListSubscriptionOfMemberLabel").html(nama_member);
        const listSubscriptionOfMember = $("#listSubscriptionOfMember");

        let obj = {};
        let html = ``;

        if (data.length > 0) {
          for (var i = 0; i < data.length; i++) {
            obj = data[i];
            html += `
              <tr>
                  <td>
                    <span class="text-sm font-weight-bold mb-0">${i + 1}. ${obj.nama_program}</span>
                  </td>
                  <td class="text-end">
                    <a href="javascript:void(0)" onclick='hapusSubscriptionOfMember(${obj.id_subscription_member}, "${obj.nama_program}", "${nama_member}", ${id_member})'>
                      <span class="badge bg-gradient-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                          <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                        </svg>
                      </span>
                    </a>
                  </td>
                </tr>`
          }
        } else {
          html += `<div class="alert alert-warning text-light" role="alert">
                      Data subscription kosong
                  </div>`
        }

        listSubscriptionOfMember.html(html);
      }
    })
  }

  function hapusKelasOfMember(id_kelas_member, nama_program, nama_member, id_member) {
    Swal.fire({
      title: `Apa Anda yakin akan menghapus ${nama_member} dari kelas ${nama_program}?`,
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "<?= base_url()?>/member/hapusKelasOfMember/" + id_kelas_member,
          type: "get",
          success: function(hasil) {
            if (result.isConfirmed) {
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })

              Toast.fire({
                icon: 'success',
                title: `Berhasil menghapus kelas ${nama_program}`
              })

              showKelasOfMember(id_member, nama_member)

              $('#table-member').DataTable().ajax.reload();
            }
          }
        });
      }
    })
  }

  function hapusSubscriptionOfMember(id_subscription_member, nama_program, nama_member, id_member) {
    Swal.fire({
      title: `Apa Anda yakin akan menghapus subscription program ${nama_program}?`,
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "<?= base_url()?>/member/hapusSubscriptionOfMember/" + id_subscription_member,
          type: "get",
          success: function(hasil) {
            if (result.isConfirmed) {
              const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                  toast.addEventListener('mouseenter', Swal.stopTimer)
                  toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
              })

              Toast.fire({
                icon: 'success',
                title: `Berhasil menghapus subscription program ${nama_program}`
              })

              showSubscriptionOfMember(id_member, nama_member)

              $('#table-member').DataTable().ajax.reload();
            }
          }
        });
      }
    })
  }

  function editStatusMember(id_member, status, nama_member) {
    $.ajax({
      url: "<?= base_url()?>/member/editStatusMember",
      type: "POST",
      data: {
        id_member: id_member,
        status: status
      },
      success: function(result) {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
          }
        })

        status = (status == "aktif") ? 'mengaktifkan' : 'menonaktifkan';

        Toast.fire({
          icon: 'success',
          title: `Berhasil ${status} member ${nama_member}`
        })

        $('#table-member').DataTable().ajax.reload();
      }
    })
  }
</script>
<?= $this->endSection() ?>