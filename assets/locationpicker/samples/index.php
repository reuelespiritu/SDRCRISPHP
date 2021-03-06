<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8"/>

    <title>placepicker</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"></link>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css" rel="stylesheet"></link>

    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?sensor=true&libraries=places">
    </script>

    <script src="../src/js/jquery.placepicker.js"></script>

    <script>

      $(document).ready(function() {

        // Basic usage
        $(".placepicker").placepicker();

        // Advanced usage
        $("#advanced-placepicker").each(function() {
          var target = this;
          var $collapse = $(this).parents('.form-group').next('.collapse');
          var $map = $collapse.find('.another-map-class');

          var placepicker = $(this).placepicker({
            map: $map.get(0),
            placeChanged: function(place) {
              console.log("place changed: ", place.formatted_address, this.getLocation());
            }
          }).data('placepicker');
        });

      }); // END document.ready

    </script>

   

  </head>

  <body>

    <header class="subhead" id="overview">
      <div class="container">
        <h1>jquery-placepicker</h1>
        <p class="lead">A simple placepicker component for the google-maps api.
        </p>
      </div>
    </header>

    <div class="container">

      <h1>Basic usage</h1>
      <div class="row" data-example>
        <div class="col-md-6">
          <div class="form-group">
            <input class="placepicker form-control" placeholder="Enter a location"/>
          </div>
        </div>
      </div>

     
       </div>

  
  </body>

</html>
