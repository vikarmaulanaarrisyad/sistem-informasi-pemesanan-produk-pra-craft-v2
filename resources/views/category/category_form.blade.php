<x-modal data-backdrop="static" data-keyboard="false">
    <x-slot name="title">
        Tambah Daftar Kategori
    </x-slot>

    @method('POST')
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="name">Kategori</label>
                <input id="name" class="form-control" type="text" name="name" autocomplete="off">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="image">Gambar</label>
                <div class="custom-file">
                    <input type="file" name="image" class="custom-file-input" id="image"
                        onchange="preview('.preview-image', this.files[0])">
                    <label class="custom-file-label" for="image">Choose file</label>
                </div>
            </div>

            <img src="" class="img-thumbnail preview-image" id="img-thumbnail" style="display: none;"
                width="200px" height="200px">
        </div>
    </div>

    <x-slot name="footer">
        <button type="button" onclick="submitForm(this.form)" class="btn btn-sm btn-success" id="submitBtn">
            <span id="spinner-border" class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            <i class="fas fa-save mr-1"></i>
            Simpan</button>
    </x-slot>

</x-modal>
