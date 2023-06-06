<?php

use App\Models\User;
use Illuminate\Support\Facades\{Event, URL};

use function Pest\Laravel\{actingAs, assertDatabaseCount, assertDatabaseHas, post};

it('should be able to create a new question than 255 characteres', function () {

    //arrange :: preparar
    $user = User::factory()->create();
    actingAs($user);

    //Act ::
    $request = post(route('question.store'), [
        'question' => str_repeat('*', 260) . '?',
    ]);

    //Assert :: verificar
    $request->assertRedirect(route('dashboard'));
    assertDatabaseCount('questions', 1);
    assertDatabaseHas('questions', ['question' => str_repeat('*', 260) . '?']);

});
