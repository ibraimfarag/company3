<?php


$messages = [

    // general messages
    'process_success_message' => 'Process Successful',
    'successful_process_message' => 'Successful Process',
    'store_success_message' => 'Added successfully',
    'update_success_message' => 'Edited successfully',
    'destroy_success_message' => 'Deleted successfully',

];

// Entity Name => Display Text 
$entities = [
    'article' => 'article',
    'category' => 'category',
    'contact' => 'contact',
];

foreach ($entities as $entity_name => $display_text) {
    $messages[$entity_name . '_store_success_message'] = 'added ' . $display_text . ' successfully';
    $messages[$entity_name . '_update_success_message'] = 'updated ' . $display_text . ' successfully';
    $messages[$entity_name . '_destroy_success_message'] = 'Deleted ' . $display_text . ' successfully';
}


return $messages;
