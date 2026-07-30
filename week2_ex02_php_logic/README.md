# Week 2 — Exercise 02: PHP Logic, Loops & Functions

This folder contains PHP scripts demonstrating operators, conditionals, loops, and reusable functions in a South African context for the TechVibe junior developer programme.

---

## Files

| File | Description |
|------|-------------|
| `conditionals.php` | Budget calculator, age category checker, simple interest calculator, and voter eligibility check using `if`/`elseif`/`else` and `switch`. |
| `loops.php` | Demonstrates `for`, `while`, `do-while`, and `foreach` loops with formatted output. |
| `functions.php` | Reusable functions: `printGreeting()`, `multiply()`, `arrayLooper()`, and `calculateDiscount()` with stretch goals included. |

---

## Setup & Run

1. Copy the `week2_ex02_php_logic/` folder into your **XAMPP `htdocs`** directory:
   ```
   C:\xampp\htdocs\week2_ex02_php_logic\
   ```

2. Start **Apache** from the XAMPP Control Panel.

3. Open each file in your browser:
   - http://localhost/week2_ex02_php_logic/conditionals.php
   - http://localhost/week2_ex02_php_logic/loops.php
   - http://localhost/week2_ex02_php_logic/functions.php

---

## Features Summary

### conditionals.php
- **Budget Calculator** — Subtracts expenses from a total budget.
- **Age Category Checker** — Classifies ages into Child, Teen, Adult, or Senior.
- **Simple Interest Calculator** — Calculates interest and total amount for R10 000 at 5% over 3 years.
- **Voter Eligibility** — Confirms age is between 18 and 35 and the user is registered.
- **Stretch:** `gradeCalculator($score)` returns A, B, C, D, or F.

### loops.php
- **For Loop** — Displays numbers 0–10.
- **Foreach Loop** — Iterates over five South African cities.
- **While Loop** — Counts down from 10 to 0.
- **Do-While Loop** — Starts at 6 with condition `<= 5`, demonstrating that `do-while` runs at least once.

### functions.php
- **`printGreeting($name)`** — Returns a personalised welcome message.
- **`multiply($a, $b)`** — Returns the product of two numbers.
- **`arrayLooper($array)`** — Displays each array element on a new line.
- **`calculateDiscount($amount)`** — Tiered discount:
  | Amount Range | Discount |
  |-------------|----------|
  | Over R1 000 | 10% |
  | R500 – R999 | 5% |
  | R250 – R499 | 2% |
  | Below R250 | 0% |
- **Stretch:** Budget calculator with expense arrays + `findMinMax($numbers)`.

---

## Stretch Goals Included

1. **Grade Calculator** — Returns letter grades based on standard score ranges.
2. **Budget Calculator (Array)** — Accepts an associative array of expenses and displays remaining balance.
3. **Find Min & Max** — Accepts an array of numbers and returns the minimum and maximum values.

---

## Author
TechVibe Junior Developer Programme — Week 2
