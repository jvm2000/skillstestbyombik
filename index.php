
<html>
    <head>
        <!-- None -->
    </head>
    <body>
        <div>
            STUDENT LOGIN FORM
        </div>
        <br>
        <div>
            <form action="login.php" method="post">
                <div>
                    <label for="username">USERNAME:</label>
                    <input type="text" name="username" id="username"/>
                </div>
                <div>
                    <label for="password">PASSWORD:</label>
                    <input type="password" name="password" id="password"/>
                </div>
                <div>
                    <?php
                        if(isset($_GET['message'])){
                            echo($_GET['message']);
                        }
                    ?>
                </div>
                <br>
                <button type="submit">LOGIN</button>
            </form>
        </div>
    </body>
</html>