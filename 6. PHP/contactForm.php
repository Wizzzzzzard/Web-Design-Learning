<?php

    //print_r($_POST); PHP extracts the name value rather than the id value of HTML elements

    $error = "";
    
    if ($_POST) {


        if (!$_POST["email"]) {

            $error .= "An email address is required<br>";

        }

        if (!$_POST["subject"]) {

            $error .= "A Subject is required<br>";

        }

        if (!$_POST["content"]) {

            $error .= "Email content is required<br>";

        }

        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {

            $error .= '$_POST["email"] is not a valid email address<br>';

        }
        
        if ($error != "") {
            
            $error = '<div class="alert alert-danger" role="alert"> <p><strong>There were error(s) in your form:</strong></p>' . $error . '</div>';

        } else {

            $emailTo = "elijah797@gmail.com";

            $subject = $_POST['subject'];

            $content = $_POST['content'];

            $headers = "From: ".$_POST['email'];

            if (mail($emailTo, $subject, $content, $headers)) {

                $successMessage = '<div class="alert alert-success" role="alert"> <p><strong>Your message was sent, we\'ll get back to you ASAP! </strong></p>' . $error . '</div>';
            
            } else {

                $error = '<div class="alert alert-danger" role="alert"> <p><strong>Your message couldn\'t be sent, please try again later!</div>';

            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
    
    <head>
      
        <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
        <style type=text/css>


        </style>

    </head>

    <body>

        <div class="container">

            <h1>Get in touch!</h1>

            <form method="post">
                <fieldset class="form-group">
                    <label for="inputEmail" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="inputEmail" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </fieldset>

                <fieldset class="form-group">
                    <label for="inputSubject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="inputSubject" name="subject" aria-describedby="emailHelp">
                </fieldset>

                <fieldset class="form-group">
                    <label for="questionBox" class="form-label">What would you like to ask us?</label>
                    <textarea class="form-control" id="questionBox" name="content" rows="3" aria-label="With textarea"></textarea>
                </fieldset>
                <br>
                <button id-="submit" type="submit" class="btn btn-primary">Submit</button>
            </form>

            <div id=error><? echo $error; ?></div>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
            
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <script type="text/javascript">

            $("form").submit(function (e) {

                var errorMessage = "";
                var fieldsMissing = "";

                if ($("#inputEmail").val() == "") {
                            
                    fieldsMissing += "The Email Address field is required.<br>";
                                    
                }
                        
                if ($("#inputSubject").val() == "") {
                            
                    fieldsMissing += "The Subject field is required.<br>";
                            
                }
                        
                if ($("#questionBox").val() == "") {
                            
                    fieldsMissing += "The Email Body is required.";
                            
                }
                        
                if (fieldsMissing != "") {
                            
                    errorMessage += fieldsMissing;
                            
                }
                        
                
                if (errorMessage != "") {
                            
                    $("#error").html('<div class="alert alert-danger" role="alert"> <p><strong>There were error(s) in your form:</strong></p>' + errorMessage + '</div>');

                    return false;
                            
                } else {
                            
                    return true;           

                }

            });

        </script>
    </body>
</html>