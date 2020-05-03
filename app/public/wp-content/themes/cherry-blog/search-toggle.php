<div id="search-block" class="search-block">
    <button role="button" id="search-close" class="search-close bg-none l-h-0">
        <svg class="sy-icon sy-icon--md">
            <use xlink:href="#sy-icon-close"></use>
        </svg>
    </button>

    <div class="sy-search-form container mb-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form role="search" method="get" class="search-form d-flex align-items-center" action="">
                    <label class="m-0">
                        <span class="screen-reader-text"><?php esc_html_e('Search for', 'cherry-blog'); ?>:</span>
                        <input type="search"
                               autofocus
                               class="search-field"
                               placeholder="<?php esc_attr_e('Search...', 'cherry-blog'); ?>"
                               value=""
                               name="s">
                    </label>
                    <button role="button" class="sy-btn sy-btn--search">
                        <svg class="sy-icon sy-icon--md">
                            <use xlink:href="#sy-icon-search"></use>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>