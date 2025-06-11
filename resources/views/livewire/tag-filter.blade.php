<div class="w-full flex flex-col gap-2 px-1 md:px-8 py-2 dark:text-gray-200">
    <div class="tags-input-container w-full p-1 border-b dark:border-gray-400 flex gap-2 items-center">
        <div id="tags-input-list" class="flex flex-wrap gap-2 items-center min-w-max"></div>
        <input type="text" id="tags-input" placeholder="{{ __('Tags').' ...' }}" class="w-full p-1 dark:border-gray-400 outline-none text-xs"/>
    </div>
    <div id="tags-dropdown" class="relative flex items-center min-w-1/2">
        <button id="tags-dropdown-button" class="p-2 text-xs font-semibold text-white bg-blue-600 dark:bg-emerald-600 outline-none flex gap-2 rounded cursor-pointer">
            <x-svg.funnel class="w-4"/>{{ __('Tags') }}</button>
        <div id="tags-dropdown-list" class="absolute left-0 top-9 w-max bg-white dark:bg-zinc-900 shadow-lg hidden rounded z-10">
            <ul class="tags-dropdown-list select-none">
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
        let tagsSelectedInput = [];

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

        tagsInput.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && tagsSelected.length > 0) {
                removeTag(tagsSelected.at(-1), tagsSelectedInput.at(-1));
            }
        })

        tagsItems.forEach(item => {
            item.addEventListener('click', () => {
                if (item.textContent[0] === '✓') item.textContent = item.textContent.slice(1);
                const tag = item.textContent.trim();
                if (tagsSelected.includes(tag)) {
                    removeTag(tag, tagsSelectedInput.find(t => t.textContent.trim() === tag + '×'));
                } else {
                    pushTags(tag);
                    item.prepend('✓');
                    ['font-bold', 'text-blue-600', 'dark:text-emerald-600'].forEach(c => item.classList.add(c));
                }
            });
        });

        function pushTags(tag) {
            tagsSelected.push(tag);
            tagsInput.value = '';
            const tagItem = document.createElement('span');
            tagItem.classList.add('selected-tag');

            tagItem.innerHTML =
                '<span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-3 fill-white">'
                + '<path d="M3.792 2.938A49.069 49.069 0 0 1 12 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 0 1 1.541 1.836v1.044a3 3 0 0 1-.879 2.121l-6.182 6.182a1.5 1.5 0 0 0-.439 1.061v2.927a3 3 0 0 1-1.658 2.684l-1.757.878A.75.75 0 0 1 9.75 21v-5.818a1.5 1.5 0 0 0-.44-1.06L3.13 7.938a3 3 0 0 1-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836Z"/>'
                + '</svg></span>'

            tagItem.innerHTML += '<div class="flex items-center">' + tag + '</div>';

            const removeButton = document.createElement('button');
            removeButton.innerHTML = '×';
            removeButton.addEventListener('click', () => removeTag(tag, tagItem));

            tagItem.append(removeButton);
            tagsList.appendChild(tagItem);
            tagsSelectedInput.push(tagItem);
        }

        function removeTag(tag, tagItem) {
            tagsSelected = tagsSelected.filter(t => t !== tag);
            tagsSelectedInput = tagsSelectedInput.filter(t => t !== tagItem);
            tagItem.remove();
            let tagToRemove = [...tagsItems].find(item => item.textContent.slice(1).trim() === tag);
            tagToRemove.textContent = tagToRemove.textContent.slice(1);
            ['font-bold', 'text-blue-600', 'dark:text-emerald-600'].forEach(c => tagToRemove.classList.remove(c));
        }
    }

    document.addEventListener('DOMContentLoaded', tagsDropdown);
</script>