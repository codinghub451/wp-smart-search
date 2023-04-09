<?php

// AJAX handler function for smart search

function smart_search_ajax_handler()
{
    $query = $_POST['query'];

    $endpoint = 'https://api.openai.com/v1/engines/text-davinci-002/completions';
    $headers = array(
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer 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'
    );
    $data = array(
        'prompt' => $query,
        'max_tokens' => 3000,
        'n' => 1,
        'stop' => '\n'
    );
    $args = array(
        'headers' => $headers,
        'body' => wp_json_encode($data),
        'timeout' => 15
    );
    $response = wp_remote_post($endpoint, $args);
    if (is_wp_error($response)) {
        $error_message = $response->get_error_message();
        return "Something went wrong: $error_message";
    } else {
        $body = wp_remote_retrieve_body($response);
        $result = json_decode($body, true);
        print_r($result['choices'][0]['text']);
        return $result['choices'][0]['text'];
    }
}
add_action('wp_ajax_smart_search', 'smart_search_ajax_handler');
add_action('wp_ajax_nopriv_smart_search', 'smart_search_ajax_handler');
