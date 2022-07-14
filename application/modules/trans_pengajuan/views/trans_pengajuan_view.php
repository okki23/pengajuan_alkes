<div class="row">
          <div class="col-12">
          
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Listing Data Pengajuan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="fas fa-book-medical"></i> Tambah Data </a>
            <br>
            &nbsp;
                <table id="example1" class="table table-bordered table-striped">
                  <thead>       
                      <tr> 
                        <th style="width:5%;">Kode Pengajuan</th>  
                        <th style="width:10%;">Kode Barang</th>    
                        <th style="width:15%;">Nama Barang</th>   
                        <th style="width:5%;">Jumlah</th>   
                        <th style="width:5%;">Kondisi</th>    
                        <th style="width:10%;">Keterangan</th>  
                        <th style="width:5%;">Status</th>   
                        <th style="width:5%;">PIC</th>   
                        <th style="width:10%;">Tanggal Pengajuan</th>   
                        <th style="width:20%;">Opsi</th>   
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
                                    <label> Kode Pengajuan  </label>
                                        <div class="form-line">
                                            <input type="text" readonly="readonly" name="kode_pengajuan" id="kode_pengajuan" class="form-control"  />
                                        </div>
                                    </div> 

                                    <div class="input-group">
                                        <input type="text" name="nama_barang" id="nama_barang" class="form-control" readonly="readonly" >
                                        <input type="hidden" name="id_barang" id="id_barang" readonly="readonly">
                                        <span class="input-group-append">
                                            <button type="button"  onclick="CariBarang();" class="btn btn-primary btn-flat">Pilih Barang...</button>
                                        </span>
                                    </div>

                                    <div class="form-group">
                                    <label> Jumlah  </label>
                                        <div class="form-line">
                                            <input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah" />
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                    <label> Kondisi  </label>
                                        <div class="form-line">
                                           
                                        <select name="kondisi" id="kondisi" class="form-control">
                                            <option value="">--Pilih--</option>
                                            <option value="1">Ready</option>
                                            <option value="2">Good</option>
                                            <option value="3">Bad</option>
                                        </select>
                                        </div>
                                    </div>
                                  
                                    <div class="form-group">
                                    <label> Keterangan  </label>
                                        <div class="form-line">
                                            <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    <label> Status  </label>
                                        <div class="form-line">
                                           
                                        <select name="status" id="status" class="form-control">
                                            <option value="">--Pilih--</option>
                                            <option value="1">Pengajuan</option>
                                            <option value="2">Perbaikan</option>
                                            <option value="3">Pengembalian</option>
                                        </select>
                                        </div>
                                    </div>
                                  
                                     
   
                                   <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect">  <i class="fas fa-database"></i> Simpan</button>

                                   <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal">  <i class="fas fa-times"></i> Batal</button>
                             </form>
                       </div>
                     
                    </div>
                </div>
    </div>


 
    <!-- modal cari barang -->
    <div class="modal fade" id="CariBarangModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" >Cari Barang</h4>
                        </div>
                        <div class="modal-body">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">X Tutup</button>
 
                                <br>
                                <hr> 
                                 <table width="100%" class="table table-bordered table-striped table-hover " id="daftar_barang" >
   
                                    <thead>
                                        <tr>  
                                            <th style="width:98%;">Kode Barang </th> 
                                            <th style="width:98%;">Nama Barang </th> 
                                            <th style="width:98%;">Qty </th> 
                                         </tr> 
                                    </thead> 
                                    <tbody id="daftar_barang">

                                </tbody>
                                </table> 
                       </div>
                     
                    </div>
                </div>
    </div> 
  <script>  
    

    function Detail(id){
        $("#ModalDetailLabel").html("Form Detail Data");
        $("#ModalDetail").modal('show');
    }
 
    $('#daftar_barang').DataTable( {
        "ajax": "<?php echo base_url(); ?>barang/fetch_barang"           
    });

    
    function CariBarang(){
        $("#CariBarangModal").modal({backdrop: 'static', keyboard: false,show:true});
    } 


    var daftar_barang = $('#daftar_barang').DataTable();
     
    $('#daftar_barang tbody').on('click', 'tr', function () {
         
         var content = daftar_barang.row(this).data()
         console.log(content);
         $("#nama_barang").val(content[0] +' - '+content[1]);
         $("#id_barang").val(content[5]);
         $("#CariBarangModal").modal('hide');
    });

    function Ubah_Data(id){
        $("#defaultModalLabel").html("Form Ubah Data");
        $("#defaultModal").modal('show');
 
        $.ajax({
             url:"<?php echo base_url(); ?>trans_pengajuan/get_data_edit/"+id,
             type:"GET",
             dataType:"JSON", 
             success:function(result){  
                 $("#defaultModal").modal('show'); 
                 $("#id").val(result.id);
                 $("#kode_pengajuan").val(result.kode_pengajuan);
                 $("#id_barang").val(result.id_barang);
                 $("#nama_barang").val(result.kode_barang+' - '+result.nama_barang);
                 $("#jumlah").val(result.jumlah);
                 $("#kondisi").val(result.kondisi);
                 $("#status").val(result.status);
                 $("#keterangan").val(result.keterangan); 
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
            url : "<?php echo base_url('trans_pengajuan/hapus_data')?>/"+id,
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
             url:"<?php echo base_url(); ?>trans_pengajuan/simpan_data",
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
               $.get("<?php echo base_url('trans_pengajuan/get_last_id'); ?>",function(result){
                  $("#kode_pengajuan").val(result);
               });
           });
             
           $("#example1").DataTable({
              "ajax":"<?php echo base_url(); ?>trans_pengajuan/fetch_trans_pengajuan",
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