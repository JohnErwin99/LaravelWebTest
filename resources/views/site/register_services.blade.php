@extends('layouts.layout')

@section('content')
{{-- <x-navbar/> --}}
<div class="container grey-text">
    <h5 class="yellow-text text-darken-2 center">Turn on the services you offer</h5>
    @foreach($services as  $service)
    <div class="card service-cards dep z-depth-2">
        <div class="card-title center yellow-text text-darken-2" >{{$service['service_name']}}</div>
        <div class="switch">
            <label>
                Off
                <input type="checkbox" id="{{$service['service_name']}}">
                <span class="lever modal-toggle" data-target="modal1"></span>
                On
            </label>
            <!-- Modal Trigger -->
        </div>

    </div>
    @endforeach
    <div class="btn-floating modal-toggle add-service" data-target="modal1">  <i class="material-icons">add</i> Add Service </div>
    <a class="waves-effect waves-light btn right yellow darken-2"> COMPLETE </a>
    <!-- Modal Structure -->
    <div id="modal1" class="modal #e6ee9c lime lighten-3">
        <div class="modal-content center">
            <div class="modal-form">
                <h4><label>Fill information for <span id="service-name"></span></label></h4>
                <div class="form-group">
                    <label for="duration">Service Price:</label>
                    <input required type="number" id="price" min="0.00" max="10000.00" step="0.5" value="00.00"/>
                    <small>CAD</small>
                </div>
                <div class="form-group">
                    <label for="duration">Service Duration:</label>
                    <input  type="number" id='h' name='h'  min='0' max='24' class="t" maxlength="4" value="0"/>
                    <small>hour(s)</small>
                    <input type="number" id='m' name='m' min='0' max='59' class="t" maxlength="4" value="0"/>
                    <small>min(s)</small>
                </div>
                <input type="hidden" name="service" id="service" value="">
            </div>

        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat yellow">Confirm</a>
        </div>
    </div>

    <!-- Modal Structure -->
    <div id="modal2" class="modal #e6ee9c lime lighten-3">
        <div class="modal2-content center">
            <div class="modal-form">
                <h4><label>Fill information for <span id="service-name"></span></label></h4>
                <div class="form-group">
                    <label for="duration">Service Price:</label>
                    <input required type="number" id="price" min="0.00" max="10000.00" step="0.5" value="00.00"/>
                    <small>CAD</small>
                </div>
                <div class="form-group">
                    <label for="duration">Service Duration:</label>
                    <input  type="number" id='h' name='h'  min='0' max='24' class="t" maxlength="4" value="0"/>
                    <small>hour(s)</small>
                    <input type="number" id='m' name='m' min='0' max='59' class="t" maxlength="4" value="0"/>
                    <small>min(s)</small>
                </div>
                <input type="hidden" name="service" id="service" value="">
            </div>

        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat yellow">Confirm</a>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elem = document.querySelector('.modal');
    var instances = M.Modal.init(elem);
    var instance = new M.Modal.getInstance(elem);
    $(':checkbox').change(function() {
        if(this.checked) {
            console.log(this.id)
            $('#service').val($('#service-name').html(this.id));

            instance.open();
        }
        else{
            instance.close();
        }

    });

    $('.add-service').on('click', function(){
        instance.open();
    })
  });
</script>
@endsection
