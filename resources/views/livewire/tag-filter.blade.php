<div class="w-full flex flex-col gap-2 px-1 md:px-8 py-2 dark:text-gray-200">
    <div class="tags-input-container w-full p-1 border-b dark:border-gray-400 flex gap-2 items-center">
        <div id="tags-input-list" class="flex flex-wrap gap-2 items-center min-w-max border-2 border-blue-600"></div>
        <input type="text" id="tags-input" placeholder="{{ __('Tags').' ...' }}" class="w-full p-1 dark:border-gray-400 outline-none text-xs"/>
    </div>
    <div id="tags-dropdown" class="relative flex items-center min-w-1/2">
        <button id="tags-dropdown-button" class="p-2 text-xs font-semibold text-white bg-blue-600 dark:bg-emerald-600 outline-none flex gap-2 rounded cursor-pointer">
            <x-svg.funnel class="w-4"/>{{ __('Tags') }}</button>
        <div id="tags-dropdown-list" class="absolute left-0 top-9 w-max bg-white dark:bg-zinc-900 shadow-lg hidden rounded z-10">
            <ul class="tags-dropdown-list">
                @foreach ($tags as $tag)
                    <li class="px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-800 text-sm cursor-pointer">
                        {{ $tag->name }}
                    </li>
                    <hr class="dark:border-gray-600 mx-2"/>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<script>
    function tagsDropdown() {
        const tagsDropdown = document.getElementById('tags-dropdown');
        const tagsDropdownButton = document.getElementById('tags-dropdown-button');
        const tagsDropdownList = document.getElementById('tags-dropdown-list');
        const tagsItems = document.querySelectorAll('#tags-dropdown-list ul li');
        const tagsList = document.getElementById('tags-input-list');
        const tagsInput = document.getElementById('tags-input');
        let tagsSelected = [];

        tagsDropdownButton.addEventListener('click', (e) => {
            e.stopPropagation();
            tagsDropdownList.classList.toggle('hidden');
        })

        document.addEventListener('click', (e) => {
            if (!tagsDropdown.contains(e.target) && !tagsDropdownList.classList.contains('hidden')) {
                tagsDropdownList.classList.add('hidden');
            }
        })

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && !tagsDropdownList.classList.contains('hidden')) {
                tagsDropdownList.classList.add('hidden');
            }
        });

        tagsItems.forEach(item => {
            item.addEventListener('click', () => {
                const tag = item.textContent.trim();
                pushTags(tag);
            });
        });

        function pushTags(tag) {
            tagsSelected.push(tag);
            tagsInput.value = '';
            tagsDropdownList.classList.add('hidden');
            updateFilterTags();
        }

        function updateFilterTags() {
            tagsList.innerHTML = '';
            tagsSelected.forEach(tag => {
                const tagItem = document.createElement('span');
                tagItem.classList.add(
                    'tag-item',
                    'bg-blue-100',
                    'text-blue-800',
                    'text-xs',
                    'px-2',
                    'py-1',
                    'rounded',
                    'flex',
                    'items-center',
                    'gap-1'
                );

                tagItem.textContent = tag;

                // const removeButton = document.createElement('button');
                // removeButton.innerHTML = '×';
                // removeButton.classList.add('ml-1', 'hover:text-blue-900', 'font-bold');
                // removeButton.addEventListener('click', () => {
                //     tagItem.remove();
                //     Livewire.dispatch('tag-removed', {tag: tag});
                // });

                // tagItem.append(removeButton);
                tagsList.appendChild(tagItem);

                console.dir(tagItem)
            })
            console.dir(tagsList)
        }
    }

    document.addEventListener('DOMContentLoaded', tagsDropdown);
</script>