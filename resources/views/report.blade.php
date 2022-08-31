@include('header')


<div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
                <div class="col-auto">
                    <table  id="sum_table">

					<tbody>
					<tr>
						<td><span class="app-page-title mb-0">Expense </span></td> 
						<td class="amount">	
								@foreach($total  as $total)
								<h3><span class="badge bg-danger">	 {{$total->amount}} </span> </h3>
					  			@endforeach
							</td>
							
					</tr>
					<tr>
					<td><span class="app-page-title mb-0">Income </span></td>
					<td class="amount">
								@foreach($total1  as $total)
									<h3><span class="badge bg-danger"> {{$total->amount}}</span> </h3>
								@endforeach
							</td>
					</tr>
					<!-- <tfoot>
							<tr>
								<td><span class="app-page-title mb-0">Total</span></td>
							</tr>
					</tfoot>
					 -->
					</tbody>

				</table>
					  
					
						

						
						
				
					 
				 

					

                    
                

        </div>
 </div>

 <script>
          $(document).ready(function() {
            $('table thead th').each(function(i) {
                calculateColumn(i);
            });
        });

        function calculateColumn(index) {
            var total = 0;
            $('table tr').each(function() {
                var value = parseInt($('td', this).eq(index).text());
                if (!isNaN(value)) {
                    total += value;
                }
            });
            $('table tfoot td').eq(index).text('Total: ' + total);
        }
  


  		</script>

