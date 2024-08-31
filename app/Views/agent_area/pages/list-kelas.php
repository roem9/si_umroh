<?= $this->extend('agent_area/layout/page_layout') ?>

<?= $this->section('content') ?>
<section class="py-3">
  <div class="row">
    <div class="col-md-8 me-auto text-left text-light">
      <h5 class="text-light"><b>List Kelas</b></h5>
      <p>Menu ini berisikan list kelas Anda</p>
    </div>
  </div>
  <div class="row mt-lg-4 mt-2" id="listOfKelas">

  </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('js-script') ?>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    // Call function showData on loaded content
    showData();
  });

  function alertSertifikat() {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Anda harus menyelesaikan kelas terlebih dahulu untuk mengklaim sertifikat'
    })
  }

  function alertKelas(nama_agent, akses_kelas) {
    $.ajax({
      url: '<?= base_url() ?>/akelas/getMessage',
      type: "GET",
      dataType: "json",
      success: function(data) {
        let tipe_agent = (akses_kelas == 'gold') ? 'gold agent' : akses_kelas;
        let message = data.message;
        let replace = {
          '$nama_agent$': nama_agent,
          '$tipe_agent$': tipe_agent
        };

        // Replace placeholders with actual values
        let result = message.replace(/\$(nama_agent|tipe_agent)\$/g, (match, placeholder) => {
          return replace[match];
        });

        message = encodeURIComponent(result);

        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          html: `Anda tidak memiliki akses ke kelas ini. Silakan menghubungi Admin melalui tombol berikut 
                <a href='https://wa.me/${data.no_wa}?text=${message}' target="_blank" onclick="alertKelas()">
                  <span class="badge bg-gold-custom">hubungi admin</span>
                </a>`
        })
      }
    })

  }

  function showData() {
    $.ajax({
      url: '<?= base_url() ?>/akelas/getAllKelas',
      type: "GET",
      dataType: "JSON",
      success: function(data) {

        // console.log(data)
        const listOfKelas = $("#listOfKelas");
        let obj = {};
        let html = ``;
        let actiion_kelas = '';

        for (var i = 0; i < data.kelas.length; i++) {
          obj = data.kelas[i];

          if (obj.akses == 'on') {
            action_kelas = `
              <a href='<?= base_url() ?>/agentarea/kelas/${obj.classId}'>
                <span class="badge bg-gold-custom">Mulai</span>
              </a>
            `
          } else {
            action_kelas = `
              <a href='javascript:void(0)' onclick="alertKelas('${data.agent.nama_agent}', '${obj.akses_kelas}')">
                <span class="badge bg-gold-custom">Mulai</span>
              </a>
            `
          }

          html += `
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card">
                <div class="card-body p-3">
                  <div class="d-flex">
                    <div class="avatar avatar-xl bg-gradient-dark border-radius-md p-2">
                      <img src="<?= base_url() ?>/public/assets/img-kelas/${obj.gambar_sampul}" alt="gambar ${obj.nama_program}" onerror="this.onerror=null; this.src='<?= base_url() ?>/public/assets/img/curved-images/white-curved.jpg'">
                    </div>
                    <div class="ms-3 my-auto">
                      <h6>${obj.urutan}. ${obj.nama_kelas}</h6>
                    </div>
                  </div>
                  <p class="text-sm mt-3"> 
                    <span class="me-2">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                      </svg>
                    </span>
                    ${obj.deskripsi} 
                  </p>
                  <p class="text-sm"> 
                    <span class="me-2">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star" viewBox="0 0 16 16">
                        <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.56.56 0 0 0-.163-.505L1.71 6.745l4.052-.576a.53.53 0 0 0 .393-.288L8 2.223l1.847 3.658a.53.53 0 0 0 .393.288l4.052.575-2.906 2.77a.56.56 0 0 0-.163.506l.694 3.957-3.686-1.894a.5.5 0 0 0-.461 0z"/>
                      </svg>
                    </span>
                    ${obj.akses_kelas}
                  </p>
                  <hr class="horizontal dark">
                  <div class="row">
                    <div class="col text-end">
                      ${action_kelas}
                    </div>
                  </div>
                </div>
              </div>
            </div>`;
        }

        listOfKelas.html(html);
      }

    });
  }
</script>
<?= $this->endSection() ?>