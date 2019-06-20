

<style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
</style>

<div id="wrap-inner">
       
        <div id="khach-hang">
            <h3>Thông tin khách hàng</h3>
            <p>
                <span class="info">Khách hàng: </span>
                {{$info['name']}}
            </p>
            <p>
                <span class="info">Email: </span>
                {{$info['email']}}
            </p>
            <p>
                <span class="info">Số điện thoại: </span>
                {{$info['number']}}
            </p>
            <p>
                <span class="info">Địa chỉ: </span>
                {{$info['address']}}
            </p>
           
        </div>	      				
        <h2>Hoá đơn mua hàng</h2>
    
        
        <table style="width:100%">
          <tr>
            <th>Sản phẩm</th>
            <th>Giá(VNĐ)</th>
            <th>Số lượng</th> 
            <th>Thành tiền</th>
          </tr>
          @foreach ($product_data as $product)
              
        
          <tr>
            <td>{{$product->name}}</td>
            <td>  {{number_format($product->price,0 ,',','.')}}đ</td>
            <td>{{$product->qty}}</td>
          <td>  {{number_format($product->price*$product->qty,0 ,',','.')}}đ</td>
          </tr>
          @endforeach
        </table>
        <h3>Tổng cộng: {{$total_price}}</h3>
    </div>				
    