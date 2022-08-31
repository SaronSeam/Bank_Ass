@include('header')

    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			
			    <div class="row g-3 mb-4 align-items-center justify-content-between">

				    

							<h3 class="app-page-title mb-0">Expense</h3>
							<div class="row g-3 mb-4 align-items-center justify-content-between">
<br>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    <div class="col-auto">
								    <form id="ex" class="table-search-form row gx-1 align-items-center" class="d-flex justify-content-center">
									<div class="col-auto">
										<span class="app-page-title mb-0">Bank</span>
										<select id="bank" class="form-select w-auto">
												@foreach($banks as $bank)
													<option value="{{ $bank->bank_name }}">{{ $bank->bank_name}}</option>
												@endforeach
										</select>		
										</div>
                                        <div class="col-auto">
											<span class="app-page-title mb-0">Amount</span>
					                        <input type="text" id="txtamount"  class="form-control " placeholder="Amount">
					                    </div>
										<div class="col-auto">
											<span class="app-page-title mb-0">Description</span>
					                        <input type="text" id="txtdes"  class="form-control " placeholder="Description">
					                    </div>
                                        <div class="col-auto">
											<span class="app-page-title mb-0">Date</span>
					                        <input type="date" id="txtdate"  class="form-control " >

					                    </div>
					                    <div class="mr-auto p-2">
											<br>
										
					                        <button type="button" id="btnsave" class="btn btn-primary">Save</button>
											<button type="button" id="btnclear" class="btn btn-danger">Clear</button>
					                    </div>

					                </form>
					                
							    </div><!--//col-->
						    </div><!--//row-->
					    </div><!--//table-utilities-->
				    </div><!--//col-auto-->
			    </div><!--//row-->
			</div>
			<div class="tab-content" id="orders-table-tab-content">

<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
	<div >
		<div class="row g-3 mb-4 align-items-center justify-content-between">
<br>
<div class="col-auto">
	 <div class="page-utilities">
		<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
			<div class="col-auto">
				<form class="table-search-form row gx-1 align-items-center" class="d-flex justify-content-center">

					<div class="col-auto">
						<span class="app-page-title mb-0">Total</span>
					  
					</div>
					<div class="col-auto">
					
						@foreach($total  as $total)
						<h3>	<span class="badge bg-danger"> $ {{$total->amount}} </span> </h3>
						
						@endforeach
					</div>
					


				</form>
				
			</div><!--//col-->
		</div><!--//row-->
	</div><!--//table-utilities-->
</div><!--//col-auto-->
</div><!--//row-->
</div>
<div >
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
									<table class="table mb-0 text-left" id="tbl_ex">
										<thead>
											<tr>
												@csrf
												<th class="cell">ID</th>
												<th class="cell">Bank</th>
												<th class="cell">Amount</th>
												<th class="cell">Description</th>
												<th class="cell">Date</th>
												<th class="cell">Action</th>
												
											</tr>
										</thead>
										<tbody>	
											<tr>
												@foreach($shincome as $shincomes)
											<th class="cell"><span class="truncate">{{$shincomes ->id}}</span></th>
											<th class="cell">{{$shincomes ->bank}}</th>
											<th class="cell"><span>$</span> {{$shincomes ->amount}}</th>
											<th class="cell">{{$shincomes ->description}}</th>
											<th class="cell">{{$shincomes ->date}}</th>
											<th>   
												<a href="#"  class="btn btn-primary"  id="edit">
												<i class="bi bi-pencil-square"></i>
												</a>
												
												<a href="#"  id="delete"   class="btn btn-danger"  data-toggle="modal" data-target="#exampleModal">
												<i class="bi bi-trash-fill" id="delete"></i>
												</a>
													</th>
											</tr>
											@endforeach
											
										</tbody>
									</table>
									
									<div class="">
										{{$shincome->links()}}
									</div>
						        </div><!--//table-responsive-->
								
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->	
			        </div><!--//tab-pane--> 
		    </div><!--//container-fluid-->
		
	    </div><!--//app-content-->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Expense</h5>
      </div>
      <div class="modal-body" id="id">
			<h3><span>Do you delete?</span></h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="ok">Okay</button>
      </div>
    </div>
  </div>
</div>
		<script>
         $(document).ready(function(){
          $.ajaxSetup({
            headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }});
					  
				$('#btnclear').click(function(){				
					if(confirm("Want to clear?")){
						/*Clear all input type="text" box*/
						$('#ex input[type="text"]').val('');
						/*Clear textarea using id */
						$('#ex #txtdate').val('');
					}					
				});
					  $("#btnsave").click(function(){
						
						var bank= $("#bank").val();
              			var amount = $("#txtamount").val();
						  var des = $("#txtdes").val();
						  var date = $("#txtdate").val();
						///alert(bank +""+date);
						$.post('setexpense',{bank:bank,amount:amount,des:des,date:date} ,function(result){
							alert("Success");
							window.location.href="expense";
						}

						)
					  })

					

					 
					  $("#tbl_ex").on("click","#edit",function(){
							var current_row = $(this).closest('tr');
							var id = current_row.find('th').eq(0).text();
							var bank = current_row.find('th').eq(1).text();
							var amount = current_row.find('th').eq(2).text();
							var des = current_row.find('th').eq(3).text();
							var date = current_row.find('th').eq(4).text();
							
							current_row.find('th').eq(1).html("<select id='newbank' class='form-select w-auto'>@foreach($banks as $bank)<option value='{{ $bank->bank_name }}'>{{ $bank->bank_name}}</option>@endforeach</select>");
							current_row.find('th').eq(2).html(" <input type='text' id='newamount' style='width:100px' value='"+amount+"'>");
							current_row.find('th').eq(3).html(" <input type='text' id='newdes' style='width:100px' value='"+des+"'>");
							current_row.find('th').eq(4).html(" <input type='date' id='newdate' style='width:100px' value='"+date+"'>");
							current_row.find('th').eq(5).html("<a href='#' class='btn btn-primary' id='savechange'><i class='bi bi-check-circle'></i> </a>   <a href='#'  id='cancel'  class='btn btn-danger' '><i class='bi bi-x-circle'></i></a>");

							
						$("#savechange").click(function(){
							var current_row=$(this).closest("tr");
							var idx = current_row.find("th").eq(0).text();
							var newbankx = $("#newbank").val();
							var newamountx = $("#newamount").val();
							var newdesx = $("#newdes").val();
							var newdatex = $("#newdate").val();

							$.post("updateex",{idx:idx,newbankx:newbankx,newamountx:newamountx,newdesx:newdesx,newdatex:newdatex},function(result){
									alert(result);
									window.location.href="expense";


							})


						});
						$("#cancel").click(function(){
							window.location.href="expense";
						});
						
						});

						$("#tbl_ex").on("click","#delete",function(){
			
							var current_row = $(this).closest('tr');
							var id = current_row.find('th').eq(0).text();
							
								
								$("#ok").click(function(){
									$.post("deleteex",{id:id},function(result){
										
										window.location.href="expense";
								})
			
						});
				
				});


			});
					
  


  		</script>



