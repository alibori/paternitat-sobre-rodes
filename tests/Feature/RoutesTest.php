<?php

declare(strict_types=1);

it('visit home returns a successful response', function (): void {
    $response = $this->get('/');

    $response->assertStatus(200);
});

it('visit about returns a successful response', function (): void {
    $response = $this->get('/qui-soc');

    $response->assertStatus(200);
});

it('visit blog returns a successful response', function (): void {
    $response = $this->get('/blog');

    $response->assertStatus(200);
});

it('visit contact returns a successful response', function (): void {
    $response = $this->get('/contacte');

    $response->assertStatus(200);
});
