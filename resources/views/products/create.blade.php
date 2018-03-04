@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="col-md-offset-3 col-md-6">
			<div class="well">
				<h2>Add Product</h2>
			  <form method="POST" action="{{ url('products')}}">
				<!-- Name of the product-->
        {{ csrf_field() }}
				<div class="form-group">
				  <label for="name">Name:</label>
				  <input type="text" class="form-control" id="productName" placeholder="Enter product name" name="productName">
				</div>

				<!-- Description of the product-->
				<div class="form-group">
				  <label for="description">Description:</label>
				  <textarea class="form-control" rows="5" id="productDescription" name="productDescription" placeholder="Enter product description"></textarea>
				</div>

				<!-- Category DropDown -->
				<div class="form-group">
					<label for="category">Category:</label>
					<select class="form-control" id="productCategory" name="productCategory">
						<option>category1</option>
						<option>category2</option>
						<option>category3</option>
						<option>category4</option>
					</select>
				</div>

				<!-- Required Item -->
				<div class="form-group">
				<label for="requiredItem">Required Item:</label>
				<span class="label label-primary">Primary</span>
				<span class="label label-primary">Secondary</span>
				<span class="label label-primary">Tertiary</span>
				</div>

				<!-- Product ID -->
				<div class="form-group">
				  <label for="productid">Product ID:</label>
				  <input type="text" class="form-control" id="productID" placeholder="Enter product id" name="productID">
				</div>

				<!-- Submit Button-->
				<button type="submit" class="btn btn-default">Submit</button>
			  </form>
			</div>
		</div>
	</div>

@endsection
