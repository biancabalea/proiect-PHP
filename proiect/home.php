<?php 
session_start();
include("php/config.php");

if(!isset($_SESSION['valid'])){
    header("Location: index.php");
    exit;
}

$id = $_SESSION['id'];
$query = mysqli_query($con, "SELECT * FROM users WHERE Id=$id");

while($result = mysqli_fetch_assoc($query)){
    $res_Uname = $result['Username'];
    $res_Email = $result['Email'];
    $res_id = $result['Id'];
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>CV - <?php echo $res_Uname; ?></title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">CV Balea Bianca Andreea</a></p>
        </div>
        <div class="right-links">
            <a href="php/logout.php"><button class="btn">Log Out</button></a>
        </div>
    </div>

    <main>
        <div class="main-box top">
            <div class="top">
                <div class="box">
                    <p>Bună <b><?php echo $res_Uname; ?></b>, Îți voi prezenta CV-ul meu</p>
                </div>
            </div>
        </div>

        <div class="main-box">
            <h2>Informații Personale</h2>
            <p><b>Nume:</b> Balea Bianca Andreea</p>
            <p><b>Email:</b> baleabianca01@gmail.com</p>
        </div>

        <div class="main-box">
            <h2>Educație</h2>
            <p>2016-2020</p>
            <p>Colegiul Tehnic Forestier Câmpina — profil Științele Naturii</p>
            <p>2020-prezent</p>
            <p>Universitatea Transilvania din Brașov</p>
            <p>Facultatea de Inginerie Electrică și Știința Calculatoarelor</p>
            <p>Licență: Tehnologii și Sisteme de Telecomunicații</p>
            <p>2024-Prezent</p>
            <p>Universitatea Transilvania din Brașov</p>
            <p>Facultatea de Inginerie Electrică și Știința Calculatoarelor</p>
            <p>Master:Rețele de comunicații digitale</p>
        </div>

        <div class="main-box">
            <h2>Experiență Profesională</h2>
            <p>Iunie 2022 - Septembrie 2023</p>
            <p>Agent Servicii Clienți — CGS România</p>

            <p>Septembrie 2024 - Prezent</p>
            <p>Agent Vânzări IT — MUNCONS SRL</p>
        </div>

    </main>
            <div class="main-box">
            <h2>Harta Mea</h2>
            <p>Mai jos este harta generată din baza de date:</p>
        </div>
        <div id="map" style="height:600px;width:100%;margin-top: 10px;"></div>

    <script>
        function initMap() {
            var uluru = { lat: 45.1262, lng: 25.7350 };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 8,
                center: uluru
            });

            <?php
            $conn = mysqli_connect("localhost", "root", "Magazin2024", "loginpagev1");
            $sql_read = "SELECT * FROM map";
            $result = mysqli_query($conn, $sql_read);
            if($result){
                while($row = mysqli_fetch_assoc($result)) {
                    $lat = $row['latitudine'];
                    $lng = $row['longitudine'];
                    echo "new google.maps.Marker({position:{lat:$lat,lng:$lng}, map: map});";
                }
            }
            ?>
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWlPzZxqw9uBqH9OmvJWZBfFAXIe2E3Cc&callback=initMap"></script>
</body>
</html>
