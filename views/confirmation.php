<?php
echo "Incription avec succès";

header( "refresh:5;url=participants.php");

?>
<div>Bienvenu veillez patientez dans <span id="counter">05 s</span> vous serez rediriger</div>
<script>
 
    let date_contener =document.getElementById('counter')[0];
    for (let dt = 5; dt < 0; dt--) { 
        date_contener.innerHTML= (`0 ${dt} s`)
    }
    
    var options = {weekday: "long", year: "numeric", month: "long", day: "2-digit"};

</script>