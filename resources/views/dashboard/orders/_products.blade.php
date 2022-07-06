@if ( ($products))
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">Product</th>
            <th scope="col">quantity</th>
            <th scope="col">price</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td> {{ $product -> name }} </td>
            <td> {{ $product -> pivot -> quantity }} </td>
            <td> {{ number_format ($product -> pivot -> quantity * $product -> sale_price ) }} </td>

        </tr>
        @endforeach
    </tbody>
    <tfoot class="bold" style="background: #E9ECEF;">
        <tr>
            <td>
                Total price
            </td>
            <td colspan="2 text-align-">
              {{ $order -> total_price }}
            </td>
        </tr>
    </tfoot>
</table>

<div class="px-5 mb-3">
    <button class="btn btn-info text-center d-block w-100" >Print <i class="fa fa-plus"></i></button>
</div>
@else
<h5>No records</h5>
@endif
