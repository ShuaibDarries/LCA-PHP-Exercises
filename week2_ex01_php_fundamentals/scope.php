<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Variable Scope</title>
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
        h1, h2 {
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
        .error {
            color: #d93025;
            font-weight: 600;
            background: #fce8e6;
            padding: 10px 14px;
            border-radius: 8px;
        }
        .success {
            color: #137333;
            font-weight: 600;
            background: #e6f4ea;
            padding: 10px 14px;
            border-radius: 8px;
        }
        code {
            background: #f1f3f4;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: 'Courier New', monospace;
        }
    </style>
</head>
<body>

    <div class="card">
        <h1>PHP Variable Scope Demonstration</h1>
        <p>This page demonstrates <code>global</code>, <code>local</code>, and <code>static</code> variable scope in PHP.</p>
    </div>

    <!-- GLOBAL SCOPE -->
    <div class="card">
        <h2>1. Global Variable</h2>
        <?php
            // Declare a global variable
            $globalAgency = "TechVibe";

            // Demonstrate its behaviour inside a function using the global keyword
            function showGlobalAgency() {
                global $globalAgency;
                echo "<p class='success'>Inside function: The agency name is <span class='value'>$globalAgency</span></p>";
            }

            echo "<p><span class='label'>Outside function:</span> The agency name is <span class='value'>$globalAgency</span></p>";
            showGlobalAgency();
        ?>
    </div>

    <!-- LOCAL SCOPE -->
    <div class="card">
        <h2>2. Local Variable</h2>
        <?php
            // Declare a local variable inside a function and show it is not accessible outside
            function setLocalLocation() {
                $localCity = "Cape Town";
                echo "<p class='success'>Inside function: The city is <span class='value'>$localCity</span></p>";
            }

            setLocalLocation();

            // Attempt to access the local variable outside the function
            echo "<p><span class='label'>Outside function:</span> Trying to access \$localCity...</p>";
            if (isset($localCity)) {
                echo "<p>Value: $localCity</p>";
            } else {
                echo "<p class='error'>Notice: Undefined variable: localCity — local variables are not accessible outside their function.</p>";
            }
        ?>
    </div>

    <!-- STATIC SCOPE -->
    <div class="card">
        <h2>3. Static Variable</h2>
        <p>A <code>static</code> variable retains its value across multiple function calls.</p>
        <?php
            // Use the static keyword inside a function to retain a variable's value
            // across multiple function calls. Call the function three times.
            function incrementVisitorCount() {
                static $visitorCount = 0;
                $visitorCount++;
                echo "<p class='success'>Function call: Visitor count is now <span class='value'>$visitorCount</span></p>";
            }

            incrementVisitorCount();
            incrementVisitorCount();
            incrementVisitorCount();
        ?>
        <p><span class='label'>Result:</span> Each call remembered the previous value because <code>static</code> preserves it.</p>
    </div>

</body>
</html>
