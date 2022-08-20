<h1>Order from: {{$order->getUserInfo->name}}</h1>
<div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th scope="col">Client</th>
                <th scope="col">Hotel Name</th>
                <th scope="col">Country</th>
                <th scope="col">Price</th>
                <th scope="col">Duration</th>
                <th scope="col">Order Status</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td class="text-center">{{$order->getUserInfo->name}}</td>
                <td class="text-center">{{$order->getHotelInfo->hotel_name}}</td>
                <td class="text-center">{{$order->getHotelInfo->getCountryInfo->country_name}}</td>
                <td class="text-center">$ {{$order->getHotelInfo->price}}</td>
                <td class="text-center">{{$order->getHotelInfo->duration}} days</td>
                <td class="text-center">{{$order->status}}</td>
            </tr>
        <tbody>
    </table>
</div>
