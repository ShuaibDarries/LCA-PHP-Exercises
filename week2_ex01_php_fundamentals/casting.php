<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Type Casting</title>
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
        .before {
            color: #888;
        }
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
        <h1>PHP Type Casting</h1>
        <p>This page demonstrates all PHP casting methods: <code>(int)</code>, <code>(float)</code>, <code>(string)</code>, and <code>(bool)</code>.</p>
    </div>

    <div class="card">
        <h2>Cast to Integer — <code>(int)</code></h2>
        <?php
            $floatVal = 9.78;
            $stringVal = "42";
            $boolVal = true;

            $cast1 = (int)$floatVal;
            $cast2 = (int)$stringVal;
            $cast3 = (int)$boolVal;
        ?>
        <table>
            <tr><th>Original Value</th><th>Original Type</th><th>Cast Result</th><th>New Type</th></tr>
            <tr><td><?php echo $floatVal; ?></td><td><?php echo gettype($floatVal); ?></td><td class="value"><?php echo $cast1; ?></td><td><?php echo gettype($cast1); ?></td></tr>
            <tr><td><?php echo var_export($stringVal, true); ?></td><td><?php echo gettype($stringVal); ?></td><td class="value"><?php echo $cast2; ?></td><td><?php echo gettype($cast2); ?></td></tr>
            <tr><td><?php echo var_export($boolVal, true); ?></td><td><?php echo gettype($boolVal); ?></td><td class="value"><?php echo $cast3; ?></td><td><?php echo gettype($cast3); ?></td></tr>
        </table>
    </div>

    <div class="card">
        <h2>Cast to Float — <code>(float)</code></h2>
        <?php
            $intVal = 7;
            $stringFloat = "3.14";
            $boolFalse = false;

            $cast4 = (float)$intVal;
            $cast5 = (float)$stringFloat;
            $cast6 = (float)$boolFalse;
        ?>
        <table>
            <tr><th>Original Value</th><th>Original Type</th><th>Cast Result</th><th>New Type</th></tr>
            <tr><td><?php echo $intVal; ?></td><td><?php echo gettype($intVal); ?></td><td class="value"><?php echo $cast4; ?></td><td><?php echo gettype($cast4); ?></td></tr>
            <tr><td><?php echo var_export($stringFloat, true); ?></td><td><?php echo gettype($stringFloat); ?></td><td class="value"><?php echo $cast5; ?></td><td><?php echo gettype($cast5); ?></td></tr>
            <tr><td><?php echo var_export($boolFalse, true); ?></td><td><?php echo gettype($boolFalse); ?></td><td class="value"><?php echo $cast6; ?></td><td><?php echo gettype($cast6); ?></td></tr>
        </table>
    </div>

    <div class="card">
        <h2>Cast to String — <code>(string)</code></h2>
        <?php
            $intForString = 99;
            $floatForString = 2.718;
            $boolForString = true;

            $cast7 = (string)$intForString;
            $cast8 = (string)$floatForString;
            $cast9 = (string)$boolForString;
        ?>
        <table>
            <tr><th>Original Value</th><th>Original Type</th><th>Cast Result</th><th>New Type</th></tr>
            <tr><td><?php echo $intForString; ?></td><td><?php echo gettype($intForString); ?></td><td class="value"><?php echo $cast7; ?></td><td><?php echo gettype($cast7); ?></td></tr>
            <tr><td><?php echo $floatForString; ?></td><td><?php echo gettype($floatForString); ?></td><td class="value"><?php echo $cast8; ?></td><td><?php echo gettype($cast8); ?></td></tr>
            <tr><td><?php echo var_export($boolForString, true); ?></td><td><?php echo gettype($boolForString); ?></td><td class="value"><?php echo $cast9; ?></td><td><?php echo gettype($cast9); ?></td></tr>
        </table>
    </div>

    <div class="card">
        <h2>Cast to Boolean — <code>(bool)</code></h2>
        <?php
            $zero = 0;
            $nonZero = -5;
            $emptyString = "";
            $nonEmptyString = "Hello";

            $cast10 = (bool)$zero;
            $cast11 = (bool)$nonZero;
            $cast12 = (bool)$emptyString;
            $cast13 = (bool)$nonEmptyString;
        ?>
        <table>
            <tr><th>Original Value</th><th>Original Type</th><th>Cast Result</th><th>New Type</th></tr>
            <tr><td><?php echo $zero; ?></td><td><?php echo gettype($zero); ?></td><td class="value"><?php echo var_export($cast10, true); ?></td><td><?php echo gettype($cast10); ?></td></tr>
            <tr><td><?php echo $nonZero; ?></td><td><?php echo gettype($nonZero); ?></td><td class="value"><?php echo var_export($cast11, true); ?></td><td><?php echo gettype($cast11); ?></td></tr>
            <tr><td><?php echo var_export($emptyString, true); ?></td><td><?php echo gettype($emptyString); ?></td><td class="value"><?php echo var_export($cast12, true); ?></td><td><?php echo gettype($cast12); ?></td></tr>
            <tr><td><?php echo var_export($nonEmptyString, true); ?></td><td><?php echo gettype($nonEmptyString); ?></td><td class="value"><?php echo var_export($cast13, true); ?></td><td><?php echo gettype($cast13); ?></td></tr>
        </table>
        <p style="margin-top:12px; color:#666; font-size:0.95rem;"><em>Note: In PHP, <code>0</code>, <code>0.0</code>, <code>""</code>, <code>"0"</code>, <code>null</code>, and empty arrays cast to <code>false</code>. Everything else casts to <code>true</code>.</em></p>
    </div>

</body>
</html>
