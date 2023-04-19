<html>
    <body>
        <?php
        $username=$_POST["username"];
        ?>
        <h2>Your Input:</h2>
        <table>
            <tr>
                <td>USERNAME:</td>
                <td><?php echo $username?></td>
            </tr>
            <tr>
                <td>EMAIL:</td>
                <td><?php echo $_POST["email"]?></td>
            </tr>
            <tr>
                <td>GENDER:</td>
                <td><?php echo $_POST["gen"]?></td>
            </tr>
            <tr>
                <td>RELIGION:</td>
                <td><?php echo $_POST["rel"]?></td>
            </tr>
            <tr>
                <td>DOB:</td>
                <td><?php echo $_POST["dob"]?></td>
            </tr>
            <tr>
                <td>LANGUAGES:</td>
                <td><?php echo $_POST["language"]?></td>
            </tr>
            <tr>
                <td>ADDRESS:</td>
                <td><?php echo $_POST["add"]?></td>
            </tr>
            <tr>
                <td>PASSWORD:</td>
                <td><?php echo $_POST["password"]?></td>
            </tr>
            <tr>
                <td>CONFIRM PASSWORD:</td>
                <td><?php echo $_POST["cpassword"]?></td>
            </tr>
</table>
</body>
</html>
