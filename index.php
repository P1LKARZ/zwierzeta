<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styl4.css">
    <title>Odżywianie zwierząt</title>
</head>
<body>
    <div id="baner">
        <h2>DRAPIEŻNIKI I INNE</h2>
    </div>
    <div id="form">
        <h3>wybierz styl życia</h3>
        <form action="index.php" method="post">
            <select name="wybierz" id="wybierz">
                <option value="1">Drapieżniki</option>
                <option value="2">Roślinożerne</option>
                <option value="3">Padlinożerne</option>
                <option value="4">Wszystkożerne</option>
            </select>
            <input type="submit" value="Zobacz">
        </form>
    </div>
    <div id="lewy">
        <h3>Lista zwierząt</h3>
       <ul>
       <?php
        $serwer="localhost";
        $user="root";
        $pass="";
        $db="baza";
        $conn=mysqli_connect($serwer,$user,$pass,$db);
            $kw1="SELECT zwierzeta.gatunek,odzywianie.rodzaj FROM zwierzeta INNER JOIN odzywianie ON zwierzeta.Odzywianie_id=odzywianie.id";
            $q1=mysqli_query($conn,$kw1);
         
         while($row=mysqli_fetch_row($q1))
         {  
            echo "<li>$row[0] -> $row[1]</li>";
         }
         
        ?></ul>
    </div>
    <div id="srodek">
        <?php

       if(!empty($wybor=$_POST['wybierz']))
       {
        
        $kw2="SELECT zwierzeta.id,zwierzeta.gatunek,zwierzeta.wystepowanie FROM zwierzeta,odzywianie WHERE zwierzeta.Odzywianie_id=odzywianie.id AND odzywianie.id=$wybor";
        $q2=mysqli_query($conn,$kw2);
            
            if($wybor==1)
            {
                $wybor="Drapiezniki";
            }
            else if($wybor==2)
            {
                $wybor="Roślinożerne";
            }
            else if($wybor==3)
            {
                $wybor="Padlinożerne";
            }
            else
            {
                $wybor="Wszystkożerne";
            }
            while($lista=mysqli_fetch_row($q2))
            {
                echo "$lista[0].$lista[1].$lista[2]<br>";
            }
            
       }
        mysqli_close($conn);
        ?>
    </div>
    <div id="prawy">
        <img src="drapieznik.jpg" alt="Wilki">
    </div>
    <footer>
        <a href="pl.wikipedia.org" target="_blank">Poczytaj o zwierzętach na Wikipedii</a>
        <p>autor strony:000000000000</p>
    </footer>
</body>
</html>