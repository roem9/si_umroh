<?= $this->extend('admin/layout/page_layout') ?>

<?= $this->section('content') ?>
<div class="col-12">
  <div class="card mb-4">
    <div class="card-header pb-0 d-flex justify-content-between">
      <div class="d-lg-flex">
        <div>
          <h5 class="mb-0"><?= $title ?></h5>
          <p class="text-sm mb-0">
            <?= $deskripsi?>
          </p>
        </div>
      </div>
      <div class="d-lg-flex">
        <div>
          <div class="ms-auto my-auto d-none d-md-none d-lg-block">
            <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalFormTravel" data-bs-toggle="modal" data-bs-target="#modalFormTravel">+&nbsp; Travel Baru</a>
          </div>
          <div class="ms-auto my-auto d-block d-md-block d-lg-none">
            <button type="button" class="btn bg-gradient-info btn-sm mb-0 btnModalFormTravel" data-bs-toggle="modal" data-bs-target="#modalFormTravel">+&nbsp;</a>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body overflow-auto p-3">
      <div class="row" id="listOfMember">
        <div class="card">
          <div class="">
            <table class="table text-dark table-hover align-items-center mb-0" id="table-data">
              <thead>
                <tr>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder"></th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Tgl Bergabung</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Nama Travel</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">Domisili</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Level</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Nama Pemilik</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder all">No WA</th>
                  <th class="text-uppercase text-dark text-xxs font-weight-bolder desktop">Web</th>
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
<!-- Modal Add Data Pengajar-->
<div class="modal fade" id="modalFormTravel" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormTravelLabel">Tambah Travel</h5>
        <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="formData">
        <!-- KALAU SUKSES -->
        <div class="alert alert-success fade show text-light alert-sukses" role="alert" style="display: none">
          <div class="sukses"></div>
        </div>
        <!-- KALAU ERROR -->
        <div class="alert alert-danger fade show text-light alert-error" role="alert" style="display: none">
          <div class="error"></div>
        </div>
        <input type="hidden" name="pk_id_travel" id="pk_id_travel">
        <div class="col-12 mb-3">
          <label>Nama Travel</label>
          <input name="nama_travel" id="nama_travel" class="multisteps-form__input form-control" type="text" placeholder="nama travel">
          <div class="invalid-feedback" data-id="nama_travel"></div>
        </div>

        <div class="col-12 mb-3">
          <label>Nama Perusahaan</label>
          <input name="nama_perusahaan" id="nama_perusahaan" class="multisteps-form__input form-control" type="text" placeholder="nama perusahaan">
          <div class="invalid-feedback" data-id="nama_perusahaan"></div>
        </div>

        <div class="col-12 mb-3">
          <label for="unit">Level</label>
          <select name="unit" id="unit" class="multisteps-form__input form-control">
            <option value="">Pilih Level</option>
            <option value="cabang">Cabang</option>
            <option value="perwakilan">Perwakilan</option>
            <option value="pusat">Pusat</option>
          </select>
          <div class="invalid-feedback" data-id="unit"></div>
        </div>

        <div class="col-12 mb-3">
          <label>Nama Pemilik</label>
          <input name="nama_pemilik" id="nama_pemilik" class="multisteps-form__input form-control" type="text" placeholder="nama pemilik">
          <div class="invalid-feedback" data-id="nama_pemilik"></div>
        </div>

        <div class="form-group">
          <label for="alamat">Alamat</label>
          <textarea name="alamat" class="form-control" id="alamat" rows="3"></textarea>
          <div class="invalid-feedback" data-id="alamat"></div>
        </div>

        <div class="col-12 mb-3">
          <label>Provinsi</label>
          <input class="form-control" list="listprovinsi" name="provinsi" id="provinsi" placeholder="Ketik untuk mencari..." autocomplete="off">
          <datalist id="listprovinsi">
          </datalist>
          <div class="invalid-feedback" data-id="provinsi"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Kota/Kabupaten</label>
          <input class="form-control" list="listkota_kabupaten" name="kota_kabupaten" id="kota_kabupaten" placeholder="Ketik untuk mencari..." autocomplete="off">
          <datalist id="listkota_kabupaten">
          </datalist>
          <div class="invalid-feedback" data-id="kota_kabupaten"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Kecamatan</label>
          <input class="form-control" list="listkecamatan" name="kecamatan" id="kecamatan" placeholder="Ketik untuk mencari..." autocomplete="off">
          <datalist id="listkecamatan">
          </datalist>
          <div class="invalid-feedback" data-id="kecamatan"></div>
        </div>
        <div class="col-12 mb-3">
          <label>Kelurahan/Desa</label>
          <input class="form-control" list="listkelurahan" name="kelurahan" id="kelurahan" placeholder="Ketik untuk mencari..." autocomplete="off">
          <datalist id="listkelurahan">
          </datalist>
          <div class="invalid-feedback" data-id="kelurahan"></div>
        </div>

        <div class="col-12 mb-3">
          <label>No WA</label>
          <input name="no_wa" id="no_wa" class="multisteps-form__input form-control" type="text" placeholder="no wa">
          <div class="invalid-feedback" data-id="no_wa"></div>
        </div>

        <div class="col-12 mb-3">
          <label>Bank Rekening</label>
          <input name="bank_rekening" id="bank_rekening" class="multisteps-form__input form-control" type="text" placeholder="bank rekening">
          <div class="invalid-feedback" data-id="bank_rekening"></div>
        </div>

        <div class="col-12 mb-3">
          <label>No Rekening</label>
          <input name="no_rekening" id="no_rekening" class="multisteps-form__input form-control" type="text" placeholder="no rekening">
          <div class="invalid-feedback" data-id="no_rekening"></div>
        </div>

        <div class="col-12 mb-3">
          <label>Tgl Bergabung</label>
          <input name="tgl_bergabung" id="tgl_bergabung" class="multisteps-form__input form-control" type="date">
          <div class="invalid-feedback" data-id="tgl_bergabung"></div>
        </div>

        <div class="col-12 mb-3">
          <label>Link Landing Page</label>
          <input name="link_landing_page" id="link_landing_page" class="multisteps-form__input form-control" type="url" placeholder="link landing page">
          <div class="invalid-feedback" data-id="link_landing_page"></div>
        </div>

        <div class="col-12 mb-3">
          <label>PPIU</label>
          <input name="ppiu" id="ppiu" class="multisteps-form__input form-control" type="text" placeholder="ppiu">
          <div class="invalid-feedback" data-id="ppiu"></div>
        </div>

        <div class="col-12 mb-3">
          <label>PIHK</label>
          <input name="pihk" id="pihk" class="multisteps-form__input form-control" type="text" placeholder="pihk">
          <div class="invalid-feedback" data-id="pihk"></div>
        </div>
        
        <div class="mb-3">
            <label for="company_profile" class="form-label">Company Profile</label>
            <div id="company-profile" style="display:none" class="text-center"></div>
            <input name="company_profile" class="form-control" type="file" id="company_profile">
            <div class="invalid-feedback" data-id="company_profile"></div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info" id="btnSimpan">Simpan</button>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('js-script') ?>
