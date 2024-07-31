<?php
// Ambil konten JSON dari file atau sumber lain
$json_content = file_get_contents(base_url('public/data.json'));

// Ubah JSON menjadi array PHP
$data_array = json_decode($json_content, true);

// Cek apakah berhasil mengurai JSON
if ($data_array === null) {
    echo "Gagal mengurai JSON.";
} else {
    // Gunakan data yang diurai
    // Contoh: tampilkan judul post dari data JSON
    foreach ($data_array as $post) {
        echo $post;
    }
}
?>