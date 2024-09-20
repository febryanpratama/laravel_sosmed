@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="card-title align-middle">
                                <h3 class="box-title">Tambah Data</h3>
                            </div>
                            <div>
                                <a href="https://indonesiacore.com/admin/whatsapp-blast/download/file" target="_blank" class=" btn btn-info btn-sm">
                                    Download Template
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="card-body">
                                <form id="whatsapp-blast-form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="message">Pesan <span class="text-danger">*</span></label>
                                        <textarea type="text" class="form-control" id="message" name="message" placeholder="Masukkan Pesan" rows="4"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="import-csv">Import Excel (No WhatsApp) <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" id="import-csv" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required></input>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="">File Tambahan</label>
                                        <select name="file_type" id="file_type" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            <option value="1">Gambar</option>
                                            <option value="2">Dokumen</option>
                                        </select>
                                    </div> -->

                                    <!-- <div class="" id="documents" style="display: none;">
                                        <div class="form-group" id="document-selected">
                                            <label for="document" id="text-document"></label>
                                            <input type="file" class="form-control" id="document" name="document"></input>
                                        </div>
                                    </div> -->

                                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<script>
    document.getElementById('whatsapp-blast-form').addEventListener('submit', async function(event) {
        event.preventDefault();

        // Ambil data dari form
        let formData = new FormData(this);

        try {
            // Kirim form menggunakan fetch
            let response = await fetch('https://indonesiacore.com/api/whatsapp-blast/store', {
                method: 'POST',
                body: formData
            });

            // Parsing JSON dari respons
            let result = await response.json();

            // Jika status sukses, redirect ke halaman sebelumnya atau yang diinginkan
            if (result.status === 'success') {
                alert(result.message); // Menampilkan pesan sukses

                // window.history.back(); // Kembali ke halaman sebelumnya
                window.location = "broadcast/whatsapp-blast"
            } else {
                alert('Gagal menambahkan data');
            }

        } catch (error) {
            console.error('Error:', error);
        }
    });
</script>
@endsection