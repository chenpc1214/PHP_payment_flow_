<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<form class="container mx-auto w-25 pt-5" action="/purchases" method="post">

  <select name="productId" class="form-controller mt-3">
    @foreach($products as $product)
    <option value="{{$product->id}}">{{$product->name}}</option>
    @endforeach
  </select>

  <select  name="method" class="form-controller mt-3">
    <option value='atm'>銀行轉帳</option>
    <option value='card'>信用卡</option>
  </select>

  <button type="submit" class="btn btn-primary">純送出</button>
</form>