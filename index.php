<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8" />
        <title>House Alarm</title>
    </head>

    <body style="background-color: white;">
    <!-- House picture -->

    <html>
      <body>
        <center>
          <svg id='floorplan' width='750' height='800'>
            <!-- Utility -->
            <rect x='100' y='100' width='120' height='180' style='fill:rgb(255,255,255);stroke:#111111;stroke-width:5;opacity:1' />

            <!-- Kitchen -->
            <rect id='kitchen' x='220' y='100' width='240' height='180' style='fill:rgb(255,255,255);stroke:#111111;stroke-width:5;opacity:1' />

            <!-- Lounge -->
            <rect id='lounge' x='460' y='100' width='240' height='400' style='fill:rgb(255,255,255);stroke:#111111;stroke-width:5;opacity:1' />

            <!-- Dining room -->
            <rect x='100' y='280' width='190' height='220' style='fill:rgb(255,255,255);stroke:#111111;stroke-width:5;opacity:1' />

            <!-- Hall -->
            <rect id='hall' x='290' y='280' width='170' height='220' style='fill:rgb(255,255,255);stroke:#111111;stroke-width:5;opacity:1' />

            <!-- WC -->
            <rect x='290' y='280' width='57' height='110' style='fill:rgb(255,255,255);stroke:#111111;stroke-width:5;opacity:1' />

            <!-- Stairs -->
            <rect x='410' y='280' width='49' height='15' style='fill:rgb(255,255,255);stroke:#111111;stroke-width:2;opacity:1' />
            <rect x='410' y='295' width='49' height='15' style='fill:rgb(255,255,255);stroke:#111111;stroke-width:2;opacity:1' />
            <rect x='410' y='310' width='49' height='15' style='fill:rgb(255,255,255);stroke:#111111;stroke-width:2;opacity:1' />
            <rect x='410' y='325' width='49' height='15' style='fill:rgb(255,255,255);stroke:#111111;stroke-width:2;opacity:1' />
            <rect x='410' y='340' width='49' height='15' style='fill:rgb(255,255,255);stroke:#111111;stroke-width:2;opacity:1' />
            <rect x='410' y='355' width='49' height='15' style='fill:rgb(255,255,255);stroke:#111111;stroke-width:2;opacity:1' />
            <rect x='410' y='370' width='49' height='15' style='fill:rgb(255,255,255);stroke:#111111;stroke-width:2;opacity:1' />
            <rect x='410' y='385' width='49' height='15' style='fill:rgb(255,255,255);stroke:#111111;stroke-width:2;opacity:1' />
            <rect x='410' y='400' width='49' height='15' style='fill:rgb(255,255,255);stroke:#111111;stroke-width:2;opacity:1' />

            <!-- Landing -->
            <rect id='landing' x='290' y='530' width='170' height='60' style='fill:rgb(255,255,255);stroke:#111111;stroke-width:5;opacity:1' />

            <!-- Doors -->
            <!-- Front door -->
            <line x1="380" y1="500" x2="340" y2="475" stroke="black" stroke-width="3" />

            <!-- Back door -->
            <line x1="190" y1="100" x2="150" y2="125" stroke="black" stroke-width="3" />

            <!-- Kitchen / Utility door -->
            <line x1="220" y1="230" x2="210" y2="260" stroke="black" stroke-width="3" />

            <!-- Kitchen / Dining door -->
            <line x1="230" y1="280" x2="265" y2="260" stroke="black" stroke-width="3" />

            <!-- Hall / Dining door -->
            <line x1="290" y1="395" x2="310" y2="430" stroke="black" stroke-width="3" />

            <!-- Hall / Lounge door -->
            <line x1="460" y1="480" x2="480" y2="445" stroke="black" stroke-width="3" />

            <!-- Hall / Kitchen door -->
            <line x1="395" y1="280" x2="360" y2="300" stroke="black" stroke-width="3" />

            <!-- WC door -->
            <line x1="345" y1="360" x2="330" y2="335" stroke="black" stroke-width="3" />

            <!-- Patio door L -->
            <line x1="545" y1="100" x2="580" y2="80" stroke="black" stroke-width="3" />

            <!-- Patio door R -->
            <line x1="590" y1="80" x2="625" y2="100" stroke="black" stroke-width="3" />

            # Add some text labels...
            <!-- text x='195' y='100' font-family='Verdana' fill='black' transform='rotate(90 238,180)' -->
            <text x='305' y='325' font-family='Verdana' fill='black'>WC</text>
            <text x='275' y='80' font-family='Verdana' font-size='26' fill='black'>Brownton Abbey</text>
            <text x='355' y='450' font-family='Verdana' fill='black'>Hall</text>
            <text x='550' y='300' font-family='Verdana' fill='black'>Lounge</text>
            <text x='310' y='200' font-family='Verdana' fill='black'>Kitchen</text>
            <text x='165' y='400' font-family='Verdana' fill='black'>Dining</text>
            <text x='140' y='200' font-family='Verdana' fill='black'>Utility</text>
            <text x='345' y='565' font-family='Verdana' fill='black'>Landing</text>

            Sorry, your browser does not support inline SVG.
            </svg>

    <!-- javascript -->

<script>

function checkPin ( room ) {
    var data = 0;
    // Send the room number to gpio.php to poll for changes
    var request = new XMLHttpRequest();
    request.open( "GET" , "gpio.php?room=" + room, true);
    request.send(null);

    // Receive information back...
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            data = request.responseText;

            // Establish what room (for setting the element ID later)
            if (room == 1) { var where="kitchen"; }
            else if (room == 4) { var where = "lounge"; }
            else if (room == 15) { var where = "hall"; }
            else if (room == 16) { var where = "landing"; }

            if ( !(data.localeCompare("0")) ) {
                document.getElementById(where).style = "fill:rgb(0,255,0);stroke:#111111;stroke-width:5;opacity:1";
                // alert ("movement");
            } else {
                document.getElementById(where).style = "fill:rgb(255,255,255);stroke:#111111;stroke-width:5;opacity:1";
            }

            if ( !(data.localeCompare("fail"))) {
                alert ("Something went wrong in gpio.php!" );
                return ("fail");
            }
        }
    }

    return 0;
}

  // Set each sensor to be polled every quarter of a second.
  var int = self.setInterval(checkPin, 250, 15);
  var int = self.setInterval(checkPin, 250, 16);
  var int = self.setInterval(checkPin, 250, 1);
  var int = self.setInterval(checkPin, 250, 4);
</script>

</body>
</html>
