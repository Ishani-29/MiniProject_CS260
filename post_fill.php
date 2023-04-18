<?php

session_start();

if (isset($_SESSION["company_name"])) {

    $mysqli = require __DIR__ . "/connection.php";

} else{
    header("Location: company_login.php");
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="https://cdn.skypack.dev/-/sakura.css@v1.3.1-VmH2VZPA3IgYndF0s0Cx/dist=es2020,mode=raw/css/sakura.css"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
  .jumbotron {
    background-color: #C6E6FB;
    color: black;
    align-self: center;
    margin-top: 50px;
    width: 80%;
    align-content: center;
    margin-left: 100px;
  }
  .button {
  background-color: white;
  border: none;
  color: black;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  width: 20%;
  border-radius: 5px;
}
  </style>
</head>
   
    <div class="container">
<div class="jumbotron text-center">
<p class="text-center"><h3>Fill in the post details</h3></p> <br>
    <form method = "post" action = "post_fill_process.php" novalidate >

    <table class="table table-dark table-striped table-bordered table-sm">
        <tbody>
        <tr>
           <td> <label for = "n_post" >New Post</td>
            <td><input type ="text" id="n_post" name = "n_post"></td>
</tr>

        <tr>
            <td><label for = "n_cpi" >Min cpi for new post</label></td>
            <td><input type ="number" min="0" max="10" step="0.01" id="n_cpi" name = "n_cpi"></td>
</tr>

        <tr>
            <td><label for = "n_qual" >Qualification</label></td>
            <td><input type ="text" id="n_qual" name = "n_qual"></td>
</tr>

        <tr>
           <td> <label for = "n_sal" >Package</label></td>
           <td> <input type ="number" step="1" id="n_sal" name = "n_sal"></td>
</tr>

        
</tbody>
</table>
<button class="button">Add Post</button>
    </form>
</div>
</div>
</html>