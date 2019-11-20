@section('custom_js')
<script type="text/javascript">

	$(function(){

		let size = $('#size')
		let url = `/api/get-quantity/${size.val()}`
		$.get(url, function(data){
			optionData(data);
			initialCalculation();
		})


		//events
		size.change((e) => {

			let url = `/api/get-quantity/${e.target.value}`
			$.get(url, function(data){
				optionData(data)
				calculation(e.target.value, $('#quantity option:selected').val())
			})
		})

		$('#quantity').change((e) => {
			calculation(size.val(), e.target.value)
		})

	});

	function optionData(data){

		$('#quantity').empty()
		data.forEach((index, value) => {
			$('#quantity').append(`<option value=${index.quantity}>${index.quantity}</option>`)
		});

	}
	function calculation(size, qty)
	{
		let url = `/api/get-price/${size}/${qty}`
		$.get(url, function(data){
			$('.prod_price').html(data)
			$('input[name="price"]').val(data)
		})
	}
	function initialCalculation()
	{
		let data = {
			size : $('#size').val(),
			quantity : $('#quantity option:selected').val()
		}
		calculation(data.size, data.quantity);
	}
</script>
@endsection