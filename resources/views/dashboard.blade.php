<x-app-layout>

    <x-slot name="header">

        <x-header>

            {{ __('Dashboard01') }}

        </x-header>

    </x-slot>


    <x-container>

        <x-form post :action="route('question.store')">

            <x-textarea label="Question" name="question" />

            <x-btn.primary >Save </x-btn.primary>

            <x-btn.reset> Cancel </x-btn.reset>

        </x-form>

        <hr class="border-gray-600 border-dashed my-3">


        {{-- listagem --}}

        <div class="dark:text-yellow-400 uppercase font-semibold my-4">List of Questions</div>

        <div class="dark:text-gray-400 space-y-5">

            @foreach ( $questions as $item)

                <x-question :question="$item" />

            @endforeach
        </div>

    </x-container>


</x-app-layout>
