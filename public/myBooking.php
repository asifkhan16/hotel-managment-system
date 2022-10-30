<?php
include("./config.php");
// Check if user is already logged in
if (!isLoggedIn()) {
    header("Location: login.php");
}
$user_id = $_SESSION["user_id"];
$sql = "SELECT * FROM reservations JOIN rooms ON reservations.room_id = rooms.room_id  where user_id = $user_id";
$statement = $pdo->prepare($sql);
$statement->execute();
$reserved_rooms = $statement->fetchAll(PDO::FETCH_ASSOC);
$i = 1;

// var_dump($reserved_rooms);

?>

<?php include("./includes/header.php"); ?>

<body>
    <?php include("./includes/navbar.php"); ?>

    <div class="container py-5">
        <h1 class="mb-5">My Reserved Room</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">S-no</th>
                    <th scope="col">Booking Date</th>
                    <th scope="col">Room</th>
                    <th scope="col">No of Adults</th>
                    <th scope="col">No of childrens</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reserved_rooms as $room) {
                ?>
                    <tr>
                        <th scope="row"><?php echo $i; ?></th>
                        <td><?php echo $room['reservation_created']; ?></td>
                        <td><?php echo $room['room_name']; ?></td>
                        <td><?php echo $room['no_adults']; ?></td>
                        <td><?php echo $room['no_children']; ?></td>
                    </tr>
                <?php
                $i++;
                }
                ?>
            </tbody>
        </table>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- Bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- Custom js -->
    <script src="./js/handle-home-form.js"></script>
    <script src="./js/parallax.js"></script>
    <script src="./js/smooth-scroll.js"></script>

</body>

</html>