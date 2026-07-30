<?php
// Week 2 - Exercise 02: PHP Logic, Loops & Functions
// conditionals.php - Demonstrates conditionals, operators, and logic
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conditionals & Operators</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 700px; margin: 40px auto; padding: 20px; background: #f8f9fa; }
        h1, h2 { color: #1a1a2e; }
        .card { background: #fff; border-radius: 8px; padding: 20px; margin-bottom: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.08); }
        .label { font-weight: bold; color: #333; }
        .value { color: #007bff; font-weight: bold; }
        .result { color: #28a745; font-weight: bold; }
        pre { background: #1e1e1e; color: #d4d4d4; padding: 12px; border-radius: 6px; overflow-x: auto; }
    </style>
</head>
<body>

<h1>Conditionals & Operators</h1>

<?php
// ============================================
// 1. BUDGET CALCULATOR
// ============================================
$totalBudget = 5000;
$groceries = 1200;
$transport = 800;
$entertainment = 500;

$balance = $totalBudget - ($groceries + $transport + $entertainment);
?>
<div class="card">
    <h2>Budget Calculator</h2>
    <p><span class="label">Total Budget:</span> R<?php echo number_format($totalBudget, 2); ?></p>
    <p><span class="label">Groceries:</span> R<?php echo number_format($groceries, 2); ?></p>
    <p><span class="label">Transport:</span> R<?php echo number_format($transport, 2); ?></p>
    <p><span class="label">Entertainment:</span> R<?php echo number_format($entertainment, 2); ?></p>
    <p><span class="label">Balance:</span> <span class="result">R<?php echo number_format($balance, 2); ?></span></p>
</div>

<?php
// ============================================
// 2. AGE CATEGORY CHECKER
// ============================================
$ages = [8, 15, 30, 67];
?>
<div class="card">
    <h2>Age Category Checker</h2>
    <?php foreach ($ages as $age): ?>
        <?php
        if ($age < 12) {
            $category = "Child";
        } elseif ($age >= 13 && $age <= 17) {
            $category = "Teen";
        } elseif ($age >= 18 && $age <= 64) {
            $category = "Adult";
        } else {
            $category = "Senior";
        }
        ?>
        <p>Age <?php echo $age; ?> = <span class="result"><?php echo $category; ?></span></p>
    <?php endforeach; ?>
</div>

<?php
// ============================================
// 3. SIMPLE INTEREST CALCULATOR
// ============================================
$principal = 10000;
$rate = 5;
$years = 3;

$interest = ($principal * $rate * $years) / 100;
$totalAmount = $principal + $interest;
?>
<div class="card">
    <h2>Simple Interest Calculator</h2>
    <p><span class="label">Principal:</span> R<?php echo number_format($principal, 2); ?></p>
    <p><span class="label">Rate:</span> <?php echo $rate; ?>%</p>
    <p><span class="label">Years:</span> <?php echo $years; ?></p>
    <p><span class="label">Interest:</span> R<?php echo number_format($interest, 2); ?></p>
    <p><span class="label">Total Amount:</span> <span class="result">R<?php echo number_format($totalAmount, 2); ?></span></p>
</div>

<?php
// ============================================
// 4. VOTER ELIGIBILITY CHECK
// ============================================
$voterAge = 25;
$isRegistered = true;
?>
<div class="card">
    <h2>Voter Eligibility</h2>
    <p><span class="label">Age:</span> <?php echo $voterAge; ?></p>
    <p><span class="label">Registered:</span> <?php echo $isRegistered ? "Yes" : "No"; ?></p>
    <?php
    if ($voterAge >= 18 && $voterAge <= 35 && $isRegistered) {
        echo '<p class="result">Eligible to vote!</p>';
    } else {
        echo '<p style="color:#dc3545; font-weight:bold;">Not eligible to vote.</p>';
    }
    ?>
</div>

<?php
// ============================================
// STRETCH GOAL: Grade Calculator
// ============================================
function gradeCalculator($score) {
    if ($score >= 80) return 'A';
    elseif ($score >= 70) return 'B';
    elseif ($score >= 60) return 'C';
    elseif ($score >= 50) return 'D';
    else return 'F';
}
?>
<div class="card">
    <h2>Stretch Goal: Grade Calculator</h2>
    <?php
    $scores = [92, 75, 68, 55, 42];
    foreach ($scores as $score) {
        echo "<p>Score $score = <span class=\"result\">" . gradeCalculator($score) . "</span></p>";
    }
    ?>
</div>

</body>
</html>
