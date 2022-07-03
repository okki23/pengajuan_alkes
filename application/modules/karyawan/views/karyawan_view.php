<div class="row">
          <div class="col-12">
          
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Listing Data Karyawan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="fas fa-book-medical"></i> Tambah Data </a>
            <br>
            &nbsp;
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr> 
                        <th style="width:10%;">NIP</th>   
                        <th style="width:10%;">Nama</th>   
                        <th style="width:10%;">No HP</th>  
                        <th style="width:10%;">Jenis Kelamin</th>  
                        <th style="width:10%;">Posisi</th>  
                        <th style="width:10%;">Tinggi Badan</th> 
                        <th style="width:10%;">Alamat</th>   
                        <th style="width:10%;">Email</th>    
                        <th style="width:15%;">Opsi</th>   
                      </tr>
                  </thead>  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

    <!-- form tambah dan ubah data -->
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Form Tambah Data</h4>
                        </div>
                        <div class="modal-body">
                              <form method="post" id="user_form" enctype="multipart/form-data">   
                                 
                                    <input type="hidden" name="id" id="id"> 
                                    <div class="form-group">
                                    <label> NIP  </label>
                                        <div class="form-line">
                                            <input type="text" name="nip" id="nip" class="form-control" placeholder="NIP" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label> Nama  </label>
                                        <div class="form-line">
                                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label> No HP  </label>
                                        <div class="form-line">
                                            <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="Telp" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label> Tinggi Badan  </label>
                                        <div class="form-line">
                                            <input type="text" name="tinggi_badan" id="tinggi_badan" class="form-control" placeholder="Tinggi Badan" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    
                                    <label> Jenis Kelamin  </label>
                                    <br>
                                        <input type="hidden" name="jenkel" id="jenkel">

                                        <button type="button" id="priabtn" class="btn btn-default waves-effect "> Pria </button>

                                        <button type="button" id="wanitabtn" class="btn btn-default waves-effect "> Wanita </button>
                                    
                                    </div>
                                
                                    <div class="form-group">
                                    <label> Alamat  </label>
                                        <div class="form-line">
                                            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label> Email  </label>
                                        <div class="form-line">
                                            <input type="text" name="email" id="email" class="form-control" placeholder="Email" />
                                        </div>
                                    </div>
                                    <label> Posisi  </label>
                                    <div class="input-group">
                                        
                                        <input type="text" name="nama_jabatan" id="nama_jabatan" class="form-control" readonly="readonly" >
                                        <input type="hidden" name="id_jabatan" id="id_jabatan" readonly="readonly">
                                        <span class="input-group-append">
                                            <button type="button"  onclick="PilihJabatan();" class="btn btn-primary btn-flat">Pilih Posisi...</button>
                                        </span>
                                    </div>
                                    <br>
                                    <hr>
                                     
                                   <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect">  <i class="fas fa-database"></i> Simpan</button>

                                   <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal">  <i class="fas fa-times"></i> Batal</button>
                             </form>
                       </div>
                     
                    </div>
                </div>
    </div>
  
        
    <!-- modal cari jabatan -->
    <div class="modal fade" id="PilihJabatanModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" > Pilih Jabatan </h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>

                                <br>
                                <hr>

                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_jabatan" >
  
                                    <thead>
                                        <tr>  
                                            <th style="width:95%;">Posisi</th>  
                                        </tr>
                                    </thead> 
                                    <tbody id="daftar_jabatanx">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
    </div>
  <script>  
    $("#priabtn").on("click",function(){
        $("#jenkel").val('1');
        $(this).attr('class','btn btn-primary');
        $("#wanitabtn").attr('class','btn btn-default'); 
    });

    $("#wanitabtn").on("click",function(){
        $("#jenkel").val('2');
        $(this).attr('class','btn btn-primary');
        $("#priabtn").attr('class','btn btn-default');  
    }); 
    
  	function PilihJabatan(){
        $("#PilihJabatanModal").modal({backdrop: 'static', keyboard: false,show:true});
    }
 
    function Ubah_Data(id){
        $("#defaultModalLabel").html("Form Ubah Data");
        $("#defaultModal").modal('show');
 
        $.ajax({
             url:"<?php echo base_url(); ?>karyawan/get_data_edit/"+id,
             type:"GET",
             dataType:"JSON", 
             success:function(result){  
                 $("#defaultModal").modal('show'); 
                 $("#id").val(result.id);
                 $("#nip").val(result.nip);
                 $("#tinggi_badan").val(result.tinggi_badan);
                 $("#nama").val(result.nama);
                 $("#jenkel").val(result.jenkel);
                 $("#no_hp").val(result.no_hp); 
                 $("#alamat").val(result.alamat);
                 $("#email").val(result.email); 
                 $("#id_jabatan").val(result.id_jabatan);
                 $("#nama_jabatan").val(result.nama_jabatan);
                 $("#email").val(result.email); 
                 if(result.jenkel == '1'){
                    $("#priabtn").attr('class','btn btn-primary');
                    $("#wanitabtn").attr('class','btn btn-default');
                 }else{
                    $("#priabtn").attr('class','btn btn-default');
                    $("#wanitabtn").attr('class','btn btn-primary');
                 }  
             }
         });
    }
   
    $('#daftar_jabatan').DataTable( {
        "ajax": "<?php echo base_url(); ?>jabatan/fetch_jabatan" 
    });

     var daftar_jabatan = $('#daftar_jabatan').DataTable();
     
        $('#daftar_jabatan tbody').on('click', 'tr', function () { 
            var content = daftar_jabatan.row(this).data()
            console.log(content);
            $("#nama_jabatan").val(content[0]);
            $("#id_jabatan").val(content[2]);
            $("#PilihJabatanModal").modal('hide');
        } );

    function Bersihkan_Form(){
        $(':input').val(''); 
    } 
   
    function Hapus_Data(id){
        if(confirm('Anda yakin ingin menghapus data ini?'))
        { 
        $.ajax({
            url : "<?php echo base_url('karyawan/hapus_data')?>/"+id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            { 
               $('#example1').DataTable().ajax.reload(); 
               toastr.success('Data Berhasil Dihapus'); 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        }); 
      }
    } 
   
    function Simpan_Data(){ 
         var formData = new FormData($('#user_form')[0]);    
            //transaksi dibelakang layar
            $.ajax({
             url:"<?php echo base_url(); ?>karyawan/simpan_data",
             type:"POST",
             data:formData,
             contentType:false,  
             processData:false,   
             success:function(result){  
                 $("#defaultModal").modal('hide');
                 $('#example1').DataTable().ajax.reload(); 
                 $('#user_form')[0].reset();
                 toastr.success('Data Berhasil Disimpan'); 
             }
            });  
    }  
    
    $(document).ready(function() {
        
           $("#addmodal").on("click",function(){
               $("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
               $("#method").val('Add');
               $("#defaultModalLabel").html("Form Tambah Data");
           });
             
           $("#example1").DataTable({
              "ajax":"<?php echo base_url(); ?>karyawan/fetch_karyawan",
              "ordering": true,               // Allows ordering
              "searching": true,              // Searchbox
              "paging": true,                 // Pagination
              "info": false,                  // Shows 'Showing X of X' information
              "pagingType": 'simple_numbers', // Shows Previous, page numbers & next buttons only
              "pageLength": 10,               // Defaults number of rows to display in table
              "columnDefs": [
                  {
                      "targets": 'dialPlanButtons',
                      "searchable": false,    // Stops search in the fields 
                      "sorting": false,       // Stops sorting
                      "orderable": false      // Stops ordering
                  }
              ],
              "dom": '<"top"f>rt<"bottom"lp><"clear">', // Positions table elements
              "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]], // Sets up the amount of records to display
              "language": {
                  "search": "_INPUT_",            // Removes the 'Search' field label
                  "searchPlaceholder": "Search Here..."   // Placeholder for the search box
              },
              "search": {
                  "addClass": 'form-control input-lg col-lg-12'
              },
              "fnDrawCallback":function(){
                  $("input[type='search']").attr("id", "searchBox");
                  $('#dialPlanListTable').css('cssText', "margin-top: 0px !important;");
                  $("select[name='dialPlanListTable_length'], #searchBox").removeClass("input-sm");
                  $('#searchBox').css("width", "200px").focus();
                  $('#dialPlanListTable_filter').removeClass('dataTables_filter');
              }
          });  
         }); 
</script>