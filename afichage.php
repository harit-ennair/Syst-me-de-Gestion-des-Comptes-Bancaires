<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="./public/css/css.css">

</head>
<body style="background-color: rgb(246, 246, 246);">
    
    <button style="margin:20px;"  type="button" class="btn btn-secondary" onclick="window.location.href='index.php'">Secondary</button>


<?php

$host = 'localhost';
$dbname = 'bank';
$username = 'root';
$password = '';


    $conn = "mysql:host=".$host.";dbname=".$dbname;
    $pdo = new PDO($conn, $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    


$sql_business = "
SELECT c.customer_id, c._name, c.email, c.balance,
       ba.account_id AS business_account_id, ba.credit_limit, ba.transaction_fee
FROM customer c
 JOIN businessaccount ba ON c.customer_id = ba.customer_id;
";

$sql_current = "
SELECT c.customer_id, c._name, c.email, c.balance,
       ca.account_id AS current_account_id, ca.overdraft_limit, ca.monthlyFee
FROM customer c
 JOIN currentaccount ca ON c.customer_id = ca.customer_id;
";

$sql_savings = "
SELECT c.customer_id, c._name, c.email, c.balance,
       sa.account_id AS savings_account_id, sa.interest_rate, sa.minimum_balance
FROM customer c
 JOIN savingsaccount sa ON c.customer_id = sa.customer_id;
";


$stmt_business = $pdo->prepare($sql_business);
$stmt_business->execute();
$results_business = $stmt_business->fetchAll(PDO::FETCH_ASSOC);

$stmt_current = $pdo->prepare($sql_current);
$stmt_current->execute();
$results_current = $stmt_current->fetchAll(PDO::FETCH_ASSOC);

$stmt_savings = $pdo->prepare($sql_savings);
$stmt_savings->execute();
$results_savings = $stmt_savings->fetchAll(PDO::FETCH_ASSOC);


// Business Accounts
echo "<h2>Business Accounts</h2>";
echo "<table border='1'>
        <tr>
            <th>Customer ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Balance</th>
            <th>Business Account ID</th>
            <th>Credit Limit</th>
            <th>Transaction Fee</th>
            <th>Actions</th>
        </tr>";

foreach ($results_business as $row) {
    echo "<tr>
            <td>" . htmlspecialchars($row['customer_id']) . "</td>
            <td>" . htmlspecialchars($row['_name']) . "</td>
            <td>" . htmlspecialchars($row['email']) . "</td>
            <td>" . htmlspecialchars($row['balance']) . "</td>
            <td>" . htmlspecialchars($row['business_account_id'] ?? 'N/A') . "</td>
            <td>" . htmlspecialchars($row['credit_limit'] ?? 'N/A') . "</td>
            <td>" . htmlspecialchars($row['transaction_fee'] ?? 'N/A') . "</td>
            <td>
            <a href='edit_business.php?id=" . htmlspecialchars($row['customer_id']) . "'>
                <button class='btn btn-edit btn-sm'>Edit</button>
            </a> 
           <a href='./src/class/delete_account.php?id=$row[customer_id]'>
                <button class='btn btn-delete btn-sm'>Delete</button>
            </a>
            </td>
          </tr>";
}

echo "</table>";

// Current Accounts Table
echo "<h2>Current Accounts</h2>";
echo "<table border='1'>
        <tr>
            <th>Customer ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Balance</th>
            <th>Current Account ID</th>
            <th>Overdraft Limit</th>
            <th>Monthly Fee</th>
            <th>Actions</th>
        </tr>";

foreach ($results_current as $row) {
    echo "<tr>
            <td>" . htmlspecialchars($row['customer_id']) . "</td>
            <td>" . htmlspecialchars($row['_name']) . "</td>
            <td>" . htmlspecialchars($row['email']) . "</td>
            <td>" . htmlspecialchars($row['balance']) . "</td>
            <td>" . htmlspecialchars($row['current_account_id'] ?? 'N/A') . "</td>
            <td>" . htmlspecialchars($row['overdraft_limit'] ?? 'N/A') . "</td>
            <td>" . htmlspecialchars($row['monthlyFee'] ?? 'N/A') . "</td>
            <td>
            <a href='edit_business.php?id=" . htmlspecialchars($row['customer_id']) . "'>
                <button class='btn btn-edit btn-sm'>Edit</button>
            </a> 
               <a href='./src/class/delete_account.php?id=$row[customer_id]'>
                <button class='btn btn-delete btn-sm'>Delete</button>
            </a>
            </td>
          </tr>";
}

echo "</table>";

// Savings Accounts Table
echo "<h2>Savings Accounts</h2>";
echo "<table border='1'>
        <tr>
            <th>Customer ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Balance</th>
            <th>Savings Account ID</th>
            <th>Interest Rate</th>
            <th>Minimum Balance</th>
            <th>Actions</th>
        </tr>";

foreach ($results_savings as $row) {
    echo "<tr>
            <td>" . htmlspecialchars($row['customer_id']) . "</td>
            <td>" . htmlspecialchars($row['_name']) . "</td>
            <td>" . htmlspecialchars($row['email']) . "</td>
            <td>" . htmlspecialchars($row['balance']) . "</td>
            <td>" . htmlspecialchars($row['savings_account_id'] ?? 'N/A') . "</td>
            <td>" . htmlspecialchars($row['interest_rate'] ?? 'N/A') . "</td>
            <td>" . htmlspecialchars($row['minimum_balance'] ?? 'N/A') . "</td>
            <td>
            <a href='edit_business.php?id=" . htmlspecialchars($row['customer_id']) . "'>
                <button class='btn btn-edit btn-sm'>Edit</button>
            </a> 
            <a href='./src/class/delete_account.php?id=$row[customer_id]'>
                <button class='btn btn-delete btn-sm'>Delete</button>
            </a>
            </td>
          </tr>";
}

echo "</table>";
?>




</body>
</html>



