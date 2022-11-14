<div class="modal fade text-left" id="edit{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Edit Room ( {{$item->name}} )</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('rooms.update',['room'=>$item->id])}}" method="POST">
                @csrf
                @method('put')
                <div class="modal-body">
                    <label>Room Name </label>
                   <div class="form-group">
                        <input type="text" value="{{$item->name}}" name="name" placeholder="Property Name" required class="form-control" id="">
                   </div>

                    <input type="hidden" name="property" value="{{config('settings.default_property')->id}}" id="">

                    <label> Rent Amount </label>
                    <div class="form-group">
                        <input type="number" value="{{$item->rent}}" name="rent" required placeholder="e.g 5000"  class="form-control" />
                    </div>

                    <label>Room Status </label>
                    <div class="form-group">
                        <select name="status" required class="form-control" id="">
                            <option value={{$item->status}}>{{$item->status}}</option>
                            <option value="Vacant">Vacant</option>
                            <option value="Occupied">Occupied</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update </button>
                </div>
            </form>
        </div>
    </div>
</div>