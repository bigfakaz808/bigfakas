 </body><html>
    <meta charset="UTF-8">
    <meta charset="UTF-8">
    <title>Shelf Book Klub</title>
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans" rel="stylesheet">
    <style>
        body {
            font-family: 'Monaco', monospace;
        }
        .container{
           width:60%;
           margin:auto;
           overflow: hidden;
        }
        header{
            font-family: 'IBM Plex Sans', sans-serif;
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
                <li><a href="ass2.php">Home</a></li>
                <li><a href="info.php">Shipping Info</a></li>
            </ul>
        </nav>
    </div>

    </header>
    </head>
    <body>
      <h1 align='center'>INVOICE</a></h1>
    <?php
    session_start(); /* Starts the session */
    if(!isset($_SESSION['UserData']['Username'])){
    header("Location: login2.php");
    exit;
    }
    echo "<table align=center>";
    echo "<tr><th>Book</th><th>Author</th><th>Price</th><th>Quantity</th><th>Extended Price</th>";
    /// ///using an if statement and array_key_exists as a way to determine if the
    ///submit button was clicked.
    if (array_key_exists('submit_button', $_POST))
    {
        $obamaQuantity=$_POST['obamaQuantity'];
                if(ctype_digit($obamaQuantity) && $obamaQuantity>0)
                {
                    echo "<tr>";
                    echo "<td><img src='obama.jpg' width=170px height=250px> <br> Becoming</td>";
                    echo "<td>Michelle Obama</td>";
                    echo "<td>$32.50</td>";
                    echo "<td>$obamaQuantity</td>";
                    $obamaExt1=$obamaQuantity*32.50;
                    $obamaExt= number_format($obamaExt1, 2); ///I do this so that only 2 decimals will show
                    echo "<td>$$obamaExt</td>"; ///echoing the formatted number with the 2 decimals
                    echo "</tr>";
                }
                elseif (ctype_digit($obamaQuantity) && $obamaQuantity == 0) ///ctype_digit is used to validate valid qtty. numbers/
                ///did not use is_numeric function as to reduce using more functions and also, fewer lines of codes
                {
                    $obamaExt1=0;
                    '<style>display: none;</style>'; /// so that 0 input quantity won't be shown in the invoice.
                }
                else
                {
                    echo "<center><b>"
                    . "INVALID QUANTITY </b><br> "
                    . "Please enter a valid quantity. Thank you!"
                    . "</center>";
                } ///A message letting the shopper know that they entered an invalid number
    }
    echo "<BR>";
    if (array_key_exists('submit_button', $_POST))
    {
        $gladwellQuantity=$_POST['gladwellQuantity']; ///most of the names/keys are just the authors' last name + a particular attribute.
                if(ctype_digit($gladwellQuantity) && $gladwellQuantity>0)
                {
                    echo "<tr>";
                    echo "<td><img src='gladwell.jpg' width=170px height=250px> <br> Outliers: The Story of Success</td>";
                    echo "<td>Malcolm Gladwell</td>";
                    echo "<td>$16.99</td>";
                    echo "<td>$gladwellQuantity</td>";
                    $gladwellExt1=$gladwellQuantity*16.99;
                    $gladwellExt= number_format($gladwellExt1, 2);
                    echo "<td>$$gladwellExt</td>";
                    echo "</tr>";
                }
                elseif (ctype_digit($gladwellQuantity) && $gladwellQuantity == 0)
                {
                    $gladwellExt1=0;
                    '<style>display: none;</style>';
                }
                else
                {
                    echo "<center><b> INVALID QUANTITY </b><br> "
                    . "Please enter a valid quantity. Thank you!</center>";
                }
    }
    else {
        var_dump($_POST); ///used this here once to check if I have something wrong.
    }
    echo "<BR>";
    if (array_key_exists('submit_button', $_POST))
    {
        $carnegieQuantity=$_POST['carnegieQuantity'];
                if(ctype_digit($carnegieQuantity) && $carnegieQuantity>0)
                {
                    echo "<tr>";
                    echo "<td><img src='carnegie.jpg' width=170px height=250px> <br> How to Win Friends & Influence People</td>";
                    echo "<td>Dale Carnegie</td>";
                    echo "<td>$16.99</td>";
                    echo "<td>$carnegieQuantity</td>";
                    $carnegieExt1=$carnegieQuantity*22.95;
                    $carnegieExt= number_format($carnegieExt1, 2);
                    echo "<td>$$carnegieExt</td>";
                    echo "</tr>";
                }
                elseif (ctype_digit($carnegieQuantity) && $carnegieQuantity == 0)
                {
                    $carnegieExt1= 0;
                    '<style>display: none;</style>';
                }
                else
                {
                    echo "<center><b> INVALID QUANTITY </b><br>"
                    . "Please enter a valid quantity. Thank you!</center>";
                }
    }
    echo "<BR>";
    if (array_key_exists('submit_button', $_POST))     ///using an if statement and array_key_exists as a way to determine if the
    ///submit button was clicked.
    {
        $mansonQuantity=$_POST['mansonQuantity'];
                if(ctype_digit($mansonQuantity) && $mansonQuantity>0)
                {
                    echo "<tr>";
                    echo "<td><img src='manson.jpg' width=170px height=250px> <br> The Subtle Art of Not Giving a Fuck</td>";
                    echo "<td>Mark Manson</td>";
                    echo "<td>$16.99</td>";
                    echo "<td>$mansonQuantity</td>";
                    $mansonExt1=$mansonQuantity*24.99;
                    $mansonExt= number_format($mansonExt1, 2);
                    echo "<td>$$mansonExt</td>";
                    echo "</tr>";
                }
                elseif (ctype_digit($mansonQuantity) && $mansonQuantity == 0)
                {
                    $mansonExt1 = 0;
                    '<style>display: none;</style>';
                }
                else
                {
                    echo "<center><b> INVALID QUANTITY </b><br>"
                    . "Please enter a valid quantity. Thank you!</center>";
                }
    }
    echo "<BR>";
    ///using an if statement and array_key_exists as a way to determine if the
    ///submit button was clicked.
    if (array_key_exists('submit_button', $_POST))
    {
        $hillQuantity=$_POST['hillQuantity'];
                if(ctype_digit($hillQuantity) && $hillQuantity>0)
                {
                    echo "<tr>";
                    echo "<td><img src='hill.jpg' width=170px height=250px> <br> Think and Grow Rich</td>";
                    echo "<td>Napoleon Hill</td>";
                    echo "<td>$16.99</td>";
                    echo "<td>$hillQuantity</td>";
                    $hillExt1=$hillQuantity*18.70;
                    $hillExt= number_format($hillExt1, 2);
                    echo "<td>$$hillExt</td>";
                    echo "</tr>";
                }
                elseif (ctype_digit($hillQuantity) && $hillQuantity == 0)
                {
                    $hillExt1 = 0;
                    '<style>display: none;</style>';
                }
                else
                {
                    echo "<center><b> INVALID QUANTITY </b><br>"
                    . "Please enter a valid quantity. Thank you!</center>";
                }
    }
    echo "<BR>";
    ///Calculating the Sub-total, Tax, and Overall total.
    $bookOrderSubtotal=$obamaExt1+$gladwellExt1+$carnegieExt1+$mansonExt1+$hillExt1;
    $orderTax=$bookOrderSubtotal*0.04; ///i used unique names
    ///From the mini-assignment 2, I refered that I need to use an if-elseif statement.
     if ($bookOrderSubtotal > 0 && $bookOrderSubtotal <= 24.99) {
      $bookShipping = 6.99;
    } else if ($bookOrderSubtotal >= 25.00 && $bookOrderSubtotal<=49.99) {
      $bookShipping = 9.99;
    } else {
      $bookShipping = $bookOrderSubtotal*0.09;
    }
    $bookTotal=$bookOrderSubtotal+$orderTax+$bookShipping;
    //Subtotal (everything without the shipping/tax)
    ///Total (Tax + shipping)
    ///Shipping (make an if-statement)
   ///this part is where I echoed the subtotal, total, shipping, etc.
    echo "<table align='center' style='height:5%'>";
    echo "<tr>";
          echo "<td colspan=4>Sub-total</td>";
          $bookOrderSubtotal1=number_format($bookOrderSubtotal, 2); ///only the 2 decimals is shown
          echo "<td align='right'>$$bookOrderSubtotal1</td>";
    echo "</tr>";
    echo "<tr>";
          echo "<td colspan=4>Tax @ 4%</td>"; ///4% is the tax
          $orderTax1=number_format($orderTax, 2);
          echo "<td align='right'>$    $orderTax1</td>";
    echo "</tr>";
    echo "<tr>";
          echo "<td colspan=4>Shipping</td>";
          $bookShipping1=number_format($bookShipping, 2);
          echo "<td align='right'>$$bookShipping1</td>";
    echo "</tr>";
     echo "<tr>";
          echo "<td colspan=4>Total</td>";
          $bookTotal1=number_format($bookTotal, 2);
          echo "<td align='right'>$$bookTotal1</td>";
    echo "</tr>";
    echo "</table>";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
   ?>

</html>

