<?php
$phpVar =  $_GET['user'];
$con=mysqli_connect("localhost","root","","character");

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$data = mysqli_query($con,"SELECT * FROM {$phpVar} ORDER BY ID DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/style.css" />
    <title>Character Sheet</title>
</head>
<body>
    <?php
      $CapVar = ucfirst($phpVar);
      echo '<h1 class="NameTitle">' . $CapVar . "'s Characters</h1>";
    ?>
    <p><?php
        echo '<table border="1">
        <thead>
        <tr>
        <th style="border: none;"></th>
        <th>Name</th>
        <th>HP</th>
        <th>Level</th>
        <th>Race</th>
        <th>Title</th>
        <th>Class</th>
        <th>Str</th>
        <th>Wis</th>
        <th>Const</th>
        <th>Intel</th>
        <th>Dex</th>
        <th>Gold</th>
        <th>Silver</th>
        <th>Copper</th>
        <th>Weapon</th>
        <th>Head</th>
        <th>Body</th>
        <th>Legs</th>
        <th>Feet</th>
        <th>Bag</th>
        <th>Earings</th>
        <th>Hands</th>
        <th>Ring 1</th>
        <th>Ring 2</th>
        <th>Amulet</th>
        <th>Shiled</th>
        <th style="border: none;"></th>
        </tr>
        </thead>';
        echo "<tbody>";
        while($row1 = mysqli_fetch_assoc($data)) {
          echo '<tr><td><img class="profilePic" src="' . $row1['ProfilePic'] . '" /></td>';
          echo '<td id="CharacterName">' . ucfirst($row1['Name']) . "</td>";
          echo "<td>" . $row1['Health'] . "</td>";
          echo "<td>" . $row1['Level'] . "</td>";
          echo "<td>" . $row1['Race'] . "</td>";
          echo "<td>" . $row1['Title'] . "</td>";
          echo "<td>" . $row1['Class'] . "</td>";
          echo "<td>" . $row1['Str'] . "</td>";
          echo "<td>" . $row1['Wis'] . "</td>";
          echo "<td>" . $row1['Const'] . "</td>";
          echo "<td>" . $row1['Intel'] . "</td>";
          echo "<td>" . $row1['Dex'] . "</td>";
          echo "<td>" . $row1['Gold'] . "</td>";
          echo "<td>" . $row1['Silver'] . "</td>";
          echo "<td>" . $row1['Copper'] . "</td>";
          echo "<td>" . $row1['Weapon'] . "</td>";
          echo "<td>" . $row1['Head'] . "</td>";
          echo "<td>" . $row1['Body'] . "</td>";
          echo "<td>" . $row1['Legs'] . "</td>";
          echo "<td>" . $row1['Feet'] . "</td>";
          echo "<td>" . $row1['Bag'] . "</td>";
          echo "<td>" . $row1['Earings'] . "</td>";
          echo "<td>" . $row1['Hands'] . "</td>";
          echo "<td>" . $row1['Ring1'] . "</td>";
          echo "<td>" . $row1['Ring2'] . "</td>";
          echo "<td>" . $row1['Amulet'] . "</td>";
          echo "<td>" . $row1['Shield'] . "</td>";
          echo '<td style="border: none;"><a href="Play.php?character=' . $row1['Name'] . '&user=' . $phpVar . '">Submit</a></td></tr>';
        }
        echo "</tbody>";
        echo "</table>";
        
        mysqli_close($con);
        ?></p>
        <span id="result-name"></span>
</body>

<script>
  const urlParams = new URLSearchParams(window.location.search);
  const greetingValue = urlParams.get('user');
  console.log(greetingValue);
  document.getElementById("Name").innerHTML = greetingValue
  document.cookie = greetingValue;
  
  var input = document.getElementById("CharacterName");

  function searchURL() {
    window.location = "Play.php?game=" + input.value;
  }
</script>
</html>