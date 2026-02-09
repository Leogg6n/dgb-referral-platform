<?php

// User Dashboard and Referral Information

// Get user information
$userId = $_SESSION['user_id'];
// Fetch user referral data from the database
$referralData = getReferralData($userId);

// Display user information
echo "<h1>User Dashboard</h1>";

// Display referral information
if ($referralData) {
    echo "<h2>Your Referrals:</h2>";
    foreach ($referralData as $referral) {
        echo "<p>Name: " . $referral['name'] . " - Code: " . $referral['referral_code'] . "</p>";
    }
} else {
    echo "<p>No referrals found.</p>";
}

function getReferralData($userId) {
    // Simulated database fetch
    return [
        ['name' => 'John Doe', 'referral_code' => 'JD123'],
        ['name' => 'Jane Smith', 'referral_code' => 'JS456'],
    ];
}

?>