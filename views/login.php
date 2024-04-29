<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/login.css">

    <title>Iniciar Sesión</title>

    <style>
    
  body {
            background-color: #e4f0ff;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            width: 100vw;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .svg-container {
            position: absolute;
            z-index: 1;
            width: 100%;
            height: 100%;
            pointer-events: none; /* Para que el SVG no intercepte eventos de ratón */
        }

  svg {
    width: 100%;
            height: 100%;
            z-index: 2;
    margin: 0 auto;
    
   
    transform: translate3d(-50%, -50%, 0);
  }


  .form {
    z-index: 3;
  display: flex;
  flex-direction: column;
  gap: 10px;
  background-color: #ffffff;
  padding: 30px;
  width: 450px;
  border-radius: 20px;
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

::placeholder {
  font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

.form button {
  align-self: flex-end;
}

.flex-column > label {
  color: #151717;
  font-weight: 600;
}

.inputForm {
  border: 1.5px solid #ecedec;
  border-radius: 10px;
  height: 50px;
  display: flex;
  align-items: center;
  padding-left: 10px;
  transition: 0.2s ease-in-out;
}

.input {
  margin-left: 10px;
  border-radius: 10px;
  border: none;
  width: 85%;
  height: 100%;
}

.input:focus {
  outline: none;
}

.inputForm:focus-within {
  border: 1.5px solid #2d79f3;
}

.flex-row {
  display: flex;
  flex-direction: row;
  align-items: center;
  gap: 10px;
  justify-content: space-between;
}

.flex-row > div > label {
  font-size: 14px;
  color: black;
  font-weight: 400;
}

.span {
  font-size: 14px;
  margin-left: 5px;
  color: #2d79f3;
  font-weight: 500;
  cursor: pointer;
}

.button-submit {
  margin: 20px 0 10px 0;
  background-color: #151717;
  border: none;
  color: white;
  font-size: 15px;
  font-weight: 500;
  border-radius: 10px;
  height: 50px;
  width: 100%;
  cursor: pointer;
}

.button-submit:hover {
  background-color: #252727;
}

.p {
  text-align: center;
  color: black;
  font-size: 14px;
  margin: 5px 0;
}

.btn {
  margin-top: 10px;
  width: 100%;
  height: 50px;
  border-radius: 10px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-weight: 500;
  gap: 10px;
  border: 1px solid #ededef;
  background-color: white;
  cursor: pointer;
  transition: 0.2s ease-in-out;
}

.btn:hover {
  border: 1px solid #2d79f3;
  ;
}

    
    </style>
</head>
<body>



<div class="svg-container">
<svg viewBox="0 0 400 300"
  version="1.1"
  xmlns="http://www.w3.org/2000/svg"
  xmlns:xlink="http://www.w3.org/1999/xlink">

  <g id="leftToRight"
    fill="none"
    stroke="#fff"
    stroke-linejoin="butt"
    stroke-linecap="butt"
    stroke-width="4">
    <path d="M 25,300 -275,0"
      stroke-dasharray="37, 37, 0"
      stroke-dashoffset="0" />
    <path d="M 50,300 -250,0"
      stroke-dasharray="72, 72, 0"
      stroke-dashoffset="0" />
    <path d="M 75,300 -225,0"
      stroke-dasharray="108, 108, 0"
      stroke-dashoffset="0" />
    <path d="M 100,300 -200,0"
      stroke-dasharray="144, 144, 0"
      stroke-dashoffset="0" />
    <path d="M 125,300 -175,0"
      stroke-dasharray="180, 180, 0"
      stroke-dashoffset="0" />
    <path d="M 150,300 -150,0"
      stroke-dasharray="216, 216, 0"
      stroke-dashoffset="0" />
    <path d="M 175,300 -125,0"
      stroke-dasharray="250, 250, 0"
      stroke-dashoffset="0" />
    <path d="M 200,300 -100,0"
      stroke-dasharray="285, 285, 0"
      stroke-dashoffset="0" />
    <path d="M 225,300 -75,0"
      stroke-dasharray="320, 320, 0"
      stroke-dashoffset="0" />
    <path d="M 250,300 -50,0"
      stroke-dasharray="356, 356, 0"
      stroke-dashoffset="0" />
    <path d="M 275,300 -25,0"
      stroke-dasharray="392, 392, 0"
      stroke-dashoffset="0" />
    <path class="hash"
      d="M 300,300 0,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path class="hash"
      d="M 325,300 25,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path class="hash"
      d="M 350,300 50,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path class="hash"
      d="M 375,300 75,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path class="hash"
      d="M 400,300 100,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 425,300 125,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 450,300 150,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 475,300 175,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 500,300 200,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 525,300 225,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 550,300 250,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 575,300 275,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 600,300 300,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 625,300 325,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 650,300 350,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 675,300 375,0"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
  </g>

  <g id="rightToLeft"
    fill="none"
    stroke="#fff"
    stroke-linejoin="butt"
    stroke-linecap="butt"
    stroke-width="4">
    <path d="M 25,0 -275,300"
      stroke-dasharray="37, 37, 0"
      stroke-dashoffset="0" />
    <path d="M 50,0 -250,300"
      stroke-dasharray="73, 73, 0"
      stroke-dashoffset="0" />
    <path d="M 75,0 -225,300"
      stroke-dasharray="108, 108, 0"
      stroke-dashoffset="0" />
    <path d="M 100,0 -200,300"
      stroke-dasharray="144, 144, 0"
      stroke-dashoffset="0" />
    <path d="M 125,0 -175,300"
      stroke-dasharray="180, 180, 0"
      stroke-dashoffset="0" />
    <path d="M 150,0 -150,300"
      stroke-dasharray="216, 216, 0"
      stroke-dashoffset="0" />
    <path d="M 175,0 -125,300"
      stroke-dasharray="250, 250, 0"
      stroke-dashoffset="0" />
    <path d="M 200,0 -100,300"
      stroke-dasharray="285, 285, 0"
      stroke-dashoffset="0" />
    <path d="M 225,0 -75,300"
      stroke-dasharray="320, 320, 0"
      stroke-dashoffset="0" />
    <path d="M 250,0 -50,300"
      stroke-dasharray="356, 356, 0"
      stroke-dashoffset="0" />
    <path d="M 275,0 -25,300"
      stroke-dasharray="392, 392, 0"
      stroke-dashoffset="0" />
    <path class="hash"
      d="M 300,0 0,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path class="hash"
      d="M 325,0 25,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path class="hash"
      d="M 350,0 50,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path class="hash"
      d="M 375,0 75,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path class="hash"
      d="M 400,0 100,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 425,0 125,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 450,0 150,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 475,0 175,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 500,0 200,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 525,0 225,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 550,0 250,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 575,0 275,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 600,0 300,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 625,0 325,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 650,0 350,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
    <path d="M 675,0 375,300"
      stroke-dasharray="425, 425, 0"
      stroke-dashoffset="0" />
  </g>

  <g id="theXTop"
    fill="none"
    stroke="#001B1F"
    stroke-linejoin="butt"
    stroke-linecap="butt"
    stroke-width="4">
    <path d="M 0,0 200,200 400,0"
      stroke-dasharray="564, 564, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 25,0 200,175 375,0"
      stroke-dasharray="495, 495, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 50,0 200,150 350,0"
      stroke-dasharray="425, 425, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 75,0 200,125 325,0"
      stroke-dasharray="353, 353, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 100,0 200,100 300,0"
      stroke-dasharray="282, 282, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 125,0 200,75 275,0"
      stroke-dasharray="212, 212, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 150,0 200,50 250,0"
      stroke-dasharray="141, 141, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 175,0 200,25 225,0"
      stroke-dasharray="70, 70, 0, 0, 0"
      stroke-dashoffset="0" />
  </g>

  <g id="theXBottom"
    fill="none"
    stroke="#001B1F"
    stroke-linejoin="butt"
    stroke-linecap="butt"
    stroke-width="4">
    <path d="M 0,300 200,100 400,300"
      stroke-dasharray="564, 564, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 25,300 200,125 375,300"
      stroke-dasharray="495, 495, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 50,300 200,150 350,300"
      stroke-dasharray="425, 425, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 75,300 200,175 325,300"
      stroke-dasharray="353, 353, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 100,300 200,200 300,300"
      stroke-dasharray="282, 282, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 125,300 200,225 275,300"
      stroke-dasharray="212, 212, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 150,300 200,250 250,300"
      stroke-dasharray="141, 141, 0, 0, 0"
      stroke-dashoffset="0" />
    <path d="M 175,300 200,275 225,300"
      stroke-dasharray="70, 70, 0, 0, 0"
      stroke-dashoffset="0" />
  </g>

</svg> 

</div>




<div class="form-container">

<form class="form">
    <div class="flex-column">
      <label>Email </label></div>
      <div class="inputForm">
        <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg"><g id="Layer_3" data-name="Layer 3"><path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z"></path></g></svg>
        <input type="text" class="input" placeholder="Enter your Email">
      </div>
    
    <div class="flex-column">
      <label>Password </label></div>
      <div class="inputForm">
        <svg height="20" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg"><path d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0"></path><path d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0"></path></svg>        
        <input type="password" class="input" placeholder="Enter your Password">
        <svg viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"></path></svg>
      </div>
    
    <div class="flex-row">
      <div>
      <input type="checkbox">
      <label>Remember me </label>
      </div>
      <span class="span">Forgot password?</span>
    </div>
    <button class="button-submit">Sign In</button>
    <p class="p">Don't have an account? <span class="span">Sign Up</span>

    </p><p class="p line">Or With</p>

    <div class="flex-row">
      <button class="btn google">
        <svg version="1.1" width="20" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<path style="fill:#FBBB00;" d="M113.47,309.408L95.648,375.94l-65.139,1.378C11.042,341.211,0,299.9,0,256
	c0-42.451,10.324-82.483,28.624-117.732h0.014l57.992,10.632l25.404,57.644c-5.317,15.501-8.215,32.141-8.215,49.456
	C103.821,274.792,107.225,292.797,113.47,309.408z"></path>
<path style="fill:#518EF8;" d="M507.527,208.176C510.467,223.662,512,239.655,512,256c0,18.328-1.927,36.206-5.598,53.451
	c-12.462,58.683-45.025,109.925-90.134,146.187l-0.014-0.014l-73.044-3.727l-10.338-64.535
	c29.932-17.554,53.324-45.025,65.646-77.911h-136.89V208.176h138.887L507.527,208.176L507.527,208.176z"></path>
<path style="fill:#28B446;" d="M416.253,455.624l0.014,0.014C372.396,490.901,316.666,512,256,512
	c-97.491,0-182.252-54.491-225.491-134.681l82.961-67.91c21.619,57.698,77.278,98.771,142.53,98.771
	c28.047,0,54.323-7.582,76.87-20.818L416.253,455.624z"></path>
<path style="fill:#F14336;" d="M419.404,58.936l-82.933,67.896c-23.335-14.586-50.919-23.012-80.471-23.012
	c-66.729,0-123.429,42.957-143.965,102.724l-83.397-68.276h-0.014C71.23,56.123,157.06,0,256,0
	C318.115,0,375.068,22.126,419.404,58.936z"></path>

</svg>
   
        Google 
        
      </button><button class="btn apple">
<svg version="1.1" height="20" width="20" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 22.773 22.773" style="enable-background:new 0 0 22.773 22.773;" xml:space="preserve"> <g> <g> <path d="M15.769,0c0.053,0,0.106,0,0.162,0c0.13,1.606-0.483,2.806-1.228,3.675c-0.731,0.863-1.732,1.7-3.351,1.573 c-0.108-1.583,0.506-2.694,1.25-3.561C13.292,0.879,14.557,0.16,15.769,0z"></path> <path d="M20.67,16.716c0,0.016,0,0.03,0,0.045c-0.455,1.378-1.104,2.559-1.896,3.655c-0.723,0.995-1.609,2.334-3.191,2.334 c-1.367,0-2.275-0.879-3.676-0.903c-1.482-0.024-2.297,0.735-3.652,0.926c-0.155,0-0.31,0-0.462,0 c-0.995-0.144-1.798-0.932-2.383-1.642c-1.725-2.098-3.058-4.808-3.306-8.276c0-0.34,0-0.679,0-1.019 c0.105-2.482,1.311-4.5,2.914-5.478c0.846-0.52,2.009-0.963,3.304-0.765c0.555,0.086,1.122,0.276,1.619,0.464 c0.471,0.181,1.06,0.502,1.618,0.485c0.378-0.011,0.754-0.208,1.135-0.347c1.116-0.403,2.21-0.865,3.652-0.648 c1.733,0.262,2.963,1.032,3.723,2.22c-1.466,0.933-2.625,2.339-2.427,4.74C17.818,14.688,19.086,15.964,20.67,16.716z"></path> </g></g></svg>

        Apple 
        
</button></div></form>
</div>








<!-- <div class="full-screen-container">
    <div class="login-container">
      <h1 class="login-title">SOLUCIONES INTEGRALES JASSO</h1>
      <form class="form" action="../controllers/AuthController.php" method="post">
        <div class="input-group success" >
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required/>
          <span class="msg">Valid email</span>
        </div>

        <div class="input-group error" >
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required/>
          <span class="msg">Incorrect password</span>
        </div>

        <button type="submit" class="login-button">Login</button>
      </form>
    </div>
  </div>

 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.5/TweenMax.min.js"></script>

<script> 
window.onload = onLoad;

const easeInOutQuint = 'cubic-bezier(0.86, 0, 0.07, 1)';
const easeInQuart = 'cubic-bezier(0.895, 0.03, 0.685, 0.22)';
const APPEAR_COMPLETE = 2800;
const ASPECT_RATIO = 400 / 300;

function onLoad() {
  const offsets = [37, 73, 108, 144, 180, 216, 250, 285, 320, 356, 392, 425, 425, 425, 425, 425, 392, 356, 321, 286, 250, 215, 180, 144, 109, 74, 38];
  const hashes = {
    ltr: {
      dasharray: '104, 425, 0, 0',
      reset: '425, 425, 0',
      offsets: [-125, -142, -159, -177, -194],
    },
    rtl: {
      dasharray: '102, 425, 0, 0',
      reset: '425, 425, 0',
      offsets: [-126, -144, -161, -179, -197],
    }
  };

  const xOffsets = [564, 495, 425, 353, 282, 212, 141, 70].reverse();

  // Left To Right
  const ltrLines = Array.from(
    document.querySelectorAll('#leftToRight path')
  );
  // Right To Left
  const rtlLines = Array.from(
    document.querySelectorAll('#rightToLeft path')
  );
  // Left To Right
  const ltrHashes = Array.from(
    document.querySelectorAll('#leftToRight .hash')
  );
  // Right To Left hashes
  const rtlHashes = Array.from(
    document.querySelectorAll('#rightToLeft .hash')
  );
  // Top X
  const xTop = Array.from(
    document.querySelectorAll('#theXTop path')
  );
  // Bottom X
  const xBottom = Array.from(
    document.querySelectorAll('#theXBottom path')
  );

  // Timeline
  var tl = new TimelineMax();

  // Shuffle
  tl.staggerFromTo(ltrLines, 0.4, {
    cycle: { strokeDashoffset: idx => offsets[idx] },
    ease: Circ.easeOut,
  }, {
    strokeDashoffset: 0,
    ease: Circ.easeOut,
  }, 0.1, 0)
  .staggerFromTo(rtlLines, 0.4, {
    cycle: { strokeDashoffset: idx => offsets[idx] },
    ease: Circ.easeOut,
  }, {
    strokeDashoffset: 0,
    ease: Circ.easeOut,
  }, 0.1, 0)
  .add('unshuffle')
  // Unshuffle
  .staggerFromTo(ltrLines, 0.4, {
    strokeDashoffset: 0,
    ease: Expo.easeOut,
  }, {
    cycle: { strokeDashoffset: idx => offsets[idx] },
    ease: Expo.easeOut,
  }, 0.1, 'unshuffle')
  .staggerFromTo(rtlLines, 0.4, {
    strokeDashoffset: 0,
    ease: Expo.easeOut,
  }, {
    cycle: { strokeDashoffset: idx => offsets[idx] },
    ease: Expo.easeOut,
  }, 0.1, 'unshuffle')
  // Prepare for hash
  .set(ltrHashes, {
    strokeDasharray: hashes.ltr.dasharray,
    strokeDashoffset: 104,
  })
  .set(rtlHashes, {
    strokeDasharray: hashes.rtl.dasharray,
    strokeDashoffset: 102,
  })
  .add('hash')
  // Hash
  .staggerFromTo(ltrHashes, 0.8, {
    strokeDashoffset: 104,
    ease: Power4.easeInOut,
  }, {
    cycle: { strokeDashoffset: idx => hashes.ltr.offsets[idx] },
    ease: Power4.easeInOut,
  }, 0.1, 'hash')
  .staggerFromTo(rtlHashes, 0.8, {
    strokeDashoffset: 102,
    ease: Power4.easeInOut,
  }, {
    cycle: { strokeDashoffset: idx => hashes.rtl.offsets[idx] },
    ease: Power4.easeInOut,
  }, 0.1, 'hash')
  .add('unhash')
  // Unhash
  .staggerFromTo(ltrHashes, 0.8, {
    cycle: { strokeDashoffset: idx => hashes.ltr.offsets[idx] },
    ease: Power4.easeInOut,
  }, {
    strokeDashoffset: 104,
    ease: Power4.easeInOut,
  }, 0.1, 'unhash')
  .staggerFromTo(rtlHashes, 0.8, {
    cycle: { strokeDashoffset: idx => hashes.rtl.offsets[idx] },
    ease: Power4.easeInOut,
  }, {
    strokeDashoffset: 102,
    ease: Power4.easeInOut,
  }, 0.1, 'unhash')
  // Reset for shuffle
  .set(ltrHashes, {
    strokeDasharray: hashes.ltr.reset,
    strokeDashoffset: 425,
  })
  .set(rtlHashes, {
    strokeDasharray: hashes.rtl.reset,
    strokeDashoffset: 425,
  })
  .add('shuffleAgain')
  // Shuffle Again
  .staggerFromTo(ltrLines.reverse(), 0.4, {
    cycle: { strokeDashoffset: idx => offsets[idx] },
    ease: Circ.easeOut,
  }, {
    strokeDashoffset: 0,
    ease: Circ.easeOut,
  }, 0.1, 'shuffleAgain')
  .staggerFromTo(rtlLines.reverse(), 0.4, {
    cycle: { strokeDashoffset: idx => offsets[idx] },
    ease: Circ.easeOut,
  }, {
    strokeDashoffset: 0,
    ease: Circ.easeOut,
  }, 0.1, 'shuffleAgain')
  .add('theX')
  // The X
  .staggerFromTo(xTop.reverse(), 0.6, {
    cycle: { strokeDashoffset: idx => xOffsets[idx] },
    ease: Power4.easeInOut,
  }, {
    strokeDashoffset: 0,
    ease: Power4.easeInOut,
  }, 0.05, 'shuffleAgain+=1.2')
  .staggerFromTo(xBottom.reverse(), 0.6, {
    cycle: { strokeDashoffset: idx => xOffsets[idx] },
    ease: Power4.easeInOut,
  }, {
    strokeDashoffset: 0,
    ease: Power4.easeInOut,
  }, 0.05, 'shuffleAgain+=1.2')
  .add('cleanup')
  // Cleanup
  .staggerFromTo(xTop, 0.6, {
    strokeDashoffset: 0,
    ease: Power4.easeInOut,
  }, {
    cycle: { strokeDashoffset: idx => xOffsets[idx] },
    ease: Power4.easeInOut,
  }, 0.05, 'cleanup+=2')
  .staggerFromTo(xBottom, 0.6, {
    strokeDashoffset: 0,
    ease: Power4.easeInOut,
  }, {
    cycle: { strokeDashoffset: idx => xOffsets[idx] },
    ease: Power4.easeInOut,
  }, 0.05, 'cleanup+=2')
  // Cleanup
  .staggerFromTo(ltrLines, 0.4, {
    strokeDashoffset: 0,
    ease: Expo.easeOut,
  }, {
    cycle: { strokeDashoffset: idx => offsets[idx] },
    ease: Expo.easeOut,
  }, 0.1, 'cleanup+=1.6')
  .staggerFromTo(rtlLines, 0.4, {
    strokeDashoffset: 0,
    ease: Expo.easeOut,
  }, {
    cycle: { strokeDashoffset: idx => offsets[idx] },
    ease: Expo.easeOut,
  }, 0.1, 'cleanup+=1.6')
  // Repeat
  .repeat(-1);

  // Reset The X
  xTop.forEach((el, i) => tl.set(el, {
    strokeDashoffset: xOffsets[i]
  }, 0));
  xBottom.forEach((el, i) => tl.set(el, {
    strokeDashoffset: xOffsets[i]
  }, 0));

  window.onresize = resize;
  resize();

}

// Resize
let svg;
function resize() {
  const w = Math.max(
    document.documentElement.clientWidth,
    window.innerWidth || 0
  );
  const h = Math.max(
    document.documentElement.clientHeight,
    window.innerHeight || 0
  );

  svg = svg || document.querySelector('svg');
  const ratio = w / h;

  if (ratio >= ASPECT_RATIO) {
    svg.style.width = '100vw';
    svg.style.height = `auto`;
  } else {
    svg.style.height = '100vh';
    svg.style.width = 'auto';
  }
};
</script>
</body>
</html>
<?php ob_end_flush();?>