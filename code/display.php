<html>
<body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link
    href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap"
    rel="stylesheet"
  />

  <style>
    body {
      font-family: "Roboto", sans-serif;
    }
    h1 {
      text-align: center;
    }
    table,
    form {
      width: 500px;
      margin: 20px auto;
    }
    table {
      border-collapse: collapse;
      text-align: center;
    }
    table td,
    table th {
      border: solid 1px black;
    }
    label,
    input {
      display: block;
      margin: 10px 0;
      font-size: 20px;
    }
    button {
      display: block;
    }
  </style>
</head>

<body>
<nav>
    <div class="nav-wrapper blue">
        <div class="container">
            <a href="#" class="brand-logo center">Display</a>
            <ul>
                <li>
                    <a id="&" class="clear-btn btn blue lighten-3">Home</a>
                    <script type="text/javascript">
                        document.getElementById("&").onclick = function () {
                            location.href = "admin.html";
                        };
                    </script>
                </li>
            </ul>
        </div>
    </div>
</nav>

<br>
<?php 
$mysqli = $conn = mysqli_connect("localhost", "root", "", "food");
$query = "SELECT * FROM data";
echo '<table border="4" cellspacing="2" cellpadding="3"> 
      <tr> 
          <td> <font face="Arial">Meal Name</font> </td> 
          <td> <font face="Arial">Calories</font> </td>
          <td><font face="Arial">Quantity</font></td> 
          <td> <font face="Arial">Date</font> </td> 
          <td> <font face="Arial">Time</font> </td>  
      </tr>';

if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        $name = $row["name"];
        $calories = $row["calories"];
        $quantity=$row['quantity'];
        $date = $row["date"];
        $appt = $row["appt"];

        echo '<tr> 
                  <td>'.$name.'</td> 
                  <td>'.$calories.'</td>
                  <td>'.$quantity.'</td> 
                  <td>'.$date.'</td> 
                  <td>'.$appt.'</td> 
              </tr>';
    }
    $result->free();
} 
?>
</body>
</html>