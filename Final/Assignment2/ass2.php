<?php session_start(); /* Starts the session */
if(isset($_POST['submit_button'])){
  $_SESSION['items'] = array();
  foreach ($_POST as $key => $value) {
    $_SESSION['items'][$key] = $value;
  }
  if(isset($_SESSION['UserData']['Username'])){
    header("Location: invoice.php");
    exit;
  } else {
    header("Location: login2.php");
    exit;
  }
}

if(isset($_SESSION['UserData']['Username'])){
  $name = $_SESSION['UserData']['Username'];
}


 ?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shelf Book Klub</title>
        <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans" rel="stylesheet">
        <style>
            body {
                font-family: 'IBM Plex Sans', sans-serif;
            }
            .container{
               width:60%;
               margin:auto;
               overflow: hidden;
            }
            header{
                background: #325438;
                color: #ffffff;
                min-height: 70px;
                padding-top: 30px;
                border-bottom:#c0c0c0 3px solid;
            }

            header a{
                color:#ffffff;
                text-decoration:none;
                text-transform:uppercase;
                font-size:15px;
            }

            header ul{
                margin: 0;
                padding: 0;
            }

            header li{
                float: left;
                display: inline;
                padding: 0 20px 0 20px;

            }

            header #branding{
                float:left;
            }

            header #branding h1{
                margin: 0;
            }

            header nav{
                float:right;
                margin-top:10px;
            }
            table {
                text-align: center;
                border-collapse: collapse;
                width: 50%;
                height: 80%;
            }
            th {
              align-content: center;
              height: 60%;
            }
            th, td {
                padding: 8px;
                border-bottom: 1px solid #ddd;
            }
        </style>
      </head>
      <body>
        <header>
        <div class="container">
            <div id="branding">
                <h1>Shelf Book Klub</h1>
            </div>
            <nav>
                <ul>
                    <?php if(!isset($name)){
                      echo "<li><a href='login2.php'>Login</a></li>";
                      echo "<li><a href='register.php'>Register</a></li>";
                      } else {
                      echo "<li><a href='logout.php'>Logout ($name)</a></li>";
                    }
                    ?>

                    <li><a href="info.php">Shipping Info</a></li>
                </ul>
            </nav>
        </div>
        </header>

    </head>
    <body>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
        <p align="center"> A monthly curated list of books that'll help you live ya life better!</p>
        <?php
        ///My first book is by Michelle Obama, titled Becoming. Most names I used
        ///are the authors' last name. I have 5 books
        $obama = array (
                "Book"=>"<img src='obama.jpg' width=170px height=250px> <br> Becoming",
                "Author"=>"Michelle Obama",
                "Price"=>"$32.50",
                "id"=>'obamaQuantity',
                "Quantity"=>"<input type='text' name='obamaQuantity' value='0'>"
            ///used a text form as a way for shoppers to inout the quantity
        );
        $gladwell = array (
                "Book"=>"<img src='gladwell.jpg' width=170px height=250px> <br> Outliers: The Story of Success",
                "Author"=>"Malcolm Gladwell",
                "Price"=>"$16.99",
                "id"=>'gladwellQuantity',
                "Quantity"=>"<input type='text' name='gladwellQuantity' value='0'>"
        );
        $carnegie = array (
            "Book"=>"<img src='carnegie.jpg' width=170px height=250px> <br> How to Win Friends & Influence People",///reduced the width/height to fit the table more
                "Author"=>"Dale Carnegie",
                "Price"=>"$22.95",
                "id"=>'carnegieQuantity',
                "Quantity"=>"<input type='text' name='carnegieQuantity' value='0'>"
        );
        $manson = array (
            "Book"=>"<img src='manson.jpg' width=170px height=250px> <br> The Subtle Art of Not Giving a Fuck",
                "Author"=>"Mark Manson",
                "Price"=>"$24.99",
                "id"=>'mansonQuantity',
                "Quantity"=>"<input type='text' name='mansonQuantity' value='0'>" ///in input a default value so that there's something in the box
        );
        $hill = array (
                "Book"=>"<img src='hill.jpg' width=170px height=250px> <br> Think and Grow Rich",
                "Author"=>"Napoleon Hill",
                "Price"=>"$18.70",
                "id"=>'hillQuantity',
                "Quantity"=>"<input type='text' name='hillQuantity' value='0'>"
        );
        $allBooksArray = array ( ///All i used is just a basic name
            $obama,
            $gladwell,
            $carnegie,
            $manson,
            $hill
        );

        ///Used a 'for loop' to loop through each of the keys on the arrays to
        ///retrieve the data for the corresponding keys. Used a table to
        ///make this more tidy and pleasing to look at.
        echo '<table align=center>';
         echo "<tr><th>Book</th><th>Author</th><th>Price</th><th>Quantity</th>";
         ///4 headings to keep it simple and straight to the point
            for ($i=0; $i<count($allBooksArray); $i++)
            {
                //var_dump($allBooksArray[$i]);
                echo "<tr>";
                echo "<td>{$allBooksArray[$i] ["Book"]}</td>";
                echo "<td>{$allBooksArray[$i] ["Author"]}</td>";
                echo "<td>{$allBooksArray[$i] ["Price"]}</td>";
                if(isset($_SESSION['items'])){
                  $stickyName = $allBooksArray[$i]['id'];
                  $stickyVal = (int)$_SESSION['items'][$stickyName];
                  echo "<td><input type='text' name=$stickyName value=$stickyVal> </td>";
                } else {
                  echo "<td>{$allBooksArray[$i] ["Quantity"]}</td>";
                }
                //$_SESSION['items']$allBooksArray[$i]['id']
                echo "</tr>";
            }
        echo '</table>';
        ?>
    <center>

            <input  type='Submit' name='submit_button' value='Go'>
        </form>
    </center>
    </body>

</html>


