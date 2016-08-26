<?php
/* Template Name: Google Sheets Test */



//https://script.google.com/macros/s/AKfycbzj-V_N9jVU_dFB2t3fbONd2ABRc1K-qDzANph5i3bzGhR9UwVA/exec

?>
<html>
<head>
	<title>Google Sheets Test</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script>

    jQuery(function() {

        



        $.ajax({
            url: "https://script.google.com/macros/s/AKfycbzj-V_N9jVU_dFB2t3fbONd2ABRc1K-qDzANph5i3bzGhR9UwVA/exec",
            type: "post",
            data: {
                instagram: "#TestHandleFinal",
                email: "test@test.com",
                location: "Los Angeles",
                category: "Beauty"
            }
        });


        alert('yo');


    });
    </script>
</head>
<body>

Google Sheets Test


</body>
</html>