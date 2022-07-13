<div class="row">
          <div class="col-12">
          
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Listing Data pegawai</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="fas fa-book-medical"></i> Tambah Data </a>
            <br>
            &nbsp;
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>  
                        <th style="width:10%;">NIK</th>   
                        <th style="width:10%;">Nama</th>   
                        <th style="width:10%;">Alamat</th>  
                        <th style="width:10%;">Telp</th>  
                        <th style="width:10%;">Jenis Kelamin</th>  
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
                                    <label> NIK  </label>
                                        <div class="form-line">
                                            <input type="text" name="nik" id="nik" class="form-control" placeholder="NIK" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label> Nama  </label>
                                        <div class="form-line">
                                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label> Alamat </label>
                                        <div class="form-line">
                                            <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label> Telp  </label>
                                        <div class="form-line">
                                            <input type="text" name="telp" id="telp" class="form-control" placeholder="Telepon" />
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                    <label> Email </label>
                                        <div class="form-line">
                                            <input type="text" name="email" id="email" class="form-control" placeholder="Email" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    
                                    <label> Jenis Kelamin  </label>
                                    <br>
                                        <input type="hidden" name="jk" id="jk">

                                        <button type="button" id="priabtn" class="btn btn-default waves-effect "> Laki-Laki </button>

                                        <button type="button" id="wanitabtn" class="btn btn-default waves-effect "> Perempuan </button>
                                    
                                    </div>
                                  
                                   <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect">  <i class="fas fa-database"></i> Simpan</button>

                                   <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal">  <i class="fas fa-times"></i> Batal</button>
                             </form>
                       </div>
                     
                    </div>
                </div>
    </div>
   
  <script>  
    $("#priabtn").on("click",function(){
        $("#jk").val('L');
        $(this).attr('class','btn btn-primary');
        $("#wanitabtn").attr('class','btn btn-default'); 
    });

    $("#wanitabtn").on("click",function(){
        $("#jk").val('P');
        $(this).attr('class','btn btn-primary');
        $("#priabtn").attr('class','btn btn-default');  
    }); 
     
 
    function Ubah_Data(id){
        $("#defaultModalLabel").html("Form Ubah Data");
        $("#defaultModal").modal('show');
 
        $.ajax({
             url:"<?php echo base_url(); ?>pegawai/get_data_edit/"+id,
             type:"GET",
             dataType:"JSON", 
             success:function(result){   
                 $("#defaultModal").modal('show'); 
                 $("#id").val(result.id);
                 $("#nik").val(result.nik);
                 $("#nama").val(result.nama);
                 $("#alamat").val(result.alamat);
                 $("#telp").val(result.telp); 
                 $("#email").val(result.email);
                 $("#jk").val(result.jk); 
                 
                 if(result.jk == 'L'){
                    $("#priabtn").attr('class','btn btn-primary');
                    $("#wanitabtn").attr('class','btn btn-default');
                 }else{
                    $("#priabtn").attr('class','btn btn-default');
                    $("#wanitabtn").attr('class','btn btn-primary');
                 }  
             }
         });
    }
    
    function Bersihkan_Form(){
        $(':input').val(''); 
    } 
   
    function Hapus_Data(id){
        if(confirm('Anda yakin ingin menghapus data ini?'))
        { 
        $.ajax({
            url : "<?php echo base_url('pegawai/hapus_data')?>/"+id,
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
             url:"<?php echo base_url(); ?>pegawai/simpan_data",
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
              "ajax":"<?php echo base_url(); ?>pegawai/fetch_pegawai",
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