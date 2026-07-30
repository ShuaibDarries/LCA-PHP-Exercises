<?php
// Week 2 - Exercise 02: PHP Logic, Loops & Functions
// loops.php - Demonstrates for, while, do-while, and foreach loops
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loops Demo</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 700px; margin: 40px auto; padding: 20px; background: #f8f9fa; }
        h1, h2 { color: #1a1a2e; }
        .card { background: #fff; border-radius: 8px; padding: 20px; margin-bottom: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.08); }
        .output { background: #1e1e1e; color: #d4d4d4; padding: 12px; border-radius: 6px; margin-top: 10px; line-height: 1.6; }
        .output span { display: block; }
    </style>
</head>
<body>

<h1>Loops Demonstration</h1>

<!-- ============================================
     1. FOR LOOP: 0 to 10
     ============================================ -->
<div class="card">
    <h2>1. For Loop (0 to 10)</h2>
    <div class="output">
    <?php
    for ($i = 0; $i <= 10; $i++) {
        echo "<span>$i is equal to $i</span>";
    }
    ?>
    </div>
</div>

<!-- ============================================
     2. FOREACH LOOP: South African Cities
     ============================================ -->
<div class="card">
    <h2>2. Foreach Loop — South African Cities</h2>
    <div class="output">
    <?php
    $cities = ["Cape Town", "Johannesburg", "Durban", "Pretoria", "Port Elizabeth"];
    foreach ($cities as $city) {
        echo "<span>$city</span>";
    }
    ?>
    </div>
</div>

<!-- ============================================
     3. WHILE LOOP: 10 to 0
     ============================================ -->
<div class="card">
    <h2>3. While Loop (10 to 0)</h2>
    <div class="output">
    <?php
    $counter = 10;
    while ($counter >= 0) {
        echo "<span>$counter is equal to: $counter</span>";
        $counter--;
    }
    ?>
    </div>
</div>

<!-- ============================================
     4. DO-WHILE LOOP: Starts at 6, runs while <= 5
     ============================================ -->
<div class="card">
    <h2>4. Do-While Loop (Starts at 6, condition &le; 5)</h2>
    <div class="output">
    <?php
    $counter = 6;
    do {
        echo "<span>$counter is equal to: $counter</span>";
        $counter++;
    } while ($counter <= 5);
    ?>
    </div>
    <p><strong>Observation:</strong> The loop body executes <em>once</em> before the condition is checked.
    Since the counter starts at 6 and the condition is <code>$counter <= 5</code>, the condition is false
    immediately after the first iteration. This proves that a <code>do-while</code> loop always runs
    its body <strong>at least once</strong>, regardless of whether the condition is true or false.</p>
</div>

</body>
</html>
