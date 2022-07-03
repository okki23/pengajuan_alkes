<div class="row">
          <div class="col-12">
          
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Listing Data Member</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <a href="javascript:void(0);" id="addmodal" class="btn btn-primary waves-effect">  <i class="fas fa-book-medical"></i> Tambah Data </a>
            <br>
            &nbsp;
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr> 
                        <th style="width:20%;">No Reg</th>   
                        <th style="width:20%;">Nama</th>   
                        <th style="width:20%;">Usia</th>   
                        <th style="width:20%;">Alamat</th>   
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
                                  <div class="row">
                                        <div class="col-sm-6">
                                            <input type="hidden" name="id" id="id"> 
                                            
                                            <div class="form-group">
                                                <label for=""> No Registrasi</label>
                                                <div class="form-line">
                                                    <input type="text" name="no_reg" id="no_reg" class="form-control" readonly="readonly" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for=""> Nama</label>
                                                <div class="form-line">
                                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for=""> Alamat</label>
                                                <div class="form-line">
                                                    <input type="text" name="alamat" id="alamat" class="form-control"  placeholder="Alamat" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for=""> Usia</label>
                                                <div class="form-line">
                                                    <input type="text" name="usia" id="usia" class="form-control"  placeholder="Usia"/>
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
                                                <label for=""> Telp</label>
                                                <div class="form-line">
                                                    <input type="text" name="telp" id="telp" class="form-control" placeholder="Telp" />
                                                </div>
                                            </div> 

                                          
                                        </div> 

                                        <div class="col-sm-6">
                                             <div class="form-group">
                                                <label for=""> Tinggi Badan (cm)</label>
                                                <div class="form-line">
                                                    <input type="text" name="tinggi" id="tinggi" class="form-control" placeholder="Tinggi Badan" />
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for=""> Berat Badan (kg)</label>
                                                <div class="form-line">
                                                    <input type="text" name="berat_badan" id="berat_badan" class="form-control" placeholder="Berat Badan" />
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for=""> Lemak Tubuh</label>
                                                <div class="form-line">
                                                    <input type="text" name="lemak_tubuh" id="lemak_tubuh" class="form-control" placeholder="Lemak Tubuh" />
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for=""> Kadar Air</label>
                                                <div class="form-line">
                                                    <input type="text" name="kadar_air" id="kadar_air" class="form-control" placeholder="Kadar Air" />
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label for=""> Massa Otot</label>
                                                <div class="form-line">
                                                    <input type="text" name="masa_otot" id="masa_otot" class="form-control" placeholder="Massa Otot" />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for=""> Kalori</label>
                                                <div class="form-line">
                                                    <input type="text" name="kalori" id="kalori" class="form-control" placeholder="Kalori"  />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for=""> Usia Sel</label>
                                                <div class="form-line">
                                                    <input type="text" name="usia_sel" id="usia_sel" class="form-control" placeholder="Usia Sel"  />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for=""> Massa Tulang</label>
                                                <div class="form-line">
                                                    <input type="text" name="masa_tulang" id="masa_tulang" class="form-control" placeholder="Massa Tulang"  />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for=""> Lemak Perut</label>
                                                <div class="form-line">
                                                    <input type="text" name="lemak_perut" id="lemak_perut" class="form-control" placeholder="Lemak Perut" />
                                                </div>
                                            </div>
                                        </div> 
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
  
    <!-- detail data pegawai -->
	<div class="modal fade" id="DetailModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Detail Member</h4>
                        </div>
                        <div class="modal-body">
						
						<table class="table">
                            <tr>
								<td style="font-weight:bold;"> No Registrasi</td>
								<td> : </td>
								<td> <p id="noregdtl"> </p> </td>
								
								<td style="font-weight:bold;"> Nama</td>
								<td> : </td>
								<td> <p id="namadtl"> </p> </td> 
							</tr>
							 
							<tr>
								<td style="font-weight:bold;"> Telp</td>
								<td> : </td>
								<td> <p id="telpdtl"> </p> </td>
								
								<td style="font-weight:bold;"> Usia</td>
								<td> : </td>
								<td> <p id="usiadtl"> </p> </td> 
                            </tr>
                            
                            <tr>
								<td style="font-weight:bold;"> Alamat</td>
								<td> : </td>
								<td> <p id="alamatdtl"> </p> </td>
								
								<td style="font-weight:bold;"> Tanggal Daftar</td>
								<td> : </td>
								<td> <p id="tgldaftardtl"> </p> </td> 
							</tr> 

                            <tr>
								<td style="font-weight:bold;"> Jenis Kelamin</td>
								<td> : </td>
								<td> <p id="jenkeldtl"> </p> </td>
								
								<td style="font-weight:bold;"> Tinggi Badan</td>
								<td> : </td>
								<td> <p id="tinggibadandtl"> </p> </td> 
							</tr> 

                            <tr>
								<td style="font-weight:bold;"> Berat Badan</td>
								<td> : </td>
								<td> <p id="beratbadandtl"> </p> </td>
								
								<td style="font-weight:bold;"> Lemak Tubuh</td>
								<td> : </td>
								<td> <p id="lemaktubuhdtl"> </p> </td> 
							</tr> 

                            <tr>
								<td style="font-weight:bold;"> Kadar Air</td>
								<td> : </td>
								<td> <p id="kadarairdtl"> </p> </td>
								
								<td style="font-weight:bold;"> Kalori</td>
								<td> : </td>
								<td> <p id="kaloridtl"> </p> </td> 
							</tr>  

                            <tr>
								<td style="font-weight:bold;"> Usia Sel</td>
								<td> : </td>
								<td> <p id="usiaseldtl"> </p> </td>
								
								<td style="font-weight:bold;"> Masa Tulang</td>
								<td> : </td>
								<td> <p id="masatulangdtl"> </p> </td> 
							</tr> 
						 

                            <tr>
								<td style="font-weight:bold;"> Lemak Perut</td>
								<td> : </td>
								<td> <p id="lemakperutdtl"> </p> </td>
								
								<td style="font-weight:bold;">  </td>
								<td>  </td>
								<td> <p id="masatulangdtl">   </td> 
							</tr> 
						 
							 <div class="modal-footer">
							  <button type="button" class="btn btn-danger" data-dismiss="modal"> X Tutup </button>
							 </div>
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
    function Ubah_Data(id){
        $("#defaultModalLabel").html("Form Ubah Data");
        $("#defaultModal").modal('show'); 
        $.ajax({
             url:"<?php echo base_url(); ?>member/get_data_edit/"+id,
             type:"GET",
             dataType:"JSON", 
             success:function(result){  
                 $("#defaultModal").modal('show'); 
                 $("#id").val(result.id);
                 $("#nama").val(result.nama);   
                 $("#no_reg").val(result.no_reg);   
                 $("#telp").val(result.telp);   
                 $("#alamat").val(result.alamat);   
                 $("#usia").val(result.usia);   
                 $("#tinggi").val(result.tinggi);   
                 $("#berat_badan").val(result.berat_badan);   
                 $("#lemak_tubuh").val(result.lemak_tubuh);   
                 $("#kadar_air").val(result.kadar_air);   
                 $("#masa_otot").val(result.masa_otot);   
                 $("#kalori").val(result.kalori);   
                 $("#usia_sel").val(result.usia_sel);   
                 $("#masa_tulang").val(result.masa_tulang);   
                 $("#lemak_perut").val(result.lemak_perut);  
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
 
    function Show_Detail(id){ 
		$("#DetailModal").modal({backdrop: 'static', keyboard: false,show:true});
		$.ajax({
			 url:"<?php echo base_url(); ?>member/get_data_edit/"+id,
			 type:"GET",
			 dataType:"JSON", 
			 success:function(result){  
                 var nf = new Intl.NumberFormat();
                 $("#namadtl").html(result.nama);
                 $("#noregdtl").html(result.no_reg);
                 $("#usiadtl").html(result.usia+' Tahun'); 
                 $("#namadtl").html(result.nama); 
                 $("#telpdtl").html(result.telp); 
                 $("#alamatdtl").html(result.alamat); 
                 $("#emaildtl").html(result.email); 
                 $("#tgldaftardtl").html(result.tgl_daftar);  
                 $("#jenkeldtl").html(result.gents);  
                 $("#tinggibadandtl").html(result.tinggi+ ' cm'); 
                 $("#beratbadandtl").html(result.berat_badan+ ' kg'); 
                 $("#lemaktubuhdtl").html(result.lemak_tubuh);  
                 $("#kadarairdtl").html(result.kadar_air); 
                 $("#kaloridtl").html(result.kalori); 
                 $("#usiaseldtl").html(result.usia_sel); 
                 $("#masatulangdtl").html(result.masa_tulang); 
                 $("#lemakperutdtl").html(result.lemak_perut); 
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
            url : "<?php echo base_url('member/hapus_data')?>/"+id,
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
             url:"<?php echo base_url(); ?>member/simpan_data",
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
               $.get("<?php echo base_url('member/get_last_id'); ?>",function(result){
                  $("#no_reg").val(result);
               });
               $("#defaultModal").modal({backdrop: 'static', keyboard: false,show:true});
               $("#method").val('Add');
               $("#defaultModalLabel").html("Form Tambah Data");
           });
             
           $("#example1").DataTable({
              "ajax":"<?php echo base_url(); ?>member/fetch_member",
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