@section('custom_js')

<script type="text/javascript">
		
	$(function(){

		var prod_id = $('#prod-id');
		var category_id = $('#category-id');
		var size = $('#size');
		var quantity = $('#quantity')
		getPrice();

		function getPrice()
		{
			var data = {
				product_id : prod_id.val(),
				category : category_id.find('option:selected').val(),
				size : size.find('option:selected').val(),
				quantity : $('#quantity option:selected').val()
			}

			let url  = `/pricing/${data.product_id}/${data.category}/${data.size}/${data.quantity}`;
			console.log(url)
			getAjax(url);
		}

		category_id.change((e) => {

			var data = {
				product_id : prod_id.val(),
				category : e.target.value,
				size : size.find('option:selected').val(),
				quantity : $('#quantity option:selected').val()
			}

			let url  = `/pricing/${data.product_id}/${data.category}/${data.size}/${data.quantity}`;
			console.log(url)
			getAjax(url);
		})

		$('#size').change((e) => {

			e.preventDefault();
			var data = {
				product_id : prod_id.val(),
				category : category_id.find('option:selected').val(),
				size : size.find('option:selected').val(),
				quantity : $('#quantity option:selected').val()
			}
			let url  = `/pricing/${data.product_id}/${data.category}/${data.size}/${data.quantity}`;
			console.log(url);
			getAjax(url);
		});

		$('select[name="quantity"]').change((e) => {

			e.preventDefault();
			var data = {
				product_id : prod_id.val(),
				category : category_id.find('option:selected').val(),
				size : size.find('option:selected').val(),
				quantity : e.target.value
			}
			let url  = `/pricing/${data.product_id}/${data.category}/${data.size}/${data.quantity}`;
			console.log(url)
			getAjax(url);
		})


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
});	
		

		
	
</script>
@endsection