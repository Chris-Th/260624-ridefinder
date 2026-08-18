<!-- Select Menu -->

<!-- An Alpine.js and Tailwind CSS component by https://pinemix.com -->

<!-- Alpine.js focus plugin is required, for more info http://pinemix.com/docs/getting-started -->

<div
    class="flex flex-col items-center justify-center gap-5 rounded-lg border-2 border-dashed border-zinc-200/75 bg-zinc-50 px-4 pt-8 pb-72 dark:border-zinc-700 dark:bg-zinc-950/25">
    <div
        x-data="{
            // Customize Select Menu

            open: false,

            selectedId: 0,

            label: 'Customer',

            placeholderText: 'Please select..',

            closeOnSelection: true,

            size: 'md', // 'xs', 'sm', 'md', 'lg', 'full'

            // Available Select Menu Options

            options: [
                { id: 1, label: 'John Doe', value: 'john-doe' },

                { id: 2, label: 'Jane Smith', value: 'jane-smith' },

                { id: 3, label: 'Mike Johnson', value: 'mike-johnson' },

                { id: 4, label: 'Emily Davis', value: 'emily-davis' },

                { id: 5, label: 'Chris Brown', value: 'chris-brown' },

                { id: 6, label: 'Sarah Wilson', value: 'sarah-wilson' },

                { id: 7, label: 'David Jones', value: 'david-jones' },

                { id: 8, label: 'Laura Garcia', value: 'laura-garcia' },

                { id: 9, label: 'Tom Martinez', value: 'tom-martinez' },

                { id: 10, label: 'Linda Hernandez', value: 'linda-hernandez' }
            ],

            // Helper variables

            selectedOption: null,

            keyboardTimeout: false,

            // Initialization

            init() {
                this.setSelected(this.selectedId, false);

                if (this.open) {
                    this.openMenu();
                }
            },

            // Open Select Menu

            openMenu() {
                this.open = true;

                $nextTick(() => {
                    let selectedEl = document.querySelector('#pm-select-menu-list li[data-selected]');

                    if (selectedEl) {
                        $focus.focus(selectedEl);
                    } else {
                        $focus.within($refs.selectMenu).first();
                    }
                });
            },

            // Close Select Menu

            closeMenu() {
                this.open = false;

                $nextTick(() => {
                    $focus.focus($refs.selectMenuButton);
                });
            },

            // Setter

            setSelected(id, closeMenu = this.closeOnSelection) {
                this.selectedId = id;

                this.selectedOption = this.getSelected();

                if (closeMenu) {
                    this.closeMenu();
                }
            },

            // Getter

            getSelected() {
                return this.selectedId !== 0
                    ? this.options.find((options) => options.id === this.selectedId) || null
                    : null;
            },

            // Check if the given id is the selected one

            isSelected(id) {
                return id === this.selectedOption?.id || false;
            },

            // Keyboard letter navigation

            keyboardNavigation(e) {
                clearTimeout(this.keyboardTimeout);

                this.keyboardTimeout = setTimeout(() => {
                    if (e.key.toUpperCase().match(/^[A-Z]$/)) {
                        let elements = document.querySelectorAll(
                            '#pm-select-menu-list li[data-label^=' + e.key.toUpperCase() + ']'
                        );

                        let focusedEl, focusedIndex;

                        // Find if there is already a focused item

                        elements.forEach((el, index) => {
                            if (document.activeElement === el) {
                                focusedEl = el;

                                focusedIndex = index;
                            }
                        });

                        // Focus the correct element

                        if (focusedEl) {
                            if (elements.length - 1 === focusedIndex) {
                                $focus.focus(elements[0]);
                            } else {
                                $focus.focus(elements[focusedIndex + 1]);
                            }
                        } else {
                            $focus.focus(elements[0]);
                        }
                    }
                }, 50);
            }
        }"
        class="relative"
        x-bind:class="{
            'w-48': size === 'xs',

            'w-56': size === 'sm',

            'w-64': size === 'md',

            'w-72': size === 'lg',

            'w-full': size === 'full'
        }">
        <!-- Invisible native select -->

        <!-- Kept in synced with the custom select menu for backwards form submission compatibility, feel free to remove it if you won't use it -->

        <select
            id="pm-select-menu"
            name="pm-select-menu"
            class="pointer-events-none absolute start-0 top-0 appearance-none opacity-0"
            tabindex="-1"
            aria-hidden="true">
            <option x-bind:selected="selectedOption === null ? 'selected' : null"></option>

            <template x-for="option in options" :key="option.id">
                <option
                    x-text="option.label"
                    x-bind:selected="isSelected(option.id) ? 'selected' : null"
                    :value="option.value"></option>
            </template>
        </select>

        <!-- END Invisible native select -->

        <!-- Select Menu Toggle -->

        <div class="space-y-1">
            <label
                x-on:click="$focus.focus($refs.selectMenuButton)"
                x-text="label"
                class="inline-block text-sm font-medium"></label>

            <button
                x-on:click="openMenu()"
                x-on:keydown.down.prevent.stop="openMenu()"
                x-on:keydown.up.prevent.stop="openMenu()"
                x-bind:aria-expanded="open"
                id="pm-select-menu-button"
                type="button"
                class="group flex w-full items-center justify-between gap-2 rounded-lg border border-zinc-200 bg-white px-3 py-2 text-start text-sm/6 focus:border-zinc-500 focus:ring-3 focus:ring-zinc-500/50 focus:outline-hidden dark:border-zinc-600 dark:bg-transparent dark:focus:border-zinc-500"
                x-ref="selectMenuButton"
                aria-haspopup="listbox"
                aria-controls="pm-select-menu-list">
                <span
                    x-text="selectedOption ? selectedOption.label : placeholderText"
                    x-bind:class="{
                        'text-zinc-500 dark:text-zinc-400': !selectedOption
                    }"
                    class="grow truncate"></span>

                <svg
                    class="hi-mini hi-chevron-up-down inline-block size-5 flex-none opacity-40 transition group-hover:opacity-60 group-active:scale-90"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true">
                    <path
                        fill-rule="evenodd"
                        d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z"
                        clip-rule="evenodd" />
                </svg>
            </button>
        </div>

        <!-- END Select Menu Toggle -->

        <!-- Select Menu Container -->

        <ul
            x-cloak
            x-ref="selectMenu"
            x-show="open"
            x-trap="open"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="opacity-0 -translate-y-3"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-10"
            x-on:click.outside="closeMenu()"
            x-on:keydown="keyboardNavigation($event)"
            x-on:keydown.esc.prevent.stop="closeMenu()"
            x-on:keydown.up.prevent.stop="$focus.previous()"
            x-on:keydown.down.prevent.stop="$focus.next()"
            x-on:keydown.home.prevent.stop="$focus.first()"
            x-on:keydown.end.prevent.stop="$focus.last()"
            x-on:keydown.page-up.prevent.stop="$focus.first()"
            x-on:keydown.page-down.prevent.stop="$focus.last()"
            id="pm-select-menu-list"
            class="absolute inset-x-0 z-10 mt-2 max-h-60 origin-top overflow-y-auto rounded-lg bg-white py-2.5 shadow-xl ring-1 ring-black/5 focus:outline-hidden dark:bg-zinc-800 dark:shadow-zinc-900 dark:ring-zinc-700"
            aria-labelledby="pm-select-menu-button"
            aria-orientation="vertical"
            role="listbox"
            tabindex="0">
            <template x-for="option in options" :key="option.id">
                <li
                    x-on:click="setSelected(option.id)"
                    x-on:keydown.enter.prevent.stop="setSelected(option.id)"
                    x-on:keydown.space.prevent.stop="setSelected(option.id)"
                    x-bind:class="{
                        'font-semibold text-zinc-950 hover:bg-zinc-50 focus:bg-zinc-50 dark:font-medium dark:text-white dark:hover:bg-zinc-700/75 dark:focus:bg-zinc-700/75':
                            isSelected(option.id),

                        'text-zinc-600 hover:text-zinc-950 hover:bg-zinc-50 focus:text-zinc-950 focus:bg-zinc-50 active:bg-zinc-100 dark:text-zinc-300 dark:hover:text-white dark:hover:bg-zinc-700/50 dark:focus:text-white dark:focus:bg-zinc-700/50 dark:active:bg-zinc-700':
                            option.id !== selectedId
                    }"
                    x-bind:data-selected="isSelected(option.id)"
                    x-bind:data-label="option.label"
                    x-bind:data-value="option.value"
                    x-bind:aria-selected="isSelected(option.id)"
                    x-bind:title="option.label"
                    class="group flex cursor-pointer items-center justify-between gap-2 px-3 text-sm focus:outline-hidden"
                    role="option"
                    tabindex="-1">
                    <div x-text="option.label" class="grow truncate py-2"></div>

                    <div
                        class="pointer-events-none size-5 flex-none text-zinc-600 dark:text-zinc-400"
                        x-bind:class="{
                            invisible: !isSelected(option.id)
                        }"
                        aria-hidden="true">
                        <svg
                            x-cloak
                            x-show="isSelected(option.id)"
                            class="hi-mini hi-check-circle inline-block size-5"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true">
                            <path
                                fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </li>
            </template>
        </ul>

        <!-- END Select Menu Container -->
    </div>
</div>
