<?php
// If the transaction signature is not yet in the database
$to = "Gq9Gv34h6Y8noDiKpPk1HcT5gCJJD8Z6xNj1aSChtpv2";
$txid = $_GET["txid"]; // Get the txid in the URL from frontend request
$transaction_data = json_decode(file_get_contents("https://solpay.togatech.org/transaction.php?to=" . $to . "&txid=" . $txid), true);
if($transaction_data["status"] == "success" && $transaction_data["lamports"] >= 10000) {

$bought = TRUE;   
	
} else if($transaction_data["status"] == "error") {
    // Send $transaction_data["error"] to the frontend to display to the user
} else {
    // Send an error to the user that not enough funds were sent in the transaction
}
