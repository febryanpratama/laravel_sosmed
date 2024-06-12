@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <div class="row">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="card-title align-middle">
                            <h3 class="box-title">List Konten</h3>
                        </div>
                        <div>
                            {{-- <a href="{{ url('broadcast/email/create') }}" class=" btn btn-info btn-sm">
                                Tambah Email
                            </a> --}}
                            {{-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-default">
                                Tambah Email
                            </button>       --}}
                              
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-body">
                                
                            <form method="POST" action="{{ url('broadcast/email/create') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="list_email[]" id="list_email">
                                <div class="form-group">
                                    <label for="brief_description">Logo <span class="text-danger">*</span></label>
                                    <select name="logo" id="" class="form-control" required>
                                        <option value="">Pilih</option>
                                        <option value="img/logo.png">Indonesiacore</option>
                                        <option value="img/businesspro.jpg">Business pro</option>
                                        <option value="img/menangpemilu.png">Menang Pemilu</option>
                                        <option value="img/kerjakilat.png">Kerja Kilat</option>
                                        <option value="img/logo-tugas.png">TugasID</option>
                                        <option value="img/erp.png">ERP Mijel</option>
                                        <option value="img/evenpedia_logo.png">Evenpedia</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="brief_description">Subject <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="subject" name="subject"  placeholder="Masukkan Subject" required rows="4">
                                </div>
            
                                <div class="form-group">
                                    <label for="body">Body Email <span class="text-danger">*</span></label>
                                    <textarea name="body" id="default-editor" cols="10" rows="3" class="form-control tinymce-element" placeholder="Masukan Pesan email"></textarea>
                                </div>
            
                                <div class="form-group">
                                    <label for="brief_description">Sender Email</label>
                                    <input type="email" class="form-control" id="sender" name="sender"  placeholder="Email Sender" rows="4">
                                </div>
            
                                <div class="form-group">
                                    <label for="brief_description">CC</label>
                                    <input type="email" class="form-control" id="cc" name="cc"  placeholder="Masukkan cc" rows="4">
                                </div>
            
                                <div class="form-group">
                                    <label for="brief_description">BCC</label>
                                    <input type="email" class="form-control" id="bcc" name="bcc"  placeholder="Masukkan bcc" rows="4">
                                </div>
            
                                <div class="form-group">
                                    <label for="attachment">File Attachment</label>
                                    <input type="file" name="attachment" class="form-control">
            
                                </div>
            
                                <div class="form-group">
                                    <label for="file_document">File import email excel <span class="text-danger">*</span></label>
                                    <input type="file" name="file" class="form-control" id="fileUpload" required>
            
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
            
                        </div>
                    </div>
                </div>
                
            </div>
        </section>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.sheetjs.com/xlsx-0.20.2/package/dist/xlsx.full.min.js"></script>
<script>
    function fileReader(oEvent) {
        var oFile = oEvent.target.files[0];
        var sFilename = oFile.name;

        var reader = new FileReader();
        var result = {};

        reader.onload = function (e) {
            var data = e.target.result;
            data = new Uint8Array(data);
            var workbook = XLSX.read(data, {type: 'array'});
            // console.log(workbook);
            var result = {};
            workbook.SheetNames.forEach(function (sheetName) {
                var roa = XLSX.utils.sheet_to_json(workbook.Sheets[sheetName], {header: 1});
                if (roa.length) result[sheetName] = roa;
            });
            // see the result, caution: it works after reader event is done.
            // console.log(result['Email Blast']);

            $('#list_email').val(result['Email Blast']);
            // result.forEach(function (item) {
            //     console.log(item);
            // });

        };
        reader.readAsArrayBuffer(oFile);
}

// Add your id of "File Input" 
$('#fileUpload').change(function(ev) {
        // Do something 
        // console.log("testt");
        fileReader(ev);
})
</script>
@endsection