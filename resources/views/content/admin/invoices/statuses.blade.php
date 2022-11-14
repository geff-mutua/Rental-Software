@if($value->status=='Pending')

    <td class="text-warning">{{$value->status}}</td>

@elseif($value->status == 'Partially Paid' )

    <td class="text-info">{{$value->status}}</td>

@elseif($value->status =='Paid' )

    <td class="text-success">{{$value->status}}</td>

@elseif($value->status == 'OverPaid')

    <td class="text-danger">{{$value->status}}</td> 

@endif
