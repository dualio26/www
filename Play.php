<?php
$urlVar = $_GET['user'];
$urlVarChar =  $_GET['character'];
$con=mysqli_connect("localhost","root","","character");

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$data = mysqli_query($con,"SELECT * FROM {$urlVar} WHERE Name = '{$urlVarChar}' ORDER BY ID DESC");

$Stats = ["Str", "Wis", "Const", "Intel", "Dex"];
$img = ["fa-solid fa-gavel", "fas fa-hat-wizard", "fa-solid fa-shield", "fa-solid fa-book-journal-whills", "fa-solid fa-shoe-prints"];
$i = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css" />
    <link rel="stylesheet" href="CSS/NumberInput.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <title>Document</title>
</head>
<body>
    <?php

    while($row1 = mysqli_fetch_assoc($data)) {
        $nameTitle = ucfirst($row1['Name']) . " " . $row1['Title'];

        echo '
            <form>
            <div class="profileHeader"><img class="profilePic" src="' . $row1['ProfilePic'] . '" /><input class="profileTitle" type="text" value="' . $row1['ProfilePic'] . '" hidden /><input class="profileTitle" id="profileTitle" type="text" value="' . $nameTitle . '"/></div>
        ';
        echo  '
            <div class="Numbs">
            <div><div class="quantity" style="color: #d82525;">
                <label><i class="fa-solid fa-heart"></i> Health</label>        
                <input id="Health" type="number" min="1" max="999" step="1" value="'. $row1['Health'] . '">
            </div>';
        echo  '
            <div class="quantity" style="color: #5ca832;">
                <label><i class="fas fa-star"></i> Level</label>        
                <input id="Health" type="number" min="1" max="20" step="1" value="'. $row1['Level'] . '">
            </div></div>';

        echo  '<div class="Stats">';
        while($i < count($Stats)){
            echo  '
            <label><i class="' . $img[$i]  . '"></i> ' . $Stats[$i] . '</label>';
            $i++;
        }
        $i = 0;
        echo  '</div>';
        
        echo  '
            <div class="Stats">';
        
        while($i < count($Stats)){
            echo  '
            <div class="quantity">     
                <input id="Health" type="number" min="1" max="999" step="1" value="'. $row1[$Stats[$i]] . '">
            </div>';
            $i++;
        }
        
        echo  '</div>';

        echo  '<div class="quantity" style="color: #deaa00;">
                  <label style="padding-left:1%;"><i class="fas fa-coins"></i> Gold</label>        
                  <input id="Health" type="number" min="1" max="999" step="1" value="'. $row1['Gold'] . '">
              </div>';
        
        echo  '<div class="quantity" style="color: #999999;">
                  <label style="padding-left:1%;"><i class="fas fa-coins"></i> Silver</label>        
                  <input id="Health" type="number" min="1" max="999" step="1" value="'. $row1['Silver'] . '">
              </div>';
        
        echo  '<div class="quantity" style="color: #de7300;">
                  <label style="padding-left:1%;"><i class="fas fa-coins"></i> Copper</label>        
                  <input id="Health" type="number" min="1" max="999" step="1" value="'. $row1['Copper'] . '">
              </div></div>'; 
        
        echo  $row1['Race'] ;

        echo  $row1['Weapon'] ;
        
        echo  $row1['Head'] ;
        
        echo  $row1['Body'] ;
        
        echo  $row1['Legs'] ;
        
        echo  $row1['Feet'] ;
        
        echo  $row1['Bag'] ;
        
        echo  $row1['Earings'] ;
        
        echo  $row1['Hands'] ;
        
        echo  $row1['Ring1'] ;
        
        echo  $row1['Ring2'] ;
        
        echo  $row1['Amulet'] ;
        
        echo  $row1['Shield'] ;
        echo "</form>";
        echo '<button type="button" onclick="Name()">Name refresh</button>';
    }

    // while($row1 = mysqli_fetch_assoc($data)) {
    //     echo '<h1 class="NameTitle">' . ucfirst($urlVarChar) . " the " . $data["Race"] . "</h1>";
    // }
    ?>
</body>
</html>

<script>
    var x = document.getElementById("profileTitle");
    var defaultVal = x.value;

    function Name() {
      console.log(x)
      console.log(x.defaultValue)
      console.log(x.value)
    }

    $(
    '<div class="quantity-nav"><div class="quantity-button quantity-up">&#9650;</div><div class="quantity-button quantity-down">&#9660;</div></div>'
    ).insertAfter(".quantity input");
    $(".quantity").each(function () {
    var spinner = $(this),
        input = spinner.find('input[type="number"]'),
        btnUp = spinner.find(".quantity-up"),
        btnDown = spinner.find(".quantity-down"),
        min = input.attr("min"),
        max = input.attr("max");

        btnUp.click(function () {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
            var newVal = oldValue;
            } else {
            var newVal = oldValue + 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
            Name()
        });

        btnDown.click(function () {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
            var newVal = oldValue;
            } else {
            var newVal = oldValue - 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
            Name()
        });
    });

</script>