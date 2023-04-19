<?php
    include("util/dbhelper.php");
    session_start();
    if($_SESSION['user']==null) header("location:index.php?message=LOGIN PROPERLY");
?>

<script>

    function modalcontrol(modalname,action){
        document.getElementById('mymodal').style.display=action;
        console.log('Test');
    }

    function removeItem(id){
        var ok=confirm("Do you want to delete this student");
        if(ok)
            location.href="deletestudent.php?id="+id;
    }

    function updateItem(idno,lastname,firstname,course,level){
        document.getElementById('idno').value=idno;
        document.getElementById('lastname').value=lastname;
        document.getElementById('firstname').value=firstname;
        document.getElementById('course').value=course;
        document.getElementById('level').value=level;
        modalcontrol('mymodal','block');
    }

</script>   

<html>
    <head>
        <!-- None -->
        <link rel="stylesheet" href="assets/css/w3.css">
    </head>
    <body>
        <div>
            <div>STUDENT LIST</div>
            <br>
            <a href="logout.php">LOGOUT</a>
            <br>
            <br>
        </div>
        <div>
            <button class="" onclick="modalcontrol('mymodal','block')">+ADD</button>
            <br><br>
            <table>
                <?php
                    $header=['IDNO','LASTNAME','FIRSTNAME','COURSE','LEVEL','ACTION'];
                    echo "<tr>";
                        foreach($header as $h){
                            echo "<th>".$h."</th>";
                        }
                    echo "</tr>";
                    $list=getAll('student');
                    foreach($list as $s){
                        echo "<tr>";
                            echo "<td>".$s['idno']."</td>";
                            echo "<td>".$s['lastname']."</td>";
                            echo "<td>".$s['firstname']."</td>";
                            echo "<td>".$s['course']."</td>";
                            echo "<td>".$s['level']."</td>";
                            echo "<td>";
                                echo "<button onclick=removeItem(".$s['id'].")>Delete</button>";
                                echo "&nbsp";
                                echo "<button onclick=updateItem('".$s['idno']."','".$s['lastname']."','".$s['firstname']."','".$s['course']."','".$s['level']."')>Edit</button>";
                            echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
        </div>
        <div class="w3-modal" id="mymodal">
            <div class="w3-modal-content w3-animate-top">
                <div class="w3-container w3-padding-large w3-blue">
                    <p>STUDENT INFO</p>
                    <span class="w3-display-topright w3-button" onclick="modalcontrol('mymodal','none')">&times;</span>
                </div>
                <br>
                    <div class="w3-padding-large">
                        <form action="savestudent.php" method="post">
                            <div>
                                <label>IDNO</label>
                                <input type="text" id="idno" name="idno" class="w3-input w3-border">
                            </div>
                            <div>
                                <label>LASTNAME</label>
                                <input type="text" id="lastname" name="lastname" class="w3-input w3-border">
                            </div>
                            <div>
                                <label>FIRSTNAME</label>
                                <input type="text" id="firstname" name="firstname" class="w3-input w3-border">
                            </div>
                            <div>
                                <label>COURSE</label>
                                <input type="text" id="course" name="course" class="w3-input w3-border">
                            </div>
                            <div>
                                <label>LEVEL</label>
                                <input type="text" id="level" name="level" class="w3-input w3-border">
                            </div>
                            <div class="w3-center">
                                <?php
                                    if(isset($_GET['message'])){
                                        echo $_GET['message'];
                                    }
                                ?>
                            </div>
                            <br>
                            <button type="submit" name="save" class="w3-button w3-blue">SAVE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>