@section('custom_js')

<script type="text/javascript">
	
	
	$(function(){

		var size = $('#size option:selected').val();
		var qty  = $('#quantity option:selected').val();

		getPrice();

		function getPrice()
		{
			let url  = `/pricing/${size}/${qty}`;

			getAjax(url);
		}
		
		function getAjax(url)
		{
			return $.ajax({

				method : 'GET',
				url : url,
				success : function(res){

					$('.prod_price').html(res);
					$('.prod_price').val(res);
				},
				error : function(error){
					console.log(error)
				}
 			})
		}

		$('#size').change((e) => {

			e.preventDefault();

			let new_size = e.target.value;
			let url = `/pricing/${new_size}/${qty}`;

			getAjax(url);
		});

		$('select[name="quantity"]').change((e) => {

			e.preventDefault();
			let new_qty = e.target.value;
			let url = `/pricing/${size}/${new_qty}`;
			getAjax(url);
		})
	});
</script>
@endsection