
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
