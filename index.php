<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <title>test</title>
</head>
<body>
    <div>
        <h2>Fake Hotel</h2>

        <h3>Prezentarea aplicatiei</h3>
        <p>Un site prin care angajatii si clientii unui hotel pot interactiona cu o baza de date pentru crea si a gestiona rezervari</p>

        <h3>Descrierea arhitecturii</h3>
        <p>Pentru realizarea aplicatiei au fost identificate urmatoarele componente:</p>
        <p>entitatile folosite in stocarea datelor: room_types, rooms, user-types, users, bookings</p>
        <h5>relatiile dintre acestea:</h5>
        <ul>
            <li>room is room_type, reprezinta legatura dintre numarul unei camere si tipul acesteia(dubla, tripla, apartament, etc.)</li>
            <li>user is user_type, reprezinta legatura dintre roluri si utilizatorii(cine are ce rol)</li>
            <li>booking for room, reprezinta faptul ca o camera este ocupata de o rezervare pentru o perioada de timp</li>
            <li>booking created by user, reprezinta legatura dintre o rezervare si persoana care a creat-o</li>
        </ul>
        <h4>Diagrama entitate-relatie corespunzatoare</h4>
        <img src="erd.png">

        <h3>Descrierea implementarii</h3>
        <p>Utilizatorii aplicatiei au posibilitatea de a crea conturi prin care se pot loga pe site pentru a primi acess la diverse functii ale acestuia in functie de rolul contului(admin, customer)</p>
        <h4>Reprezentarea functiilor valabile pentru rolurile utilizatorilor</h4>
        <img src="uml.png">
    </div>
</body>
</html>