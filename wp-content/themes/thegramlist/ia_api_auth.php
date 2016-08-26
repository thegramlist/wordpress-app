<?php
/* Template Name: Instagram API Auth 1 */


// https://api.instagram.com/oauth/authorize/?client_id=e86dfc7bf03840c794ecef519c25a61d&redirect_uri=http://52.204.200.107/ig-api-auth/&response_type=code


// https://api.instagram.com/oauth/authorize/?client_id=e86dfc7bf03840c794ecef519c25a61d&redirect_uri=http://52.204.200.107/ig-api-auth/&response_type=token

// https://api.instagram.com/v1/users/carriagehousebirth/?access_token=3295429789.e86dfc7.f3d465f6d5d4407490a79ce45371cbdc

// {"access_token": "3295429789.e86dfc7.f3d465f6d5d4407490a79ce45371cbdc", "user": {"username": "meyer.russell", "bio": "", "website": "", "profile_picture": "https://scontent.cdninstagram.com/t51.2885-19/13267402_264744393915620_1770099075_a.jpg", "full_name": "Russell Meyer", "id": "3295429789"}} 



// https://api.instagram.com/v1/users/search?q=carriagehousebirth&access_token=3295429789.e86dfc7.f3d465f6d5d4407490a79ce45371cbdc


if( isset($_GET["code"]) ){
	$ig_redirect_code = $_GET["code"];
}
?>
<html>
<head>
	<title>Instagram API</title>
</head>
<body>


<?php if( isset( $ig_redirect_code ) ){ ?>

Instagram API<br>
Redirected Code: <?php echo $ig_redirect_code; ?><br><br>

<?php
$ch = curl_init();

$postData = array(
    'client_id' => 'e86dfc7bf03840c794ecef519c25a61d',
    'client_secret' => '2947d38d51984900a222ce7e26146411',
    'grant_type' => 'authorization_code',
    'redirect_uri' => 'http://52.204.200.107/ig-api-auth/',
    'code' => $ig_redirect_code
);

curl_setopt_array($ch, array(
    CURLOPT_URL => 'https://api.instagram.com/oauth/access_token',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData,
    CURLOPT_FOLLOWLOCATION => true
));

$output = curl_exec($ch);
echo $output;

?>




<?php } else { ?>

Code not set!

<?php } ?>

</body>
</html>