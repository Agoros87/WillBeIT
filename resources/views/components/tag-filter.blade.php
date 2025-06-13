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
                @foreach ($tagsSelected as $tag)
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
        const SELECTED_CLASSES = ['font-bold', 'text-blue-600', 'dark:text-emerald-600'];
        const CHECK_MARK = '✓';

        const elements = {
            dropdown: document.getElementById('tags-dropdown'),
            button: document.getElementById('tags-dropdown-button'),
            list: document.getElementById('tags-dropdown-list'),
            items: document.querySelectorAll('#tags-dropdown-list ul li'),
            tagsList: document.getElementById('tags-input-list'),
            input: document.getElementById('tags-input')
        };

        const state = {
            selected: new Set(),
            selectedElements: new Map()
        };

        function toggleDropdown() {
            elements.list.classList.toggle('hidden');
        }

        function hideDropdown() {
            elements.list.classList.add('hidden');
        }

        function createTagElement(tag) {
            const tagItem = document.createElement('span');
            tagItem.classList.add('selected-tag');

            const svgIcon = `
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-3 fill-white">
                    <path d="M3.792 2.938A49.069 49.069 0 0 1 12 2.25c2.797 0 5.54.236 8.209.688a1.857 1.857 0 0 1 1.541 1.836v1.044a3 3 0 0 1-.879 2.121l-6.182 6.182a1.5 1.5 0 0 0-.439 1.061v2.927a3 3 0 0 1-1.658 2.684l-1.757.878A.75.75 0 0 1 9.75 21v-5.818a1.5 1.5 0 0 0-.44-1.06L3.13 7.938a3 3 0 0 1-.879-2.121V4.774c0-.897.64-1.683 1.542-1.836Z"/>
                </svg>
            </span>
            <div class="flex items-center">${tag}</div>
        `;

            tagItem.innerHTML = svgIcon;

            const removeButton = document.createElement('button');
            removeButton.textContent = '×';
            removeButton.addEventListener('click', () => removeTag(tag));

            tagItem.appendChild(removeButton);
            return tagItem;
        }

        // Gestión de tags
        function addTag(tag, item) {
            if (state.selected.has(tag)) return;

            state.selected.add(tag);
            elements.input.value = '';

            const tagElement = createTagElement(tag);
            elements.tagsList.appendChild(tagElement);
            state.selectedElements.set(tag, tagElement);

            item.prepend(CHECK_MARK);
            SELECTED_CLASSES.forEach(c => item.classList.add(c));

            Livewire.dispatch('tagsUpdated', {data: Array.from(state.selected)});
        }

        function removeTag(tag) {
            const tagElement = state.selectedElements.get(tag);
            if (!tagElement) return;

            state.selected.delete(tag);
            state.selectedElements.delete(tag);
            tagElement.remove();

            const item = Array.from(elements.items)
                .find(item => item.textContent.slice(1).trim() === tag);

            if (item) {
                item.textContent = item.textContent.slice(1);
                SELECTED_CLASSES.forEach(c => item.classList.remove(c));
            }

            Livewire.dispatch('tagsUpdated', {data: Array.from(state.selected)})
        }

        // Event Listeners
        elements.button.addEventListener('click', e => {
            e.stopPropagation();
            toggleDropdown();
        });

        document.addEventListener('click', e => {
            if (!elements.dropdown.contains(e.target)) {
                hideDropdown();
            }
        });

        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') {
                hideDropdown();
            }
        });

        elements.input.addEventListener('keydown', e => {
            if (elements.input.value === '' && e.key === 'Backspace' && state.selected.size > 0) {
                const lastTag = Array.from(state.selected).pop();
                removeTag(lastTag);
            }
        });

        elements.items.forEach(item => {
            item.addEventListener('click', () => {
                const isSelected = item.textContent[0] === CHECK_MARK;
                const tag = (isSelected ? item.textContent.slice(1) : item.textContent).trim();

                if (isSelected) {
                    removeTag(tag);
                } else {
                    addTag(tag, item);
                }
            });
        });
    }

    document.addEventListener('DOMContentLoaded', tagsDropdown);
</script>