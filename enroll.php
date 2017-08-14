<?php
$email="byp@gmail.com";
$name="joy";
 ?><html>
<head>
  <title>Registration Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <script>
      (function(w,d,t,u,n,a,m){w['MauticTrackingObject']=n;
          w[n]=w[n]||function(){(w[n].q=w[n].q||[]).push(arguments)},a=d.createElement(t),
          m=d.getElementsByTagName(t)[0];a.async=1;a.src=u;m.parentNode.insertBefore(a,m)
      })(window,document,'script','http://mautic.invensislearning.com/mtc.js','mt');

      mt('send', 'pageview', {email: '<?php echo $email;?>', firstname: '<?php echo $name;?>'});
  </script>

</head>
<body>
<div class="container col-sm-4"></div>
<div class="container col-sm-4">
  <h2>Purchase</h2>
  <form method="post" action="addcontact.php">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
    </div>
    <div class="form-group">
      <label for="first">First Name:</label>
      <input type="text" class="form-control" id="first" placeholder="Enter First Name" name="first" required>
    </div>
    <div class="form-group">
      <label for="email">Last Name:</label>
      <input type="text" class="form-control" id="last" placeholder="Enter Last name" name="last" required>
    </div>
    <div class="form-group">
      <label for="Course">Select Course:</label>
      <select class="form-control" id="last" name="course" required>
        <option value="ITIL Foundation"> ITIL Foundation </option>
        <option value="ITIL Service Strategy">ITIL Service Strategy</option>
        <option value="ITIL Service Design">ITIL Service Design</option>
        <option value="ITIL Service Operation">ITIL  Service Operation</option>
      </select>
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
  </form>

</div>

</body>
</html>
