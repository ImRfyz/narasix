<?php
/**
 * Displays the menu icon and modal
 *
 * @package narasix
 * @since 1.0.0
 */

?>


<!-- menu mobile open -->
<div class="menu-modal narasix__mobile-menu card-modal absolute top-0 left-0 flex h-screen w-full backdrop-blur bg-charcoal-800/20 dark:bg-charcoal-800/50" data-modal-target-string=".menu-modal">
  <div class="menu-wrapper">
    <div class="bg-charcoal-100 dark:bg-charcoal-900 dark:divide-charcoal-800/40 flex h-full flex-col divide-y">
      <div class="flex h-16 items-center justify-between pl-6">
        <span class="text-[13px] font-medium uppercase tracking-widest"> Menu </span>
        <button class="h-16 w-16 border-l border-charcoal-800/10" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".menu-modal">
          <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <!-- nav mobile -->
      <nav class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'narasix' ); ?>" role="navigation">

					<ul class="modal-menu">

						<?php
							wp_nav_menu(
								array(
									'container'      => '',
									'items_wrap'     => '%3$s',
									'show_toggles'   => true,
									'theme_location' => 'primary',
								)
							);

						?>

					</ul>
				</nav>
    </div>
  </div>
</div>