<?php

test('Not debugging statements are left in our code.')
    ->expect(['dd', 'dump', 'ray'])
    ->not->toBeUsed();

arch('Use strict types and equality')->expect('App')
    ->toUseStrictTypes()
    ->toUseStrictEquality();
