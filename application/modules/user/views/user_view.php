<div class="row">
          <div class="col-12">
          
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Listing Data User</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="fas fa-book-medical"></i> Tambah Data </a>
            <br>
            &nbsp;
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr> 
                        <th style="width:20%;">Username</th>  
                        <th style="width:20%;">Nama Pegawai</th>  
                        <th style="width:10%;">Opsi</th> 
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
                                        <label for=""> Username </label>
                                        <div class="form-line">
                                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" />
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control" readonly="readonly" >
                                        <input type="hidden" name="id_pegawai" id="id_pegawai" readonly="readonly">
                                        <span class="input-group-append">
                                            <button type="button"  onclick="CariKaryawan();" class="btn btn-primary btn-flat">Pilih Karyawan...</button>
                                        </span>
                                    </div>
                                  
                                    <div class="form-group">
                                        <div class="form-line">
                                            <span class="label label-danger">* Kosongkan Apabila Tidak Mengganti Password </span>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" /> 
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                    
                                        <label> User Type  </label>
                                        <br>
                                        <input type="hidden" name="level" id="level">

                                        <button type="button" id="adminbtn" class="btn btn-default waves-effect "> Admin </button>

                                        <button type="button" id="userbtn" class="btn btn-default waves-effect "> User </button>
                                    
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
 
    <!-- modal cari karyawan -->
    <div class="modal fade" id="CariKaryawanModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Cari Pegawai</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>
 
                                <br>
                                <hr> 
                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_karyawan" >
   
                                    <thead>
                                        <tr>  
                                            <th style="width:98%;">NIP </th> 
                                            <th style="width:98%;">Nama </th> 
                                         </tr> 
                                    </thead> 
                                    <tbody id="daftar_karyawan">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
    </div> 
  <script> 
    $("#adminbtn").on("click",function(){
        $("#level").val('1');
        $(this).attr('class','btn btn-primary');
        $("#userbtn").attr('class','btn btn-default'); 
    });

    $("#userbtn").on("click",function(){
        $("#level").val('2');
        $(this).attr('class','btn btn-primary');
        $("#adminbtn").attr('class','btn btn-default');  
    }); 
   
    $('#daftar_karyawan').DataTable( {
        "ajax": "<?php echo base_url(); ?>karyawan/fetch_karyawan"           
    });

    var daftar_karyawan = $('#daftar_karyawan').DataTable();
     
    $('#daftar_karyawan tbody').on('click', 'tr', function () {
         
         var content = daftar_karyawan.row(this).data()
         console.log(content);
         $("#nama_pegawai").val(content[1]);
         $("#id_pegawai").val(content[6]);
         $("#CariKaryawanModal").modal('hide');
    });
       
    function Ubah_Data(id){
        $("#defaultModalLabel").html("Form Ubah Data");
        $("#defaultModal").modal('show');
 
        $.ajax({
             url:"<?php echo base_url(); ?>user/get_data_edit/"+id,
             type:"GET",
             dataType:"JSON", 
             success:function(result){  
                 $("#defaultModal").modal('show'); 
                 $("#id").val(result.id);
                 $("#username").val(result.username); 
                 $("#id_pegawai").val(result.id_pegawai);
                 $("#nama_pegawai").val(result.nama); 
                 $("#level").val(result.level); 

                 if(result.level == '1'){
                    $("#adminbtn").attr('class','btn btn-primary');
                    $("#userbtn").attr('class','btn btn-default');
                 }else{
                    $("#adminbtn").attr('class','btn btn-default');
                    $("#userbtn").attr('class','btn btn-primary');
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
            url : "<?php echo base_url('user/hapus_data')?>/"+id,
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
           
         var username = $("#username").val();
         
         if(username == ''){
            alert("Username Belum anda masukkan!");
            $("#username").parents('.form-line').addClass('focused error');
            $("#username").focus();
          
         }else{

            //transaksi dibelakang layar
            $.ajax({
             url:"<?php echo base_url(); ?>user/simpan_data_user",
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
    } 

    function CariKaryawan(){
        $("#CariKaryawanModal").modal({backdrop: 'static', keyboard: false,show:true});
    } 
    $(document).ready(function() {
        
           $("#addmodal").on("click",function(){
               $("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
               $("#method").val('Add');
               $("#defaultModalLabel").html("Form Tambah Data");
           });
             
           $("#example1").DataTable({
              "ajax":"<?php echo base_url(); ?>user/fetch_user",
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