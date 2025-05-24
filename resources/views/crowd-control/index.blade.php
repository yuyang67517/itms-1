@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="display-4">Crowd Control</h1>
    <br>

    <!-- Real-Time Display -->
    @if ($latestData)
    <div class="row">
        <div class="col-md-6">
            <h2>Real-Time Information</h2>
            <br>
            
            <p>Current Total Entered: {{ $latestData->entered }}</p>
            <p>Current Total Exited: {{ $latestData->exited }}</p>
            <p style="font-weight: bold; color: red;">Current Number of People Inside: {{ $latestData->current_inside }}</p>
            <!-- Add a null check for $latestData->timestamp -->
            @if ($latestData->timestamp)
            <p style="font-weight: bold; color: red;">Last Update: {{ $latestData->timestamp }}</p>
            @endif
            <p>Updated by: {{ $latestData->user->name }}</p>
        </div>
        <div class="col-md-6">
     
            <h2>Crowd Info</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Current Number</th>
                        <th>Crowdiness</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Below 100</td>
                        <td>Nothing</td>
                    </tr>
                    <tr>
                        <td>100-200</td>
                        <td>Not crowd</td>
                    </tr>
                    <tr>
                        <td>200-300</td>
                        <td>Crowd</td>
                    </tr>
                    <tr>
                        <td>More than 300</td>
                        <td>Very Crowd</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @endif
    <br>
    <br>
    <br>
    <h2>Update Number Here</h2>
    <!-- Data Entry Form -->
    <form action="{{ route('crowd-control.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="entered">Number of People Entered</label>
            <input type="number" name="entered" id="entered" class="form-control">
        </div>
        <div class="form-group">
            <label for="exited">Number of People Exited</label>
            <input type="number" name="exited" id="exited" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

    

 
<div class="row mt-4">
    <div class="col-md-12">
        <div class="alert alert-info">
            <h3 class="mb-4">Current Information</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="info-box">
                        <h4>Last Updated Time</h4>
                        <!-- Add a null check for $latestData->timestamp -->
                        @if ($latestData->timestamp)
                        <p>{{ $latestData->timestamp }}</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box">
                        <h4>Current Number of People Inside:</h4>
                        <p>{{ $latestData->current_inside }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box">
                        <h4>Estimated Waiting Time</h4>
                        <p>
                            @php
                            $currentInside = $latestData->current_inside;
                            $waitingTime = 0;

                            if ($currentInside > 250 && $currentInside <= 300) {
                                $waitingTime = 10;
                            } elseif ($currentInside > 300 && $currentInside <= 350) {
                                $waitingTime = 15;
                            } elseif ($currentInside > 350) {
                                $waitingTime = 25;
                            }

                            echo $waitingTime . ' minutes';
                            @endphp
                        </p>
                    </div>
                </div>
            </div>

        </div>
        <a href="/fullscreen" class="btn btn-primary mt-4">Display Fullscreen</a>

    </div>

</div>

          
    
</div>

<script>
@endsection    
