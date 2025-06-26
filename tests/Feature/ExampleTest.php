<?php

test('returns a successful response', function () {
    $table->string('surname');
    $response = $this->get('/');

    $response->assertStatus(200);
});