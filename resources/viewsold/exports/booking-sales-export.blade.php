<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Date of booking</th>
            <th>Subtotal</th>
            <th>Discount</th>
            <th>Sales Tax</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bookingWithTotalSales as $booking)
        <tr>
            <td>
                {{ $booking['name'] }}
            </td>
            <td>
                {{ $booking['date'] }}
            </td>
            <td>
                {{ $booking['Subtotal'] }}
            </td>
            <td>
                {{ $booking['Discount'] }}
            </td>
            <td>
                {{ $booking['HST'] }}
            </td>
            <td>
                {{ $booking['Total'] }}
            </td>
           
        </tr>
        @endforeach
    </tbody>
</table>
