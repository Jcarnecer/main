<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Payak Apps</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="assets/css/flavored-reset-and-normalize.css" >
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css" >
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css" >
    <link rel="stylesheet" type="text/css" href="assets/css/welcome.css">
  </head>
  <body>
      <!-- navigation.nunjucks -->
<nav class="navbar navbar-expand-lg bg-light navbar-light">
    <a class="navbar-brand" href="#">Payak Apps</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#products">Products</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#pricing">Pricing</a>
        </li>
        <li class="nav-item">
            <button class="sign-up-btn" data-toggle="modal" data-target="#signUpModal">Sign Up</button>
        </li>
      </ul>
    </div>
</nav>
      <!-- You write code for this content block in another file -->
      
<div class="modal fade" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="signUpModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Sign Up</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label>Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
          </div>
          <div class="form-group">
            <label>First Name</label>
            <input type="text" class="form-control" id="firstName" placeholder="Enter first name">
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input type="text" class="form-control" id="lastName" placeholder="Enter last name">
          </div>
          <div class="form-group">
            <label>Country</label>
            <input type="text" class="form-control" id="country" placeholder="Enter country">
          </div>
          <!-- <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="checkbox" class="form-check-input">
              Check me out
            </label>
          </div> -->
      </div>
      <div class="modal-footer">
          <button class="sign-up-btn center-block">Sign Up</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
    <div class="row full-page first-fold">
        <div class="col-md-6 align-self-center">
            <img src="assets/images/home_image.png" alt="Home image thumbnail" class="product-thumb mx-auto d-block img-fluid">
        </div>
        <div class="col-md-6 align-self-center">
            <p class="title">Payak Apps</p>
            <p>The no-frills business productivity suite built for fast-growing businesses.</p>
            <button type="button"  class="sign-up-btn" data-toggle="modal" data-target="#signUpModal">Sign Up</button>
        </div>
    </div>

    <div class="row products-section" id="products">
        <div class="col-md-12">
            <h1 class="text-center">Products</h1>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <img src="assets/images/hire-tracker.png" alt="Hire Tracker thumbnail" class="product-thumb mx-auto d-block img-fluid">
            <p class="product-name">Hire Tracker</p>
            <p class="product-description">Makes sure that all the stages of the hiring lifecycle are monitored.</p>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <img src="assets/images/time-tracker.png" alt="Time Tracker thumbnail" class="product-thumb mx-auto d-block img-fluid">
            <p class="product-name">Time Tracker</p>
            <p class="product-description">A timekeeping app that monitors regular and flexible work hours.</p>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <img src="assets/images/expense-manager.png" alt="Expense Manager thumbnail" class="product-thumb mx-auto d-block img-fluid">
            <p class="product-name">Expense Manager</p>
            <p class="product-description">Tracks all expenses including reimbursements, liquidations, and claiming of benefits.</p>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <p class="product-name">My Kanban</p>
            <p class="product-description">Based on the Japanese system of lean manufacturing, MyKanban organizes tasks into different categories.</p>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <p class="product-name">Bulletin Board</p>
            <p class="product-description">Displays all news about the company so employees remain updated.</p>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-4">
            <p class="product-name">Chat App</p>
            <p class="product-description">An enterprise chat application that eases communications in a company.</p>
        </div>
        <div class="col-md-12">
            <button class="sign-up-btn center-block">Get Started</button>
        </div>
    </div>
    <div class="row plans-section text-center align-items-center" id="pricing">
        <div class="col-md-12">
            <h1 class="text-center">Plans</h1>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
                <p class="plan-name">
                    <br>
                    <h2>FREE</h2>
                    30 days trial
                </p>
                <ul>
                    <li>App Suite</li>
                    <li>Unlimited Users</li>
                </ul>
            <button class="sign-up-btn center">Get Started</button>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
            <p class="plan-name">
                Single User<br>
                <h2>$7<sup>99</sup></h2>
                <span class="per-month-text">/month</span>
            </p>
            <ul>
                <li>Single app</li>
                <li>One user</li>
            </ul>
            <button class="sign-up-btn center">Get Started</button>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
                <p class="plan-name">
                    Company<br>
                    <h2>$29<sup>99</sup></h2>
                    <span class="per-month-text">/month</span>
                </p>
                <ul>
                    <li>Single app</li>
                    <li>Unlimited Users</li>
                </ul>
            <button class="sign-up-btn center">Get Started</button>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
            
            <div class="recommended-plan">
                <div class="recommended-banner">Best Value</div>
                <p class="plan-name">
                    App Suite<br>
                    <h2>$59<sup>99</sup></h2>
                    <span class="per-month-text">/month</span>
                </p>
                <ul>
                    <li>All apps</li>
                    <li>Unlimited Users</li>
                </ul>
                <button class="sign-up-btn center">Get Started</button>
            </div>
        </div>
    </div>
    <!-- <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Companies using Payak Apps</h1>
        </div>
    </div> -->
    <div class="row get-started-section">
        <div class="col-md-12">
            <h1 class="text-center">Boost your productivity with Payak Apps!</h1>
            <button class="sign-up-btn center-block">Get Started</button>
        </div>
    </div>
</div>

      <footer>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xs-12 col-sm-3 col-md-3">
                <h6 class="footer-heading">Help</h6>
                <hr class="footer-hr">
                <a href="#" class="footer-content">Report a problem</a><br>
                <a href="#" class="footer-content">Contact us</a>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3">
                <h6 class="footer-heading">Legal Stuff</h6>
                <hr class="footer-hr">
                <a href="#" class="footer-content">Privacy Policy</a><br>
                <a href="#" class="footer-content">Terms and Conditions</a>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3">
                <h6 class="footer-heading">Follow Us!</h6>
                <hr class="footer-hr">
                <a href="#" class="footer-icon"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                <a href="#" class="footer-icon"><i class="fa fa-instagram" aria-hidden="true"></i></i></a>
            </div>
        </div>     
    </div>
</footer>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    
  </body>
</html>