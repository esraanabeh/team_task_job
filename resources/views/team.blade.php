@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           
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
                      <form action="{{ route('task_done') }}">
                                <input name="done" type="checkbox" id="task_done">Mark as done</label> 
                        
                      </form>
                        
                        </div>
                    @endforeach
                  </div>
            </div>
        
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>

   $('#task_done').on('change', function (){
    var $this = $(this);
    var token = '<?php echo csrf_token(); ?>';
    
    $.ajax({
            
        data: {
            idTask: $this.attr('task_done'),
            checkboxStatus: $this.val(),
            _token: token,
        },
        url: {!! route('task_done') !!},
        type: 'POST',
        dataType: 'json'
    });
});
</script>

@endsection

