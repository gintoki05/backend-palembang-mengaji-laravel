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
                        <label for="judul">Judul</label>
                              <input type="text" id="judul" name="judul"  class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                            <span class="help-block with-errors"></span>
                        </div>
                  

                    <div class="form-group">
                      <label for="deskripsi">Deskripsi</label>
                          <input type="text" id="deskripsi" name="deskripsi"  class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                          <span class="help-block with-errors"></span>
                      </div>
                   
                    <div class="form-group">
                        <label for="image">Image</label>
                              <input type="text" id="image" name="image"  class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                            <span class="help-block with-errors"></span>
                        </div>
                   

                     <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                              <input type="text" id="tanggal" name="tanggal"  class="form-control" required oninvalid="this.setCustomValidity('Data tidak boleh kosong')" oninput="setCustomValidity('')">
                            <span class="help-block with-errors"></span>
                        </div>
                   

                     <div class="form-group">
                        <label for="foto">Foto</label>
                              <input type="file" id="foto" name="foto"  class="form-control">
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
