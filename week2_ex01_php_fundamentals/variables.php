<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Variables & BMI Calculator</title>
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
        .bio {
            line-height: 1.7;
            font-size: 1.05rem;
        }
        .bmi-result {
            font-size: 1.2rem;
            margin-top: 10px;
        }
        .category {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 700;
            color: #fff;
        }
        .underweight { background: #3498db; }
        .normal { background: #27ae60; }
        .overweight { background: #f39c12; }
        .obese { background: #e74c3c; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }
        th, td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }
        th {
            background: #f0f4ff;
            color: #1a73e8;
        }
        tr.highlight {
            background: #fff8e1;
            font-weight: 700;
        }
        .type-box {
            background: #f0f4ff;
            padding: 12px 16px;
            border-radius: 8px;
            margin: 8px 0;
        }
    </style>
</head>
<body>

    <div class="card">
        <h1>My Bio</h1>
        <?php
            // Declare variables for name, age, favourite colour, and favourite hobby
            $name = "Alex Johnson";
            $age = 24;
            $favColour = "Ocean Blue";
            $favHobby = "hiking Table Mountain trails";

            // Display them as a formatted bio paragraph
            echo "<p class='bio'>";
            echo "Hello! My name is <span class='value'>$name</span>. ";
            echo "I am <span class='value'>$age</span> years old. ";
            echo "My favourite colour is <span class='value'>$favColour</span>, ";
            echo "and in my free time I enjoy <span class='value'>$favHobby</span>.";
            echo "</p>";
        ?>
    </div>

    <div class="card">
        <h2>BMI Calculator</h2>
        <?php
            // BMI calculator: height in metres, weight in kilograms
            $height = 1.75;  // metres
            $weight = 72.5;  // kilograms

            // BMI formula: weight / (height * height)
            $bmi = $weight / ($height * $height);
            $bmiRounded = round($bmi, 1);

            // Determine weight category
            if ($bmi < 18.5) {
                $category = "Underweight";
                $cssClass = "underweight";
            } elseif ($bmi < 25) {
                $category = "Normal weight";
                $cssClass = "normal";
            } elseif ($bmi < 30) {
                $category = "Overweight";
                $cssClass = "overweight";
            } else {
                $category = "Obese";
                $cssClass = "obese";
            }
        ?>
        <p><span class="label">Height:</span> <?php echo $height; ?> m</p>
        <p><span class="label">Weight:</span> <?php echo $weight; ?> kg</p>
        <p class="bmi-result">
            <span class="label">Your BMI:</span> 
            <span class="value"><?php echo $bmiRounded; ?></span> 
            — <span class="category <?php echo $cssClass; ?>"><?php echo $category; ?></span>
        </p>

        <!-- Stretch Goal 25: Full BMI category table with highlighted row -->
        <h3>BMI Category Reference</h3>
        <table>
            <tr>
                <th>Category</th>
                <th>BMI Range</th>
            </tr>
            <tr class="<?php echo ($category === 'Underweight') ? 'highlight' : ''; ?>">
                <td>Underweight</td>
                <td>Less than 18.5</td>
            </tr>
            <tr class="<?php echo ($category === 'Normal weight') ? 'highlight' : ''; ?>">
                <td>Normal weight</td>
                <td>18.5 – 24.9</td>
            </tr>
            <tr class="<?php echo ($category === 'Overweight') ? 'highlight' : ''; ?>">
                <td>Overweight</td>
                <td>25.0 – 29.9</td>
            </tr>
            <tr class="<?php echo ($category === 'Obese') ? 'highlight' : ''; ?>">
                <td>Obese</td>
                <td>30.0 and above</td>
            </tr>
        </table>
    </div>

    <div class="card">
        <h2>Type Conversion & Inspection</h2>
        <?php
            // Assign a float, convert it to an integer using intval(), and print both values
            $originalFloat = 84.7;
            $convertedInt = intval($originalFloat);
        ?>
        <p><span class="label">Original Float:</span> <?php echo $originalFloat; ?></p>
        <p><span class="label">Converted to Int (intval):</span> <?php echo $convertedInt; ?></p>
    </div>

    <div class="card">
        <h2>Data Type Inspection (gettype)</h2>
        <?php
            // Use gettype() to identify and print the data type of an integer, float, string, and array
            $testInt = 42;
            $testFloat = 3.14;
            $testString = "Hello PHP";
            $testArray = array("Cape Town", "Johannesburg", "Durban");
        ?>
        <div class="type-box">
            <p><span class="label">Value:</span> <?php echo $testInt; ?> | <span class="label">Type:</span> <?php echo gettype($testInt); ?></p>
        </div>
        <div class="type-box">
            <p><span class="label">Value:</span> <?php echo $testFloat; ?> | <span class="label">Type:</span> <?php echo gettype($testFloat); ?></p>
        </div>
        <div class="type-box">
            <p><span class="label">Value:</span> <?php echo $testString; ?> | <span class="label">Type:</span> <?php echo gettype($testString); ?></p>
        </div>
        <div class="type-box">
            <p><span class="label">Value:</span> <?php echo implode(", ", $testArray); ?> | <span class="label">Type:</span> <?php echo gettype($testArray); ?></p>
        </div>
    </div>

</body>
</html>
