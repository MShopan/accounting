<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                    <button class="btn btn-sm btn-success">success</button>

                </div>
            </div>
        </div>
    </div>



<label id="start" for="my-modal-2" class="btn btn-primary modal-button">open modal</label>
<input type="checkbox" id="my-modal-2" class="modal-toggle">
<div class="modal">
  <div class="modal-box">
    <p>Enim dolorem dolorum omnis atque necessitatibus. Consequatur aut adipisci qui iusto illo eaque. Consequatur repudiandae et. Nulla ea quasi eligendi. Saepe velit autem minima.</p>
    <div class="modal-action">
      <label for="my-modal-2" class="btn btn-primary">Accept</label>
      <label for="my-modal-2" class="btn">Close</label>
    </div>
  </div>
</div>




</x-app-layout>
