// Function to fetch listeners count from the PHP script
async function fetchListeners() {
    try {
        // Replace with the actual URL to your PHP script
        const response = await fetch('listeners.php');
        const data = await response.json();

        // Update listeners count on the page
        document.getElementById('listeners').textContent = `Listeners: ${data.listeners}`;
    } catch (error) {
        console.error('Error fetching listeners count:', error);
    }
}

// Call the fetchListeners function periodically (e.g., every 30 seconds)
setInterval(fetchListeners, 30000);
fetchListeners(); // Initial call to load listeners immediately