<script>
  // kumpulan function

  document.addEventListener('DOMContentLoaded', () => {
    showData();
    showListProvinsi();

    const btnModalFormTravel = $(".btnModalFormTravel");
    const btnSimpanFormTravek = $("#modalFormTravel #btnSimpan");

    btnModalFormTravel.on("click", showModalFormTravel);
    btnSimpanFormTravek.on("click", tambahData);

    // form validation only number
    $('#formData #no_wa').on('keyup', function() {
      this.value = this.value.replace(/[^0-9]/g, '');
    });
  })

  function showModalFormTravel() {
    $('#modalFormTravelLabel').html('Tambah Travel');

    bersihkanForm('#formData');
    bersihkanValidasi('#formData');

    $('.alert-sukses').hide();
  }

  // show data from database
  function showData() {
    $('#table-data').DataTable({
      processing: true,
      serverSide: true,
      ajax: `<?= base_url()?>/travel/getList`,
      responsive: {
        details: {
            type: 'column'
        }
      },
      order: [[2, 'asc']],
      columns: [
        {
          className: 'dtr-control w-1',
          searchable: false,
          orderable: false,
          data: null,
          defaultContent: '',
        },
        {
          data: 'tgl_bergabung_formatted',
          searchable: true,
          className: 'text-sm w-1 text-center'
        },
        {
          data: 'nama_travel',
          searchable: true,
          className: 'text-sm'
        },
        {
          data: 'kota_kabupaten',
          searchable: true,
          className: 'text-sm w-1'
        },
        {
          data: 'unit',
          searchable: true,
          className: 'text-sm w-1'
        },
        {
          data: 'nama_pemilik',
          searchable: true,
          className: 'text-sm'
        },
        {
          data: 'no_wa',
          render: function(data, type, row) {
            return `<a href="https://api.whatsapp.com/send?phone=${row.no_wa}&text=" target="_blank"><span class="badge bg-gradient-success">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
              <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
            </svg> ${row.no_wa}
            </span></a>`;
          },
          searchable: true,
          className: 'text-sm w-1 text-center'
        },
        {
          data: 'link_landing_page',
          searchable: true,
          className: 'text-sm w-1 text-center',
          render : function(data, type, row){
            return `
              <a href="https://${row.link_landing_page}" target='_blank'>${row.link_landing_page}</a>
            `;
          }
        },
        {
          data: null,
          render: function(data, type, row) {
            return `
              <a href="javascript:void(0)" id="${row.pk_id_travel}" class="badge badge-sm bg-gold-custom dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                action
              </a>
              <ul class="dropdown-menu" aria-labelledby="${row.pk_id_travel}">
                <li>
                  <a href="javascript:void(0)" class="dropdown-item" onclick='editData(${row.pk_id_travel})'>
                      detail
                  </a>
                </li>
                <li>
                  <a href="javascript:void(0)" class="dropdown-item" onclick='hapusData(${row.pk_id_travel})'>
                      <span class="text-danger">
                        hapus travel
                      </span>
                  </a>
                </li>
              </ul>
              `;
          },
          searchable: false,
          orderable: false,
          className: 'w-1 text-center'
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

  function tambahData(e) {
    e.preventDefault();
    let form = '#formData'

    $(`#company-profile`).hide();

    let pk_id_travel = $(`${form} #pk_id_travel`).val();
    let nama_travel = $(`${form} #nama_travel`).val();
    let nama_perusahaan = $(`${form} #nama_perusahaan`).val();
    let unit = $(`${form} #unit`).val();
    let nama_pemilik = $(`${form} #nama_pemilik`).val();
    let alamat = $(`${form} #alamat`).val();
    let kelurahan = $(`${form} #kelurahan`).val();
    let kecamatan = $(`${form} #kecamatan`).val();
    let kota_kabupaten = $(`${form} #kota_kabupaten`).val();
    let provinsi = $(`${form} #provinsi`).val();
    let no_wa = $(`${form} #no_wa`).val();
    let bank_rekening = $(`${form} #bank_rekening`).val();
    let no_rekening = $(`${form} #no_rekening`).val();
    let tgl_bergabung = $(`${form} #tgl_bergabung`).val();
    let link_landing_page = $(`${form} #link_landing_page`).val();
    let ppiu = $(`${form} #ppiu`).val();
    let pihk = $(`${form} #pihk`).val();
    let company_profile = $(`${form} #company_profile`)[0].files;

    var data = new FormData();

    // let data = {
      data.append('pk_id_travel', pk_id_travel);
      data.append('nama_travel', nama_travel);
      data.append('nama_perusahaan', nama_perusahaan);
      data.append('unit', unit);
      data.append('nama_pemilik', nama_pemilik);
      data.append('alamat', alamat);
      data.append('kelurahan', kelurahan);
      data.append('kecamatan', kecamatan);
      data.append('kota_kabupaten', kota_kabupaten);
      data.append('provinsi', provinsi);
      data.append('no_wa', no_wa);
      data.append('bank_rekening', bank_rekening);
      data.append('no_rekening', no_rekening);
      data.append('tgl_bergabung', tgl_bergabung);
      data.append('link_landing_page', link_landing_page);
      data.append('ppiu', ppiu);
      data.append('pihk', pihk);
      data.append('company_profile', company_profile[0]);
    // };

    $.ajax({
      url: "<?= base_url()?>/travel/save",
      type: "POST",
      data: data,
      dataType: "json",
      contentType: false,
      processData: false,
      cache: false,
      success: function(response) {
        if(response.error){
          bersihkanValidasi(`${form}`);

          $('html, .modal-body').animate({
            scrollTop: 0
          }, 'slow');

          let errorMessage = '';
          for (var key in response.error) {
              var error = response.error[key];
              $(`[name='${key}']`).addClass("is-invalid")
              $(`[data-id='${key}']`).show()
              $(`[data-id='${key}']`).text(error)
          }

          showFormError()
  
        } else {
          Toast.fire({
              icon: response.status,
              title: response.message
          })

          $('#modalFormTravel').modal("hide");
          $('#table-data').DataTable().ajax.reload();
        }
        
      },
      error: function(xhr, status, error) {
        Toast.fire({
            icon: 'error',
            title: `terjadi kesalahan: ${error}`
        })
      }
    });
  }

  function editData($pk_id_travel) {
    let form = '#formData'
    bersihkanValidasi('#formData');
    $.ajax({
      url: "<?= base_url()?>/travel/getData/" + $pk_id_travel,
      type: "get",
      dataType: "json",
      success: function(response) {
        if (response) {
          $('#modalFormTravel').modal('show');
          $('#modalFormTravelLabel').html(response.nama_travel);
          $('.alert-error').hide();
          $('.alert-sukses').hide();

          $(`${form} #pk_id_travel`).val(response.pk_id_travel);
          $(`${form} #nama_travel`).val(response.nama_travel);
          $(`${form} #nama_perusahaan`).val(response.nama_perusahaan);
          $(`${form} #unit`).val(response.unit);
          $(`${form} #nama_pemilik`).val(response.nama_pemilik);
          $(`${form} #no_wa`).val(response.no_wa);
          $(`${form} #alamat`).val(response.alamat);
          $(`${form} #kelurahan`).val(response.kelurahan);
          $(`${form} #kecamatan`).val(response.kecamatan);
          $(`${form} #kota_kabupaten`).val(response.kota_kabupaten);
          $(`${form} #provinsi`).val(response.provinsi);
          $(`${form} #link_landing_page`).val(response.link_landing_page);
          $(`${form} #tgl_bergabung`).val(response.tgl_bergabung);
          $(`${form} #bank_rekening`).val(response.bank_rekening);
          $(`${form} #no_rekening`).val(response.no_rekening);
          $(`${form} #ppiu`).val(response.ppiu);
          $(`${form} #pihk`).val(response.pihk);

          if(response.company_profile != ''){
            $(`#company-profile`).show();
            $(`#company-profile`).html(
              `<a class="btn btn-sm bg-gradient-success mt-2" href="<?= base_url()?>/public/assets/company-profile/${response.company_profile}" download="${response.nama_travel} (Company Profile)">Download</a>`
            )
          }
        }
      }

    });
  }

  function hapusData(pk_id_travel, nama_travel) {
    Swal.fire({
      title: `Apa Anda yakin akan menghapus travel ${nama_travel}?`,
      text: "Anda tidak akan dapat mengembalikan ini!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: "<?= base_url()?>/travel/delete/" + pk_id_travel,
          type: "get",
          dataType: "json",
          success: function(response) {
            Toast.fire({
                icon: response.status,
                title: response.message
            })

            $('#table-data').DataTable().ajax.reload();
            
          },
          error: function(xhr, status, error) {
            Toast.fire({
                icon: 'error',
                title: `terjadi kesalahan: ${error}`
            })
          }
        });
      }
    })
  }
</script>
<?= $this->endSection() ?>