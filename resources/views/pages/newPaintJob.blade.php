@extends('layout.app')

@section('content')
    <div class="panel">
        <div class="panel-header">
            <h4>New Paint Job</h4>
        </div>
        <div class="panel-body">
            <div class="car-photo">
                <div class="current-color-photo">
                    <img id="curCar" src="{{ asset('photo/defaultCar.PNG') }}" alt="">
                </div>
                <div class="arrow-photo">
                    <img src="{{ asset('photo/arrowCar.PNG') }}" alt="">
                </div>
                <div class="target-color-photo">
                    <img id="tarCar" src="{{ asset('photo/defaultCar.PNG') }}" alt="">
                </div>
            </div>
            <div class="car-details">
                    <h3>Car Details</h3>

                    <div class="car-details-item">
                        <label for="">Plate No.</label>
                        <input type="text" name='plateNo' placeholder="Enter Plate No.">
                    </div>
                    
                    <div class="car-details-item">
                        <label for="">Current Color</label>
                        <select name="curColor" id="curColor">
                            <option value="">--</option>
                            <option value="Blue">Blue</option>
                            <option value="Red">Red</option>
                            <option value="Green">Green</option>
                        </select>
                    </div>

                    <div class="car-details-item">
                        <label for="">Target Color</label>
                        <select name="tarColor" id="tarColor">
                            <option value="">--</option>
                            <option value="Blue">Blue</option>
                            <option value="Red">Red</option>
                            <option value="Green">Green</option>
                        </select>
                    </div>

                    <div class="car-details-button">
                        <button id="btnSubmit" type="button" class='btn btn-submit'>
                            Submit
                        </button>
                    </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){

            $('#btnSubmit').click(function(){
                
            });

            $('#curColor').change(function(){
                switch($(this).val()){
                    case 'Blue':
                        $('#curCar').attr('src','{{ asset('photo/blueCar.PNG') }}');
                        break;

                    case 'Red':
                        $('#curCar').attr('src','{{ asset('photo/redCar.PNG') }}');
                        break;

                    case 'Green':
                        $('#curCar').attr('src','{{ asset('photo/greenCar.PNG') }}');
                        break;

                    default:

                        $('#curCar').attr('src','{{ asset('photo/defaultCar.PNG') }}');
                        break;
                }
            })

            $('#tarColor').change(function(){
                switch($(this).val()){
                    case 'Blue':
                        $('#tarCar').attr('src','{{ asset('photo/blueCar.PNG') }}');
                        break;

                    case 'Red':
                        $('#tarCar').attr('src','{{ asset('photo/redCar.PNG') }}');
                        break;

                    case 'Green':
                        $('#tarCar').attr('src','{{ asset('photo/greenCar.PNG') }}');
                        break;

                    default:

                        $('#tarCar').attr('src','{{ asset('photo/defaultCar.PNG') }}');
                        break;
                }
            })
        })
    </script>
@endsection