@include('header')
<!DOCTYPE html>
<html lang="en"> 
<head>    

    
</head> 

<body class="app">   	
    
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">

				<div class="tab-content" id="orders-table-tab-content">

			        <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
						<div >
							<h3 class="app-page-title mb-0">Set Bank</h3>
							<div class="row g-3 mb-4 align-items-center justify-content-between">
<br>
				    <div class="col-auto">
					     <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							    <div class="col-auto">
								    <form class="table-search-form row gx-1 align-items-center" class="d-flex justify-content-center">
									<div class="col-auto">
										<span class="app-page-title mb-0">Bank</span>
										<input type="text" id="txtbank"  class="form-control" placeholder="Bank Name">
										</div>
					                    <div class="col-auto">
											<span class="app-page-title mb-0">Account ID</span>
					                        <input type="text" id="txtaccnum"  class="form-control" placeholder="Account ID">
					                    </div>
										<div class="col-auto">
											<span class="app-page-title mb-0">Account Name</span>
					                        <input type="text" id="txtaccname" name="searchorders" class="form-control " placeholder="Account Name">
					                    </div>

					                    <div class="mr-auto p-2">
											<br>
											
					                        <button type="button" id="btnsave" class="btn btn-primary">Save</button>
											<button type="button" id="btnclose" class="btn btn-danger">Close</button>
					                    </div>

					                </form>
					                
							    </div><!--//col-->
						    </div><!--//row-->
					    </div><!--//table-utilities-->
				    </div><!--//col-auto-->
			    </div><!--//row-->
			   
						</div>
					    <div class="app-card app-card-orders-table shadow-sm mb-5">
						    <div class="app-card-body">
							    <div class="table-responsive">
							        <table class="table app-table-hover mb-0 text-left">
										<thead>
											<tr>
												<th class="cell">ID</th>
												<th class="cell">Bank Name</th>
												<th class="cell">Account Number</th>
												<th class="cell">Accunt Name</th>
											</tr>
										</thead>
										<tbody>	
										@foreach($show as $shows)
										<tr>
											<th class="cell">{{$shows -> bank_id }}</th>
											<th class="cell">{{$shows -> bank_name }}</th>
											<th class="cell">{{$shows -> acc_num}}</th>
											<th class="cell">{{$shows -> acc_name }}</th>
										</tr>
										@endforeach	
				
										</tbody>
									</table>
									
						        </div><!--//table-responsive-->
						    </div><!--//app-card-body-->		
						</div><!--//app-card-->	
			        </div><!--//tab-pane--> 
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->


		<script>
         $(document).ready(function(){
          $.ajaxSetup({
            headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }});
					  

					  $("#btnsave").click(function(){
						var bank= $("#txtbank").val();
						var accnum= $("#txtaccnum").val();
              			var accname = $("#txtaccname").val();
						 
						alert(accname +""+accnum+""+bank);
						$.post('setbank',{ bank:bank,accnum:accnum,accname:accname} ,function(result){
							//alert(result);
							window.location.href="setbank";
						})

					  })

					  $("#btnclose").click(function(){
							alert("test");

					  })


		          
					});
  


  		</script>


</body>
</html> 

