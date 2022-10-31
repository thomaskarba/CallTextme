async function connectPhantom() {
    /* Connect to Solana network: */
    let network_url = await SOLPay.connectNetwork();
    console.log(network_url); // "https://solana-api.projectserum.com"
    
    /* Connect to user wallet: */
    let wallet = await SOLPay.connectWallet(SOLPay.adapters.phantom);
    console.log(wallet.address); // the address of the connected wallet
}

async function connectSolflare() {
    /* Connect to Solana network: */
    let network_url = await SOLPay.connectNetwork();
    console.log(network_url); // "https://solana-api.projectserum.com"
    
    /* Connect to user wallet: */
    let wallet = await SOLPay.connectWallet(SOLPay.adapters.solflare);
    console.log(wallet.address); // the address of the connected wallet
}

async function buyItem() {
    let address = "Gq9Gv34h6Y8noDiKpPk1HcT5gCJJD8Z6xNj1aSChtpv2" // replace with the Solana address of the seller
    let lamports = 1000000;
    let payment_details = await SOLPay.sendSolanaLamports(address, lamports);
    if (payment_details.signature){
		document.getElementById("user-account").innerHTML = payment_details.signature;
	}
	
	
	// IMPORTANT: Send payment_details.signature to the backend for verification
    //let raw_result = await fetch("forum.php?txid=" + encodeURIComponent(payment_details.signature));
    //let parsed_result = await raw_result.json();
    // Use parsed_result to either return success message or error message to user
}