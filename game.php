<?php
    $names = ['Rock', 'Paper', 'Scissors'];

    if (!isset($_POST['who']) || strlen($_POST['who']) < 1) {
        die("Name parameter missing");
    }

    $human = isset($_POST["move"]) ? $_POST["move"] + 0 : -1;
    $computer = rand(0, 2);

    function check($computer, $human) {
        if ($human == $computer) return "Tie";
        elseif (($human == 0 && $computer == 2) ||
                ($human == 1 && $computer == 0) ||
                ($human == 2 && $computer == 1)) {
            return "You Win";
        } else {
            return "You Lose";
        }
    }

    $result = check($computer, $human);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Game - 306d6dea</title>
</head>
<body>
    <h1>Rock Paper Scissors</h1>
    <p>Hello <?= htmlentities($_POST['who']) ?>, let's play!</p>

    <form method="post">
        <input type="hidden" name="who" value="<?= htmlentities($_POST['who']) ?>">
        <select name="move">
            <option value="0">Rock</option>
            <option value="1">Paper</option>
            <option value="2">Scissors</option>
        </select>
        <input type="submit" value="Play">
    </form>

    <?php if ($human != -1): ?>
        <p>Your Play=<?= $names[$human] ?>, Computer Play=<?= $names[$computer] ?>, Result=<?= $result ?></p>
    <?php endif; ?>
</body>
</html>
