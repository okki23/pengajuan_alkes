<div class="row">
          <div class="col-12">
          
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Listing Barang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="fas fa-book-medical"></i> Tambah Data </a>
            <br>
            &nbsp;
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr> 
                        <th style="width:10%;">Kode Barang</th>   
                        <th style="width:10%;">Nama Barang</th>   
                        <th style="width:10%;">Qty</th>  
                        <th style="width:10%;">Kondisi</th>   
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
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Form Tambah Data</h4>
                        </div>
                        <div class="modal-body">
                              <form method="post" id="user_form" enctype="multipart/form-data">   
                                 
                                    <input type="hidden" name="id" id="id"> 
                                    <!-- <div class="input-group">
                                                <div class="form-line">
                                                    <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" readonly="readonly" >
                                                    <input type="hidden" name="id_kategori" id="id_kategori" readonly="readonly" >
                                                    
                                                </div>
                                                <span class="input-group-addon">
                                                    <button type="button" onclick="CariKategori();" class="btn btn-primary"> Pilih Kategori... </button>
                                                </span>
                                    </div>   -->
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="kode_barang" id="kode_barang" class="form-control" placeholder="Kode Barang" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Nama Barang" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="qty" id="qty" class="form-control" placeholder="Qty" />
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="kondisi" id="kondisi" class="form-control" placeholder="Kondisi" />
                                        </div>
                                    </div> 
      
                                     

								   <button type="button" onclick="Simpan_Data();" class="btn btn-success waves-effect"> <i class="material-icons">save</i> Simpan</button>

                                   <button type="button" name="cancel" id="cancel" class="btn btn-danger waves-effect" onclick="javascript:Bersihkan_Form();" data-dismiss="modal"> <i class="material-icons">clear</i> Batal</button>
							 </form>
					   </div>
                     
                    </div>
                </div>
    </div>

  


 

  
 
   <script type="text/javascript"> 
     
    
     function Ubah_Data(id){
        $("#defaultModalLabel").html("Form Ubah Data");
        $("#defaultModal").modal('show');
 
        $.ajax({
             url:"<?php echo base_url(); ?>barang/get_data_edit/"+id,
             type:"GET",
             dataType:"JSON", 
             success:function(result){  
                 $("#defaultModal").modal('show'); 
                 $("#id").val(result.id);
                 $("#kode_barang").val(result.kode_barang);
                 $("#nama_barang").val(result.nama_barang);
                 $("#qty").val(result.qty);
                 $("#kondisi").val(result.kondisi);
               
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
            url : "<?php echo base_url('barang/hapus_data')?>/"+id,
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
             url:"<?php echo base_url(); ?>barang/simpan_data",
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
              "ajax":"<?php echo base_url(); ?>barang/fetch_barang",
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