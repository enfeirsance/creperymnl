<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parking Lot Montalban</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');

 * {
   margin: 0;
   padding: 0;
   box-sizing: border-box;
   font-family: 'Jost', sans-serif;
   transition: .4s ease-in-out;
  }
     body{
        height: 100vh;
       background-color: #f1f1f1;
 }

      header{
       width: 100%;
       padding: 20px 5%;
       position: fixed;
       top: 0;
       right: 0;
       left: 0;
       display: flex;
        justify-content: space-between;
       align-items: center;
       z-index: 999;
 }

    header .logo{
       position: relative;
       font-size: 35px;
       text-transform: capitalize;
       letter-spacing: 1px;
       padding: 8px 10px;
       cursor: pointer;
 }
     header .logo span{
     color: lightblue;
 }

     header .logo:before{
        content: "";
        position: absolute;
         left: 0;
        top: 0;
        width: 20px;
         height: 20px;
         border-left: solid 6px gold;
        border-top:solid 6px gold;
         transition: .3s linear;
 }
  header .logo:after{
    content: "";
    position: absolute;
    right: 0;
    bottom: 0;
    width: 20px;
    height: 20px;
    border-right: solid 6px gold;
    border-bottom:solid 6px gold;
    transition: .3s linear;
 }
   header .logo:hover::before ,
   header .logo:hover::after{
     width: 100%;
     height: 100%;
 }

  header .nabar a {
       font-size: 18px;
       text-decoration: none;
        text-transform: capitalize;
       font-weight: 500;
       color: #222;
       padding: 4px 8px;
       transition: .3s ease-in-out;
      border-bottom: solid 3px transparent;
 }

      header .nabar a:hover{
       border-bottom: solid 3px #c96649;
       color: #c96649;
  }
    .Home {
       position: relative;
       height: 100vh;
       display: flex;
       align-items: center;
       padding: 5%;
       justify-content: space-between;
       overflow: hidden;
 }

   .Home .content h1{
       font-size: 60px;
       text-transform: capitalize;
       color: #222;
   
 }
  .Home .content h1 span{
       color: #222;
        animation: colorChange 5s infinite;
 }
     .Home .content p{
        color: midnightblue;
        font-size: 17px;
        margin: 20px 0 30px;
        line-height: 1.6;
  }
    .Home .content h1 {
        animation: colorChange 5s infinite;
  }
    @keyframes colorChange {
    0% {
        color: lightblue;
    }
    0% {
        color: dodgerblue;
    }
    100% {
        color: lightgreen;
    }
    50% {
        color: darkred;
    }
    75% {
        color: royalblue;
    }
    100% {
        color: lightpink;
    }
    
  }

  </style>
</head>
<body>
   <header>
    <h1 class="logo"><span>Montalban TC</span></h1>
    <form action="frontweb.php" method="POST">
        <nav class="nabar">
            <a href="#">Team</a>
            <a href="#">about</a>
            <a href="register.php">Register</a>
            <a href="log.php">Login</a>
        </nav>
    </form>
   </header>

    <section class="Home">
    <div class="content">
      <h1>Parking <span>Lot</span> <br> Montalban Town Center</h1>
      <p>Welcome to Parking Lot Montalban Town Center! Your convenient parking solution awaits.<br> Enjoy hassle-free parking in the heart of Montalban.<br> Reserve your spot Today!</p>
    </div>
    </body>
    </html>