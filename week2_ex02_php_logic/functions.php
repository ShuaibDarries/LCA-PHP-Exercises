<?php
// Week 2 - Exercise 02: PHP Logic, Loops & Functions
// functions.php - Reusable functions with parameters and return values
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Functions Demo</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 700px; margin: 40px auto; padding: 20px; background: #f8f9fa; }
        h1, h2 { color: #1a1a2e; }
        .card { background: #fff; border-radius: 8px; padding: 20px; margin-bottom: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.08); }
        .result { color: #28a745; font-weight: bold; }
        .code { background: #1e1e1e; color: #d4d4d4; padding: 12px; border-radius: 6px; overflow-x: auto; font-size: 13px; }
    </style>
</head>
<body>

<h1>Functions Demonstration</h1>

<?php
// ============================================
// 1. printGreeting($name)
// ============================================
function printGreeting($name) {
    return "Hello, $name! Welcome to TechVibe.";
}
?>
<div class="card">
    <h2>1. printGreeting($name)</h2>
    <div class="code">
        function printGreeting($name) {<br>
        &nbsp;&nbsp;return "Hello, $name! Welcome to TechVibe.";<br>
        }
    </div>
    <p>Output: <span class="result"><?php echo printGreeting("Thabo"); ?></span></p>
</div>

<?php
// ============================================
// 2. multiply($a, $b)
// ============================================
function multiply($a, $b) {
    return $a * $b;
}
?>
<div class="card">
    <h2>2. multiply($a, $b)</h2>
    <div class="code">
        function multiply($a, $b) {<br>
        &nbsp;&nbsp;return $a * $b;<br>
        }
    </div>
    <p>Output: <span class="result"><?php echo multiply(7, 8); ?></span></p>
</div>

<?php
// ============================================
// 3. arrayLooper($array)
// ============================================
function arrayLooper($array) {
    $output = "";
    foreach ($array as $item) {
        $output .= $item . "<br>";
    }
    return $output;
}

$fruits = ["Apple", "Banana", "Orange", "Mango", "Grapes"];
?>
<div class="card">
    <h2>3. arrayLooper($array)</h2>
    <div class="code">
        function arrayLooper($array) {<br>
        &nbsp;&nbsp;foreach ($array as $item) {<br>
        &nbsp;&nbsp;&nbsp;&nbsp;echo $item . "&lt;br&gt;";<br>
        &nbsp;&nbsp;}<br>
        }
    </div>
    <p>Test array: <em>Apple, Banana, Orange, Mango, Grapes</em></p>
    <p>Output:<br><span class="result"><?php echo arrayLooper($fruits); ?></span></p>
</div>

<?php
// ============================================
// 4. calculateDiscount($amount)
// ============================================
// 10% for amounts over R1 000
// 5%  for R500 to R999
// 2%  for R250 to R499
// 0%  otherwise
function calculateDiscount($amount) {
    if ($amount > 1000) {
        $discountRate = 0.10;
    } elseif ($amount >= 500 && $amount <= 999) {
        $discountRate = 0.05;
    } elseif ($amount >= 250 && $amount <= 499) {
        $discountRate = 0.02;
    } else {
        $discountRate = 0;
    }

    $discount = $amount * $discountRate;
    $finalAmount = $amount - $discount;

    return [
        'original' => $amount,
        'discountRate' => $discountRate * 100,
        'discount' => $discount,
        'final' => $finalAmount
    ];
}

$testAmounts = [150, 300, 750, 1500];
?>
<div class="card">
    <h2>4. calculateDiscount($amount)</h2>
    <div class="code">
        function calculateDiscount($amount) {<br>
        &nbsp;&nbsp;if ($amount > 1000)       $rate = 0.10;<br>
        &nbsp;&nbsp;elseif ($amount >= 500)   $rate = 0.05;<br>
        &nbsp;&nbsp;elseif ($amount >= 250)   $rate = 0.02;<br>
        &nbsp;&nbsp;else                      $rate = 0;<br>
        &nbsp;&nbsp;return $amount - ($amount * $rate);<br>
        }
    </div>
    <?php foreach ($testAmounts as $amt):
        $result = calculateDiscount($amt);
    ?>
    <p>
        <strong>R<?php echo number_format($amt, 2); ?></strong> &rarr;
        Discount: <?php echo $result['discountRate']; ?>% (R<?php echo number_format($result['discount'], 2); ?>)
        &rarr; <span class="result">Final: R<?php echo number_format($result['final'], 2); ?></span>
    </p>
    <?php endforeach; ?>
</div>

<?php
// ============================================
// STRETCH GOAL 2: Budget Calculator with Array
// ============================================
function budgetCalculator($budget, $expenses) {
    $totalExpenses = 0;
    $output = "";
    foreach ($expenses as $name => $amount) {
        $output .= "$name: R" . number_format($amount, 2) . "<br>";
        $totalExpenses += $amount;
    }
    $balance = $budget - $totalExpenses;
    return [
        'details' => $output,
        'total' => $totalExpenses,
        'balance' => $balance
    ];
}

$expenses = [
    "Groceries" => 1200,
    "Transport" => 800,
    "Entertainment" => 500,
    "Utilities" => 600
];
$budgetResult = budgetCalculator(5000, $expenses);
?>
<div class="card">
    <h2>Stretch Goal: Budget Calculator (with Array)</h2>
    <p><strong>Budget:</strong> R5,000.00</p>
    <p><?php echo $budgetResult['details']; ?></p>
    <p><strong>Total Expenses:</strong> R<?php echo number_format($budgetResult['total'], 2); ?></p>
    <p><strong>Remaining Balance:</strong> <span class="result">R<?php echo number_format($budgetResult['balance'], 2); ?></span></p>
</div>

<?php
// ============================================
// STRETCH GOAL 3: Min & Max from Array
// ============================================
function findMinMax($numbers) {
    $min = $numbers[0];
    $max = $numbers[0];
    foreach ($numbers as $num) {
        if ($num < $min) $min = $num;
        if ($num > $max) $max = $num;
    }
    return ['min' => $min, 'max' => $max];
}

$numberArray = [34, -5, 89, 12, 67, 0, 45];
$minMax = findMinMax($numberArray);
?>
<div class="card">
    <h2>Stretch Goal: Find Min &amp; Max</h2>
    <p>Array: <em><?php echo implode(", ", $numberArray); ?></em></p>
    <p><strong>Minimum:</strong> <span class="result"><?php echo $minMax['min']; ?></span></p>
    <p><strong>Maximum:</strong> <span class="result"><?php echo $minMax['max']; ?></span></p>
</div>

</body>
</html>
