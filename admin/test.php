
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer">

    <title>WhatsApp Contact</title>
</head>
<body>
    <h1>Contact Users via WhatsApp</h1>
    <ul>
        <?php foreach ($phoneNumbers as $phoneNumber): ?>
            <li>
                User <?php echo $phoneNumber['id']; ?>: <?php echo $phoneNumber['number']; ?>
                <button onclick="whatsappUser('<?php echo $phoneNumber['number']; ?>')">WhatsApp User</button>
            </li>
        <?php endforeach; ?>
    </ul>

    <script>
        function whatsappUser(phoneNumber) {
            window.location.href = `https://wa.me/${phoneNumber}`;
        }
    </script>
</body>
</html>
