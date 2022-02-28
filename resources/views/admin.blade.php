@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="height:250px;">
                <div class="card-header" >{{ __('Add new task') }}</div>
                
                <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
                   @csrf
                <div class="card-body" >
                    {{-- @if (session('status')) --}}
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            
                            <div class="row" style="height:150px;">
                                <div class="form-group col-md-6">
                                    <label>selsect member </label>
                                    <select name="team_id" class="form-control" aria-label="Default select example">
                                        <option>select your team</option>
                                        @foreach($teams as $team)
                                       
                                        <option value="{{$team->id}}">{{$team['name']}}</option>
                                        
                                        @endforeach
                                        @if($errors->has('team_id'))
                                        <div class="alert alert-danger">{{$errors->first('team_id')}}</div>
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label>selsect member </label>
                                    <input name="date" id="date" class="date form-control" type="text" readonly>
                                    @if($errors->has('date'))
                                    <div class="alert alert-danger">{{$errors->first('date')}}</div>
                                    @endif
                                </div>

                                <div class="form-group col-md-8">
                                    <label>description</label>
                                    <textarea class="form-control" style="width: 200px; height: 8px;" id="editor2" name="desc" rows="4" cols="50"></textarea>
                                    @if($errors->has('desc'))
                                    <div class="alert alert-danger">{{$errors->first('desc')}}</div>
                                    @endif

                                </div>
                                <button type="submit" class="col-md-1 btn btn-secondary btn-sm" style="font-size: 16px; height: 30px;" >{{trans('add')}}</button>
                             
                               
                            </div>
                                </div>
                               
                        

                    
                </div>
            
                </form>
            </div>
            <div class="overflow-auto" style="height:300px;overflow-y:scroll;">
                <div class="row justify-content-center" >
                    <div class="card">
                      Tasks
                    </div>
                    @foreach($tasks as $task)
                        <div class="card-body scroll" style="background: rgb(187, 186, 186) ; margin-bottom: 1rem;">
                           
                        <h5 class="card-title">{{ $task->team->name }}  </h5>
                        <p class="card-text">{{ $task->date}}</p>
                        <p class="card-text">{{ $task->desc }}</p>
                        @if($task['done']=='no')
                        <input name="done" type="checkbox" id="task_done">Mark as done</label> 
                        @else
                        <p class="card-text-red">{{ $task->done='done' }}</p>

                            @endif    
                           
                        
                        </div>
                    @endforeach
                  </div>
            </div>
        
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

 <script>
        $(".List").click(function(){
            $("#selectall-tag > option").prop("selected","selected");
            $("#selectall-tag").trigger("change");
        });
        $("#deselectbtn-tag").click(function(){
            $("#selectall-tag > option").prop("selected","");
            $("#selectall-tag").trigger("change");
        });

        $(document).ready(function () {
            $('.select2').select2();
        });

       
});
    </script>
<script>

$(document).on('change', '.done-checkbox', function (event) {
              event.preventDefault();
              var ID = $(this).attr('value');

              if (ID) {
                  Change_Status(ID);
              }
          });

          function Change_Status(ID) {
              $.ajax({
                  url: url("/update"),
                  type: 'post',
                  data: {
                      task_id: ID,
                  },
                //   success: function (res) {
                //       if (res.success) {
                //           toastr_success(res.message)
                //       }
                //   }
              });
          }
</script>

@endsection

