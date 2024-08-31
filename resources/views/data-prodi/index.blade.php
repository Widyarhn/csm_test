<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Data Program Studi
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex">
                <!-- Create Form -->
                <div class="w-1/3 bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-4">Tambah Program Studi</h3>
                    
                    <form method="POST" action="{{ route('program_studi.store') }}">
                        @csrf
                        <div class="mb-4">
                            <x-input-label for="name" :value="__('Program Studi Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        
                        <x-primary-button>{{ __('Add Program Studi') }}</x-primary-button>
                    </form>
                </div>

                <!-- DataTable -->
                <div class="w-2/3 ml-4 bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-lg font-semibold mb-4">Program Studi List</h3>
                    
                    <table id="programsTable" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($programs as $program)
                            <tr>
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $program->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $program->name }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <button type="button" data-id="{{ $program->id }}" data-name="{{ $program->name }}" class="edit-button bg-blue-500 text-white px-4 py-2 rounded-md">Edit</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75 hidden">
        <div class="bg-white p-6 rounded-lg shadow-md w-1/3">
            <h3 class="text-lg font-semibold mb-4">Edit Program Studi</h3>
            
            <form id="editForm" method="POST" action="{{ route('program_studi.update') }}">
                @csrf
                @method('PUT')
                <input type="hidden" id="editId" name="id">
                
                <div class="mb-4">
                    <x-input-label for="editName" :value="__('Program Studi Name')" />
                    <x-text-input id="editName" name="name" type="text" class="mt-1 block w-full" required />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
                
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Update') }}</x-primary-button>
                    <button type="button" id="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded-md">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Show Edit Modal
            document.querySelectorAll('.edit-button').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const name = this.getAttribute('data-name');
                    
                    document.getElementById('editId').value = id;
                    document.getElementById('editName').value = name;
                    
                    document.getElementById('editModal').classList.remove('hidden');
                });
            });

            // Close Edit Modal
            document.getElementById('closeModal').addEventListener('click', function() {
                document.getElementById('editModal').classList.add('hidden');
            });
        });
    </script>
    @endpush
</x-app-layout>
