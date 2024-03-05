<html>

<head>
    <title>Live Username Available or not By using PHP Ajax Jquery</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <style>
        body {
            margin: 0;
            padding: 0;
            background-color: #f1f1f1;
        }

        .box {
            width: 800px;
            border: 1px solid #ccc;
            background-color: #fff;
            border-radius: 5px;
            margin-top: 36px;
        }
    </style>
</head>

<body>
    <div class="container box">
        <div class="form-group">
            <h3 align="center">Live Username Available or not By using PHP Ajax Jquery</h3><br />
            <label>Enter Username</label>
            <input type="text" name="username" id="username" class="form-control" />
            <span id="availability"></span>
            <br /><br />
            <button type="button" name="register" class="btn btn-info" id="register" disabled>Register</button>
            <br />
        </div>
        <br />
        <br />
    </div>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#username').keyup(function() {

                var username = $(this).val();

                $.ajax({
                    url: 'demo.php',
                    method: "POST",
                    data: {
                        user_name: username
                    },
                    success: function(data) {
                        if (data != '0') {
                            $('#availability').html('<span class="text-danger">Username not available</span>');
                            $('#register').attr("disabled", true);
                        }
                        else {
                            $('#availability').html('<span class="text-success">Username Available</span>');
                            $('#register').attr("disabled", false);
                        }
                    }
                })

            });
        });
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>

</html>