<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intro to PHP</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background: #f5f7fa;
            color: #333;
        }
        .card {
            background: #fff;
            border-radius: 12px;
            padding: 28px 32px;
            margin-bottom: 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        h1 {
            color: #1a73e8;
            margin-top: 0;
        }
        .label {
            font-weight: 600;
            color: #555;
        }
        .value {
            color: #1a73e8;
            font-weight: 700;
        }
        .lucky {
            font-size: 1.1rem;
            color: #d93025;
            font-weight: 700;
        }
    </style>
</head>
<body>

    <!-- Embed PHP into HTML: Welcome message in h1 -->
    <div class="card">
        <?php
            // Time-based greeting (Stretch Goal 24)
            $hour = date('H');
            if ($hour < 12) {
                $greeting = "Good morning";
            } elseif ($hour < 18) {
                $greeting = "Good afternoon";
            } else {
                $greeting = "Good evening";
            }
        ?>
        <h1><?php echo $greeting; ?>! Welcome to PHP Programming!</h1>
    </div>

    <div class="card">
        <?php
            // Use echo to print name and favourite programming language with a reason
            $name = "Alex Johnson";
            $favLanguage = "PHP";
            $reason = "it powers most of the web and is beginner-friendly";

            echo "<p><span class='label'>Name:</span> <span class='value'>$name</span></p>";
            echo "<p><span class='label'>Favourite Language:</span> <span class='value'>$favLanguage</span></p>";
            echo "<p><span class='label'>Reason:</span> I love $favLanguage because $reason.</p>";
        ?>
    </div>

    <div class="card">
        <?php
            // Calculate and print the sum of two numbers
            $num1 = 42;
            $num2 = 58;
            $sum = $num1 + $num2;

            print "<p><span class='label'>Number 1:</span> $num1</p>";
            print "<p><span class='label'>Number 2:</span> $num2</p>";
            print "<p><span class='label'>Sum:</span> <span class='value'>$sum</span></p>";
        ?>
    </div>

    <div class="card">
        <?php
            // Display today's date using date() in the format:
            // "Today is [Day], [Month] [Date], [Year]"
            $today = date("l, F j, Y");
            echo "<p><span class='label'>Date:</span> Today is $today</p>";
        ?>
    </div>

    <div class="card">
        <?php
            // Generate and display a random number between 1 and 100 using rand()
            $luckyNumber = rand(1, 100);
        ?>
        <p class="lucky">🎲 Your lucky number today is: <?php echo $luckyNumber; ?>!</p>
    </div>

</body>
</html>
