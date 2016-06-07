@extends('layouts.master')

@section('content')

<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <hr>
            <h2 class="intro-text text-center">Contribute
                <strong>Here</strong>
            </h2>
            <hr>
        </div>

        <div class="clearfix"></div>
    </div>
</div>

<div class="row">
    <div class="box">
        <div class="col-lg-12">
            <div class="trip_plan_search">
                <ul class="nav nav-tabs contribute test-trip">
                    <li class="active"><a class="icon_tab" data-toggle="tab" title="Tourist Spot" href="#tour_spot"><img 
                        src="icons/tourist_spot.PNG" alt="Tourist Spot"></a></li>
                    <li><a class="icon_tab" data-toggle="tab" title="Accommodation" href="#accommodation"><img 
                      src="icons/accommodation.PNG" alt="Accommodation"></a></li>
                    <li><a class="icon_tab" data-toggle="tab" title="Transport" href="#transport"><img 
                      src="icons/transport.PNG" alt="Transport"></a></li>
                    <li><a class="icon_tab" data-toggle="tab" title="Restaurant" href="#restaurant"><img 
                      src="icons/restaurant.PNG" alt="Restaurant"></a></li>
                    <li><a class="icon_tab" data-toggle="tab" title="Restaurant" href="#guide"><img 
                      src="icons/restaurant.PNG" alt="Restaurant"></a></li>

                      
                </ul>
            
                <div class="tab-content">
                  <div id="tour_spot" class="tab-pane fade in active">
                    <h3>Add a Tourist Spot</h3>
                    @include('forms.add_tourist_spot')
                  </div>
                  
                  <div id="accommodation" class="tab-pane fade">
                    <h3>Find an Accommodation</h3>
                    @include('forms.add_accommodation')
                    
                  </div>

                  <div id="transport" class="tab-pane fade">
                    <h3>Find a Transport</h3>
                    @include('forms.add_transport')
                    
                  </div>

                  <div id="restaurant" class="tab-pane fade">
                    <h3>Find a Restaurant</h3>
                    @include('forms.add_restaurant')
                    
                  </div>
                    
                <div id="guide" class="tab-pane fade">
                    <h3>Add a guide</h3>
                    @include('forms.add_guide')                    
                </div>

                </div>
            </div><!--trip plan search complete-->

        </div>

        <div class="clearfix"></div>
    </div>
</div>



@stop