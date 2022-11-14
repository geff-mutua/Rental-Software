<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Tenant</th>
            
            <th>Rent</th>
           
            <th>bf</th>
            <th>Total</th>
            <th>Paid</th>
            <th>Balance</th>
            <th>Month</th>
            
        </tr>
    </thead>
    <tbody>
        @forelse ($statements as $item)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$item->tenant->name}}</td>
                <td>{{number_format($item->rent)}}</td>
                <td>{{number_format($item->bf)}}</td>
                <td>{{number_format($item->total)}}</td>
                <td>{{number_format($item->paid)}}</td>
                <td>{{number_format($item->balance)}}</td>
                <td>{{$item->month}}-{{$item->year}}</td>
                
            </tr>
        
        @empty
          
        @endforelse
    </tbody>
   
  </table>