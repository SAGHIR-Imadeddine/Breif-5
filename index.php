<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Votre titre</title>
</head>
<body class="bg-[#F2E9E4]">
   
<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dataware";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// mysqli_set_charset($conn,'utf8');

if (!$conn) {
    die("Échec de la connexion à la base de données: " . mysqli_connect_error());
}
?>

    <div class=" w-11/12 mx-[5%] flex justify-between items-center">
        <h1 class="text-3xl text-center mt-[2rem] text-[#4A4E69] font-bold">Gestion des équipes et personnel du DataWare</h1>
        <button class="w-[180px] h-[30px] bg-[#4A4E69] self-end text-white rounded-md">ajouter un membre</button>
    </div>
    <section class="w-11/12 mx-[5%] my-[1rem] py-[1rem]  bg-[#C9ADA7] rounded-2xl ">
    <h2 class='text-2xl font-bold my-6 text-center text-[#4A4E69]'>Personnel</h2>



<?php
$sql = "SELECT * FROM membre_personnel";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "
    
    <div class='w-full  '>
        <table class='table-auto w-11/12 border-2 border-black ml-[4%]'>
            <thead class='bg-[#4A4E69] border-2 border-black'>
                <th class='border-2 border-black text-[#F2E9E4]'>Member ID</th>
                <th class='border-2 border-black text-[#F2E9E4]'>Nom</th>
                <th class='border-2 border-black text-[#F2E9E4]'>Prenom</th>
                <th class='border-2 border-black text-[#F2E9E4]'>numero</th>
                <th class='border-2 border-black text-[#F2E9E4]'>equipe</th>
                <th class='border-2 border-black text-[#F2E9E4]'>role</th>
                <th class='border-2 border-black text-[#F2E9E4]'>statut</th>
                <th class='border-2 border-black text-[#F2E9E4]'>Actions</th>
            </thead>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tbody class='border-2 border-black'>
        <tr class='h-[40px] border-2 border-black'>
            <td class='text-center border-r-2 border-black'>{$row['member_id']}</td>
            <td class='text-center border-r-2 border-black'>{$row['nom']}</td>
            <td class='text-center border-r-2 border-black'>{$row['prenom']}</td>
            <td class='text-center border-r-2 border-black'>{$row['numero']}</td>
            <td class='text-center border-r-2 border-black'>{$row['equipe']}</td>
            <td class='text-center border-r-2 border-black'>{$row['member_role']}</td>
            <td class='text-center border-r-2 border-black'>{$row['statut']}</td>
            <td>
                <div class='flex justify-around items-center w-full h-[100%]'>
                    <button class='bg-[#ffb703] w-[35%] py-[2px] rounded-xl'>modifier</button>
                    <button class='bg-[#ef233c] w-[35%] py-[2px] rounded-xl'>supprimer</button>
                </div>
            </td>
        </tr>";
    }

    echo "</tbody>
    </table>";
} else {
    echo "Erreur de requête : " . mysqli_error($conn);
}
?>

    <h2 class='text-2xl font-bold my-6 text-center text-[#4A4E69]'>Equipes</h2>

<?php
$sql = "SELECT * FROM equipe";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "
   
    <div class='w-full  '>
        <table class='table-auto w-11/12 border-2 border-black ml-[4%]'>
            <thead class='bg-[#4A4E69] border-2 border-black'>
                <th class='border-2 border-black text-[#F2E9E4]'>Equipe ID</th>
                <th class='border-2 border-black text-[#F2E9E4]'>Nom</th>
                <th class='border-2 border-black text-[#F2E9E4]'>Date de creation</th>
                <th class='border-2 border-black text-[#F2E9E4]'>Actions</th>
            </thead>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tbody class='border-2 border-black'>
        <tr class='h-[40px] border-2 border-black'>
            <td class='text-center border-r-2 border-black'>{$row['eqp_id']}</td>
            <td class='text-center border-r-2 border-black'>{$row['nom']}</td>
            <td class='text-center border-r-2 border-black'>{$row['date_creation']}</td>
            <td>
                <div class='flex justify-around items-center w-full h-[100%]'>
                    <button class='bg-[#ffb703] w-[35%] py-[2px] rounded-xl'>modifier</button>
                    <button class='bg-[#ef233c] w-[35%] py-[2px] rounded-xl'>supprimer</button>
                </div>
            </td>
        </tr>";
    }

    echo "</tbody>
    </table>";
} else {
    echo "Erreur de requête : " . mysqli_error($conn);
}
?>







</section>

<?php


mysqli_close($conn);
?>

</body>
</html>
