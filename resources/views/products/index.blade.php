<h1>Welcome</h1>
<h2>All Product</h2>
@foreach($products as $product)
  <p> Product ID: {{$product-> productID}} </p>
@endforeach
