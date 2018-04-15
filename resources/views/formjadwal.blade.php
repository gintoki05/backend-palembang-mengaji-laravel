<div class="modal" id="modal-form" tabindex="1" role="dialog" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="form-contact" method="post" class="form-horizontal" data-toggle="validator" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                 <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                 </div>

                <div class="modal-body">
                    <input type="hidden" id="id" name="id">
                    <div class="form-group">
                        <label for="masjid">Masjid</label>
                            <input type="text" id="masjid" name="masjid" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                            <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group">
                      <label for="waktu">Waktu</label>
                          <input type="text" id="waktu" name="waktu" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                          <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group">
                        <label for="pengisi">Pengisi</label>
                            <input type="text" id="pengisi" name="pengisi" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                            <span class="help-block with-errors"></span>
                    </div>

                     <div class="form-group">
                        <label for="tema">Tema</label>
                            <input type="text" id="tema" name="tema" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                            <span class="help-block with-errors"></span>
                    </div>

                     <div class="form-group">
                        <label for="hari">Hari</label>
                            <input type="text" id="hari" name="hari" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                            <span class="help-block with-errors"></span>
                    </div>

                     <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                            <input type="text" id="tanggal" name="tanggal" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                            <span class="help-block with-errors"></span>
                    </div>

                     <div class="form-group">
                        <label for="kategori">Kategori</label>
                            <input type="text" id="kategori" name="kategori" class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                            <span class="help-block with-errors"></span>
                    </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-save">Tambah</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                </div>
                </div>                    
            </form>
        </div>
    </div>
</div>
