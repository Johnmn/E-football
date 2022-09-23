<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<style type="text/css">
    .body {
        text-align: center;
        font-style: italic;
        font-size: 32px;
        color: green;
    }
</style>
<body>
    <div class="body">
    </div>

</body>
</html>
<html>
<style type="text/css">
.main{width: 100%; background:#006600; top: 0;}
/*General Menu Styling*/
.mainnav{margin: 0 auto}
li{list-style: none;}
li a{text-decoration: none;}
.dropdown{position: absolute;overflow:auto; width: 150px;top: 41px; opacity: 0;visibility: hidden;transition: ease-out .35s;-moz-transition: ease-out .35s;-webkit-transition: ease-out .35s;}
.mainnav li{float: left;padding: 5px;background: green;border-left: 1px dotted #fff;}
.mainnav li:first-child{border: none;}
.mainnav li a{ display: block;padding: 2px 20px;color: #fff;font-family: arial;}
.mainnav li:hover{background: green;transition: ease-in .35s;-moz-transition: ease-in .35s;-webkit-transition: ease-in .35s;}
.mainnav li:hover a{color: black;transition: ease-in .35s;-moz-transition: ease-in .35s;-webkit-transition: ease-in .35s;}
.mainnav table{ border-collapse: collapse;
    width: 50%;}
.mainnav td{float: left; padding: 5px;background: green;border-left: 1px dotted #fff;}

/*First Level*/
.subs {left: -45px;position: relative;top: 0px;width: 175px;overflow:auto; border: none !important; border-top: 1px; border-bottom: 1px dotted #fff !important;}
.subs:last-child{border: none !important;}
.hassubs:hover .dropdown,.hassubs .hassubs:hover .dropdown{opacity: 1;visibility: visible; transition: ease-in .35s;-moz-transition: ease-in .35s;-webkit-transition: ease-in .35s;}
.mainnav li:hover ul a,.mainnav li:hover ul li ul li a{color: white;}
.mainnav li ul li:hover,.mainnav li ul li ul li:hover{background: #fff;transition: ease-in-out .35s;-moz-transition: ease-in-out .35s;-webkit-transition: ease-in-out .35s;}
.mainnav li ul li:hover a,.mainnav li ul li ul li:hover a{color: maroon;transition: ease-in-out .35s;-moz-transition: ease-in-out .35s;-webkit-transition: ease-in-out .35s;}
/*Second Level*/
.hassubs .hassubs .dropdown .subs{left: 25px;position: relative;width: 165px;top: 0px;}
.hassubs .hassubs .dropdown{position: absolute;width: 150px;left: 120px;top: 0px;opacity: 0;visibility: hidden;transition: ease-out .35s;-moz-transition: ease-out .35s;-webkit-transition: ease-out .35s;}
.img {width: 12px:text-align:left;}
</style>
<div align="center" size='12px'><img src="images/football.png" width="5%" align="left">E-FOOTBALL</div>
<div class="main">
            <ul class="mainnav">
                <li><a href="homepage.php">Home</a></li>
                <li class="hassubs"><a href="#">Teams</a>
                    <ul class="">
                        <table class="dropdown">
  <tr >
    <td class="subs"><a href="#">TeamA</td>
    <td class="subs"><a href="#">TeamI</td>
  </tr>
  <tr>
    <td class="subs"><a href="#">TeamB</td>
    <td class="subs"><a href="#">TeamJ</td>
  </tr>
  <tr>
    <td class="subs"><a href="#">TeamC</td>
    <td class="subs"><a href="#">TeamK</td>
  </tr>
  <tr>
    <td class="subs"><a href="#">TeamD</td>
    <td class="subs"><a href="#">Teaml</td>
  </tr>
  <tr>
    <td class="subs"><a href="teamE">TeamE</td>
    <td class="subs"><a href="teamM">TeamM</td>
  </tr>
   <tr>
    <td class="subs"><a href="teamF">TeamF</td>
    <td class="subs"><a href="teamN">TeamN</td>
  </tr>
   <tr>
    <td class="subs"><a href="teamG">TeamG</td>
    <td class="subs"><a href="teamO">TeamO</td>
  </tr>
   <tr>
    <td class="subs"><a href="teamH"> TeamH</a></td>
    <td class="subs"><a href="teamP"> TeamP</a></td>
  </tr>
</table>
                       
                            
                    </ul>
                </li>
                <li class="hassubs"><a href="about.php">About Us</a>
                </li>
                <li class="hassubs"><a href="contact.php">Contact Us</a></li>
                   
                    
                    </ul>
                </li>
            </ul>
            <br style="clear: both;">
        </div>
      </a>
    </td>
  </a>

</html>