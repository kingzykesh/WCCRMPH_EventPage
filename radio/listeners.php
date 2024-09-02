<?php
// Set the URL to your stream stats (replace with your actual stats URL)
$stream_stats_url = "https://stream.zeno.fm/hrjwljqkrhuuv";

// Fetch the data from the URL
$stats_data = file_get_contents($stream_stats_url);

// Check if data was fetched successfully
if ($stats_data === FALSE) {
    echo json_encode(['error' => 'Could not retrieve listener data.']);
    exit;
}

// Convert the fetched data to an XML or JSON object based on your streaming provider's output
// Example: if the stats are in XML format, use simplexml_load_string() to parse
$stats = simplexml_load_string($stats_data);

// Extract the number of listeners (this key depends on your streaming provider's stats format)
$listeners = (int) $stats->listeners;

// Return the listener count as JSON
echo json_encode(['listeners' => $listeners]);
?>
