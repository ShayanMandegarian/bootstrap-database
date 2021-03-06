<!DOCTYPE html>
<!-- Note: This file uses the exact same output style as the output.html.php file
except it searches for is_deleted = 1 instead of 0 and has different choices in
the 'action' section. -->


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Removed Employees</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js">
    </script>
    <style type="text/css">
        .wrapper{
            width: 800px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
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
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
  <body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Removed Employees</h2>
			  <a href="http://localhost/ppt" class="btn btn-custom pull-right">Back</a>
              <table class='table table-bordered table-striped'>
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
		    <th>Username</th>
		    <th>Phone</th>
		    <th>Type</th>
                    <th>Action</th>
                  </tr>
                </thead>
		<tbody>
      <?php foreach($users as $user)
            {
	      if($user['dl'] == 1)
 	      {  ?> 
                <tbody>
                  <tr>
                    <?php echo "<td>" . $user['id'] ."</td>"; 
                          echo "<td>" . $user['fn'] ."</td>"; 
                          echo "<td>" . $user['ln'] ."</td>";
                          echo "<td>" . $user['em'] ."</td>";
		          echo "<td>" . $user['un'] ."</td>";
		          echo "<td>" . $user['p1'] ."</td>";
		          echo "<td>" . $user['ut'] ."</td>";
		          echo "<td>"; 
			  echo "<a href='restore.php?id=". $user['id'] ."' title='Restore' data-toggle='tooltip'><span class='glyphicon glyphicon-repeat purple'></span></a>";
			  echo "<a href='perma.php?id=". $user['id'] ."' title='Delete' data-toggle='tooltip'><span class='glyphicon glyphicon-fire purple'></span></a>"; ?>
		    </td>
		  </tr>	
	          <?php }} ?>
	        </tbody>
	      </table> 
        </div>
      </div>
    </div>
  </div>
</body>
</html>

