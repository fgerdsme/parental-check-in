<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
.button {
        position: absolute;
        top: 25px;
        left: 25px;
        width: calc(100% - 50px);
        height: calc(100% - 50px);
        background-color: green;
        color: white;
        text-align: center;
        padding: 14px;
        box-sizing: border-box;
      }
    </style>
</head>

<body>
    <script>
    <?php 
        include_once 'util.php';

        if ($_GET && isset($_GET['check_in'])) {
            checkIn();
        }
    ?>
    </script>

    <form>
        <input type="submit" name="check_in" class="button" value="CHECK_IN" />
    </form>
</body>

</html>