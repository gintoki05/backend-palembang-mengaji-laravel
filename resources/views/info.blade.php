@extends('layouts.index')
@section('content')  
<div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="card-header">
                    <h4>Info Kajian Palembang
                        <button onclick="addForm()" class="btn btn-success float-right" style="mt-3">Tambah Info</button>
                    </h4>
                </div>
                <div class="card-body">
                    <table id="info-table" class="table table-striped table-bordered hover" style="width:100%">
                        <thead>
                            <tr>
                                <th width="30">No</th>
                                <th>Judul</th>
                                <th>Deskripsi</th>
                                <th>Image</th>
                                <th>Tanggal</th>
                                <th>Foto</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
      @include('forminfo')
   

    </div> <!-- /container -->


     <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('assets/jquery/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    {{-- dataTables --}}
    <script src="{{ asset('assets/dataTables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/dataTables/js/dataTables.bootstrap4.min.js') }}"></script>

    {{-- Validator --}}
    <script src="{{ asset('assets/validator/validator.min.js') }}"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('assets/bootstrap/js/ie10-viewport-bug-workaround.js') }}"></script>

    <script type="text/javascript">
      var table = $('#info-table').DataTable({
                      processing: false,
                      serverSide: true,
                      ajax: "{{ url('info-api') }}",
                      columns: [
                        {data: 'id', name: 'id'},
                        {data: 'judul', name: 'judul'},
                        {data: 'deskripsi', name: 'deskripsi'},
                        {data: 'image', name: 'image'},
                        {data: 'tanggal', name: 'tanggal'},
                        {data: 'show_foto', name: 'show_foto'},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                      ]
                    });

      function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#modal-form').modal('show');
        $('#modal-form form')[0].reset();
        $('.modal-title').text('Tambah Info');
      }

      function editForm(id) {
        save_method = 'edit';
        $('input[name=_method]').val('PATCH');
        $('#modal-form form')[0].reset();
        $.ajax({
          url: "{{ url('info') }}" + '/' + id + "/edit",
          type: "GET",
          dataType: "JSON",
          success: function(data) {
            $('#modal-form').modal('show');
            $('.modal-title').text('Edit Info');

            $('#id').val(data.id);
            $('#judul').val(data.judul);
            $('#deskripsi').val(data.deskripsi);
            $('#image').val(data.image);
            $('#tanggal').val(data.tanggal);
            $('#foto').val(data.foto);
          },
          error : function() {
              alert("Tidak Ada Data");
          }
        });
      }

      function deleteData(id){
          var csrf_token = $('meta[name="csrf-token"]').attr('content');
          swal({
              title: 'Yakin Mau Hapus?',
              text: "Data Tidak Bisa Dikembalikan!",
              type: 'warning',
              showCancelButton: true,
              cancelButtonColor: '#d33',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Ya, Hapus!'
          }).then(function () {
              $.ajax({
                  url : "{{ url('info') }}" + '/' + id,
                  type : "POST",
                  data : {'_method' : 'DELETE', '_token' : csrf_token},
                  success : function(data) {
                      table.ajax.reload();
                      swal({
                          title: 'Berhasil!',
                          text: data.message,
                          type: 'success',
                          timer: '1500'
                      })
                  },
                  error : function () {
                      swal({
                          title: 'Gagal',
                          text: data.message,
                          type: 'error',
                          timer: '1500'
                      })
                  }
              });
          });
        }

      $(function(){
            $('#modal-form form').validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    var id = $('#id').val();
                    if (save_method == 'add') url = "{{ url('info') }}";
                    else url = "{{ url('info') . '/' }}" + id;

                    $.ajax({
                        url : url,
                        type : "POST",
                        data: new FormData($("#modal-form form")[0]),
                        contentType: false,
                        processData: false,
                        success : function(data) {
                            $('#modal-form').modal('hide');
                            table.ajax.reload();
                            swal({
                                title: 'Berhasil!',
                                text: data.message,
                                type: 'success',
                                timer: '1500'
                            })
                        },
                        error : function(data){
                            swal({
                                title: 'Gagal',
                                text: data.message,
                                type: 'error',
                                timer: '1500'
                            })
                        }
                    });
                    return false;
                }
            });
        });
    </script>
@stop
