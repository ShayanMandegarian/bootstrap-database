<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Employee</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
	.page-header h2{
	  margin-top: 0;
	}
	.form-control:focus {
  	border-color: #8f61e5;
	box-shadow: 2px 2px 1px 1px #8f61e5;
	}
        .purple{color:#8f61e5}
        .btn-custom {
                background-color: hsl(261, 72%, 30%) !important;
                background-repeat: repeat-x;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#8f61e5", endColorstr="#3b1583");
                background-image: -khtml-gradient(linear, left top, left bottom, from(#8f61e5), to(#3b1583));
                background-image: -moz-linear-gradient(top, #8f61e5, #3b1583);
                background-image: -ms-linear-gradient(top, #8f61e5, #3b1583);
                background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #8f61e5), color-stop(100%, #3b1583));
                background-image: -webkit-linear-gradient(top, #8f61e5, #3b1583);
                background-image: -o-linear-gradient(top, #8f61e5, #3b1583);
                background-image: linear-gradient(#8f61e5, #3b1583);
                border-color: #3b1583 #3b1583 hsl(261, 72%, 21.5%);
                color: #fff !important;
                text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.56);
                -webkit-font-smoothing: antialiased;
        }

    </style>

</head> 
 
<body>
    <div class="wrapper">
      <div class="container-fluid">
        <div class="row">
	      <div class="page-header clearfix">
		<h2 class = "pull-left" >Add Employee</h2>
		<a href="http://localhost/ppt" class="btn btn-custom pull-right">Back</a>
	      </div>
	      <h5><b>* </b><i> = required</i></h5>
    	      <form action="?" method="post">
	      <div class="col-md-6">
              <div class="form-group <?php echo (!empty($fe)) ? 'has-error' : ''; ?>>">
                <label for="first_name">First name: *</label>
		<input type="text" name="first_name" class="form-control" value="<?php echo $first; ?>">
		<span class="help-block purple"><?php echo $fe;?></span>
              </div> 
    
              <div class="form-group <?php echo (!empty($le)) ? 'has-error' : ''; ?>>">
                <label for="last_name">Last name: *</label>
		<input type="text" name="last_name" class="form-control" value="<?php echo $last; ?>">
		<span class="help-block purple"><?php echo $le;?></span>
              </div>

              <div class="form-group <?php echo (!empty($ee)) ? 'has-error' : ''; ?>>">
                <label for="email_id">Email address: *</label>
		<input type="email" name="email_id" class="form-control" value="<?php echo $email; ?>">
		<span class="help-block purple"><?php echo $ee;?></span>
              </div>

              <div class="form-group <?php echo (!empty($ue)) ? 'has-error' : ''; ?>>">
                <label for="user_name">User name: *</label>
		<input type="text" name="user_name" class="form-control" value="<?php echo $user; ?>">
		<span class="help-block purple"><?php echo $ue;?></span>
              </div>

              <div class="form-group <?php echo (!empty($pe)) ? 'has-error' : ''; ?>>">
                <label for="passwd">Password: *</label>
		<input type="password" name="passwd" class="form-control" value="<?php echo $pass; ?>">
		<span class="help-block purple"><?php echo $pe;?></span>
              </div>
	      </div>
	      <div class="col-md-6">
              <div class="form-group <?php echo (!empty($p1e)) ? 'has-error' : ''; ?>>">
                <label for="phone_1">Phone 1: *</label>
		<input maxlength="10" type="text" name="phone_1" class="form-control" value="<?php echo $phone1; ?>">
		<span class="help-block purple"><?php echo $p1e;?></span>
              </div>

              <div class="form-group <?php echo (!empty($p2e)) ? 'has-error' : ''; ?>>">
                <label for="phone_2">Phone 2:</label>
		<input maxlength="10" type="text" name="phone_2" class="form-control" value="<?php echo $phone2; ?>">		
		<span class="help-block purple"><?php echo $p2e;?></span>
              </div>

              <div class="form-group <?php echo (!empty($pthe)) ? 'has-error' : ''; ?>>">
                <label for="photo_path">Photo path:</label>
		<input type="text" name="photo_path" class="form-control" value="<?php echo $path; ?>">	
		<span class="help-block purple"><?php echo $pthe;?></span>
              </div>
    
              <div class="form-group <?php echo (!empty($te)) ? 'has-error' : ''; ?>>">
                <label for="user_type">User type: *</label>
		<select name="user_type" class="form-control" value="<?php echo $type; ?>">
		  <option value="Driver">Driver</option>
		  <option value="Admin">Admin</option>
		</select>
		<span class="help-block purple"><?php echo $te;?></span>	
              </div>

              <div class="form-group <?php echo (!empty($ce)) ? 'has-error' : ''; ?>>">
                <label for="color">Color:</label>
		<input type="color" name="color" class="form-control" value="<?php echo $col; ?>">	
		<span class="help-block purple"><?php echo $ce;?></span>
              </div>
	      </div>
            <div><input type="submit" class='btn btn-block btn-custom' value="Add"/></div>
            </form>
	    <p></p><p></p>
          </div>
        </div>
    </div>    
  </body>
</html>


